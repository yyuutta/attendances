<?php

class Reshift {
    public $pdo;
    public $status;
    
    function __construct() {
        $action = new Connect();
        $this->pdo = $action->pdo;
    }
    
    
    function get_reshift($yearMonth, $getid) {  
        
        //受け取った値をここで格納
        $user_id = $getid;
        $date_id = $yearMonth . "%";
        
        try {
            $this->pdo->beginTransaction();

            //ユーザ名が一致するレコードを探す
            $sql = "SELECT * FROM reshifts WHERE `user_id` = :user_id AND `date_id` like :date_id";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':user_id',$user_id,PDO::PARAM_INT);
            $stmh->bindParam(':date_id',$date_id,PDO::PARAM_STR);
            $stmh->execute();
            $count = $stmh->rowCount();
                if ($count > 0) {
                    $history = $stmh->fetchall(PDO::FETCH_ASSOC);
                } else {
                    $history = 0;
                }
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        print $this->status;
        return $history;
    }
    
    
    function store_reshift($move_history) {
        
        $id_auto = 0;

        try {
            $this->pdo->beginTransaction();
           
            // 編集データの履歴
            $sql =  "INSERT INTO 
                        reshifts (id, user_date_id, user_id, date_id, start, finish, rest, kei, note, flag, reason, editor, create_date, approval)
                    VALUES 
                        (:id, :user_date_id, :user_id, :date_id, :start ,:finish, :rest, :kei, :note, :flag, :reason, :editor, :create_date, :approval)
                    ";

            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':id',$id_auto,PDO::PARAM_STR);
            $stmh->bindParam(':user_date_id',$move_history['user_date_id'],PDO::PARAM_STR);
            $stmh->bindParam(':user_id',$move_history['user_id'],PDO::PARAM_STR);
            $stmh->bindParam(':date_id',$move_history['date_id'],PDO::PARAM_STR);
            $stmh->bindParam(':start',$move_history['past_start'],PDO::PARAM_INT);
            $stmh->bindParam(':finish',$move_history['past_finish'],PDO::PARAM_INT);
            $stmh->bindParam(':rest',$move_history['past_rest'],PDO::PARAM_INT);
            $stmh->bindParam(':kei',$move_history['past_kei'],PDO::PARAM_INT);
            $stmh->bindParam(':note',$move_history['past_note'],PDO::PARAM_STR);
            $stmh->bindParam(':flag',$move_history['flag'],PDO::PARAM_STR);
            $stmh->bindParam(':reason',$move_history['reason'],PDO::PARAM_STR);
            $stmh->bindParam(':editor',$move_history['editor'],PDO::PARAM_STR);
            $stmh->bindParam(':create_date',$move_history['create_date'],PDO::PARAM_STR);
            $stmh->bindParam(':approval',$move_history['past_approval'],PDO::PARAM_STR);
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