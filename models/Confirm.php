<?php

class Confirm {
    public $pdo;
    public $status;
    
    function __construct() {
        $action = new Connect();
        $this->pdo = $action->pdo;
    }
    
    
    function get_confirm($yearMonth, $getid) {  

        //受け取った値をここで格納
        $user_id = $getid;
        $date_id = $yearMonth;
        
        try {
            $this->pdo->beginTransaction();
            
            //ユーザ名が一致するレコードを探す
            $sql = "SELECT * FROM confirms WHERE user_id = :user_id AND date_id = :date_id";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':user_id',$user_id,PDO::PARAM_INT);
            $stmh->bindParam(':date_id',$date_id,PDO::PARAM_STR);
            $stmh->execute();
            $count = $stmh->rowCount();
                if ($count > 0) {
                    $confirm = $stmh->fetchall(PDO::FETCH_ASSOC);
                } else {
                    $confirm = 0;
                }
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        print $this->status;
        return $confirm;
    }
    
    
    function store_confirm($move_confirm) {
        
        $id_auto = 0;

        try {
            $this->pdo->beginTransaction();
           
            // 編集データの履歴
            $sql =  "INSERT INTO 
                        confirms (id, date_id, user_id, editor, create_date)
                    VALUES 
                        (:id, :date_id, :user_id, :editor, :create_date)
                    ";
            
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':id',$id_auto,PDO::PARAM_STR);
            $stmh->bindParam(':date_id',$move_confirm['date_id'],PDO::PARAM_STR);
            $stmh->bindParam(':user_id',$move_confirm['user_id'],PDO::PARAM_STR);
            $stmh->bindParam(':editor',$move_confirm['editor'],PDO::PARAM_STR);
            $stmh->bindParam(':create_date',$move_confirm['create_date'],PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage() . "<br>";
        }
        print $this->status;
        return "";
    }
    
    function delete_confirm($move_delete) {
        
        $this->status = "";
        
        //var_dump($move_delete);
        //exit;
        
        try {
                $this->pdo->beginTransaction();

                // 対象データの削除
                $sql =  "DELETE FROM
                            confirms
                        WHERE
                            user_id = :user_id and date_id = :date_id
                        ";
                
                $stmh = $this->pdo->prepare($sql);
                $stmh->bindParam(':user_id',$move_delete['user_id'] ,PDO::PARAM_STR);
                $stmh->bindParam(':date_id',$move_delete['date_id'],PDO::PARAM_STR);
                $stmh->execute();
                $this->pdo->commit();
            } catch (PDOException $Exception) {
                $this->pdo->rollBack();
                $this->status = "エラー:" . $Exception->getMessage() . "<br>";
            }
            print $this->status;
            return "";
    }
    
    
}