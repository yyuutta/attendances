<?php

class Post {
    public $pdo;
    public $status;
    
    function __construct() {
        $action = new Connect();
        $this->pdo = $action->pdo;
    }
    
    
    function get_post($yearMonth, $getid) {  
        
        //受け取った値をここで格納
        $user_id = $getid;
        $date_id = $yearMonth . "%";
        
        try {
            $this->pdo->beginTransaction();

            //ユーザ名が一致するレコードを探す
            //$sql = "SELECT * FROM users WHERE `username` = :username";
            $sql = "SELECT * FROM posts WHERE `user_id` = :user_id AND `date_id` like :date_id";
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
    
    function store($user_date_id, $user_id, $date_id, $start, $finish, $rest, $kei, $note, $edit_date, $create_date, $err) {
        
        $id_auto = 0;        
        
        try {
            $this->pdo->beginTransaction();
           
            // データが存在すれば更新、なければ作成
            $sql =  "INSERT INTO 
                        posts (id, user_date_id, user_id, date_id, start, finish, rest, kei, note, err, edit_date, create_date)
                    VALUES 
                        (:id, :user_date_id, :user_id, :date_id, :start ,:finish, :rest, :kei, :note, :err, :edit_date, :create_date)
                    ON DUPLICATE KEY UPDATE
                        `id` = `id`,
                        `user_date_id` = VALUES(`user_date_id`),
                        `user_id` = VALUES(`user_id`),
                        `date_id` = VALUES(`date_id`),
                        `start` = VALUES(`start`),
                        `finish` = VALUES(`finish`),
                        `rest` = VALUES(`rest`),
                        `kei` = VALUES(`kei`),
                        `note` = VALUES(`note`),
                        `err` = VALUES(`err`),
                        `edit_date` = VALUES(`edit_date`),
                        `create_date` = `create_date`
                    ";

            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':id',$id_auto,PDO::PARAM_STR);
            $stmh->bindParam(':user_date_id',$user_date_id,PDO::PARAM_STR);
            $stmh->bindParam(':user_id',$user_id,PDO::PARAM_STR);
            $stmh->bindParam(':date_id',$date_id,PDO::PARAM_STR);
            $stmh->bindParam(':start',$start,PDO::PARAM_INT);
            $stmh->bindParam(':finish',$finish,PDO::PARAM_INT);
            $stmh->bindParam(':rest',$rest,PDO::PARAM_INT);
            $stmh->bindParam(':kei',$kei,PDO::PARAM_INT);
            $stmh->bindParam(':note',$note,PDO::PARAM_STR);
            $stmh->bindParam(':err',$err,PDO::PARAM_STR);
            $stmh->bindParam(':edit_date',$edit_date,PDO::PARAM_STR);
            $stmh->bindParam(':create_date',$create_date,PDO::PARAM_STR);
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