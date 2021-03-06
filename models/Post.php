<?php

class Post {
    public $pdo;
    public $status;
    
    function __construct() {
        $action = new Connect();
        $this->pdo = $action->pdo;
    }
    
    
    function get_post($yearMonth, $getid) {  
        
        $this->status = "";
        
        //受け取った値をここで格納
        $user_id = $getid;
        $date_id = $yearMonth . "%";
        
        try {
            $this->pdo->beginTransaction();
            
            //ユーザ名が一致するレコードを探す
            //$sql = "SELECT * FROM users WHERE `username` = :username";
            $sql = "SELECT * FROM posts WHERE user_id = :user_id AND date_id like :date_id";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':user_id',$user_id,PDO::PARAM_INT);
            $stmh->bindParam(':date_id',$date_id,PDO::PARAM_STR);
            $stmh->execute();
            $count = $stmh->rowCount();
                if ($count > 0) {
                    $row = $stmh->fetchall(PDO::FETCH_ASSOC);
                } else {
                    $row = 0;
                }
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        print $this->status;
        return $row;
    }
    
    function store($user_date_id, $user_id, $date_id, $start, $finish, $rest, $kei, $note, $edit_date, $create_date, $err, $approval, $week) {
        
        $this->status = "";
        
        //$id_auto = 0;
        
        try {
            $this->pdo->beginTransaction();
           
            // データが存在すれば更新、なければ作成
            $sql =  "INSERT INTO
                        posts (user_date_id, user_id, date_id, week, start, finish, rest, kei, note, err, edit_date, created_at, approval)
                    VALUES
                        (:user_date_id, :user_id, :date_id, :week, :start ,:finish, :rest, :kei, :note, :err, :edit_date, :created_at, :approval)
                    ON CONFLICT ON CONSTRAINT id_ukey
                    DO UPDATE SET
                        user_date_id = :user_date_id,
                        user_id = :user_id,
                        date_id = :date_id,
                        week = :week,
                        start = :start,
                        finish = :finish,
                        rest = :rest,
                        kei = :kei,
                        note = :note,
                        err = :err,
                        edit_date = :edit_date,
                        created_at = :created_at,
                        approval = :approval
                    ";

            $stmh = $this->pdo->prepare($sql);
            //$stmh->bindParam(':id',$id_auto,PDO::PARAM_STR);
            $stmh->bindParam(':user_date_id',$user_date_id,PDO::PARAM_STR);
            $stmh->bindParam(':user_id',$user_id,PDO::PARAM_INT);
            $stmh->bindParam(':date_id',$date_id,PDO::PARAM_STR);
            $stmh->bindParam(':week',$week,PDO::PARAM_STR);
            $stmh->bindParam(':start',$start,PDO::PARAM_INT);
            $stmh->bindParam(':finish',$finish,PDO::PARAM_INT);
            $stmh->bindParam(':rest',$rest,PDO::PARAM_INT);
            $stmh->bindParam(':kei',$kei,PDO::PARAM_INT);
            $stmh->bindParam(':note',$note,PDO::PARAM_STR);
            $stmh->bindParam(':err',$err,PDO::PARAM_STR);
            $stmh->bindParam(':edit_date',$edit_date,PDO::PARAM_STR);
            $stmh->bindParam(':created_at',$create_date,PDO::PARAM_STR);
            $stmh->bindParam(':approval',$approval,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage() . "<br>";
        }
        print $this->status;
        return "";
    }
    
    function delete($user_date_id) {
        
        $this->status = "";
        
        try {
                $this->pdo->beginTransaction();

                // 対象データの削除
                $sql =  "DELETE FROM
                            posts
                        WHERE
                            user_date_id = :user_date_id
                        ";
                
                $stmh = $this->pdo->prepare($sql);
                $stmh->bindParam(':user_date_id',$user_date_id,PDO::PARAM_STR);
                $stmh->execute();
                $this->pdo->commit();
            } catch (PDOException $Exception) {
                $this->pdo->rollBack();
                $this->status = "エラー:" . $Exception->getMessage() . "<br>";
            }
            print $this->status;
            return "";
        }

    function update($user_date_id, $approval) {
        
        $this->status = "";
        
        try {
                $this->pdo->beginTransaction();

                // 対象データの削除
                $sql =  "UPDATE
                            posts
                        SET
                            approval = :approval
                        WHERE
                            user_date_id = :user_date_id
                        ";
                
                $stmh = $this->pdo->prepare($sql);
                $stmh->bindParam(':approval',$approval,PDO::PARAM_STR);
                $stmh->bindParam(':user_date_id',$user_date_id,PDO::PARAM_STR);
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