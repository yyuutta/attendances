<?php

class Management {
    public $pdo;
    public $status;
    public $holiday;
    
    function __construct() {
        $action = new Connect();
        $this->pdo = $action->pdo;
        
        // 祝日を取得
        $action = new Holiday();
        $this->holiday = $action->holiday;
    }
    
    
    function user_get() {
        try {
            $this->pdo->beginTransaction();

            //全ユーザーを取得
            $sql = "SELECT * FROM users";
            $stmh = $this->pdo->prepare($sql);
            $stmh->execute();
            $users = $stmh->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        print $this->status;
        return $users;
    }
    
    function onlyuser_get($getid) {
        $id = $getid;
        
        try {
            $this->pdo->beginTransaction();

            //全ユーザーを取得
            $sql = "SELECT * FROM users where id = :id";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':id',$id,PDO::PARAM_INT);
            $stmh->execute();
            $user = $stmh->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        print $this->status;
        return $user;
    }
    
    function get_calendar_year($year, $month) {
        // 月末日を取得
        $last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
        $calendar = array();
        $j = 0;

        // 月末日までループ
        for ($i = 1; $i < $last_day + 1; $i++) {
            // 曜日を取得
            $week = date('w', mktime(0, 0, 0, $month, $i, $year));
            $youbi = array();
            $youbi = array( "日", "月", "火", "水", "木", "金", "土" );
            
            // 1日の場合
            if ($i == 1) {
                // 1日目の曜日までをループ
                for ($s = 1; $s <= $week; $s++) {
                    // 前半に空文字をセット
                    $calendar[$j]['day'] = '';
                    $calendar[$j]['week'] = $youbi[$week];
                    $calendar[$j]['holiday'] = " ";
                    $j++;
                }
            }

            $com = 0;
            foreach($this->holiday as $key => $value){
                $flag_date = $year . "/" . $month . "/" . $i;
                if ($key == $flag_date) {
                    $calendar[$j]['holiday'] = $value;
                    $com = 1;
                }
                if ($com != 1) {
                    $calendar[$j]['holiday'] = "";
                }
            }
            
            // 配列に日付をセット
            $calendar[$j]['day'] = $i;
            $calendar[$j]['week'] = $youbi[$week];
            $j++;
            
            // 月末日の場合
            if ($i == $last_day) {
                // 月末日から残りをループ
                for ($e = 1; $e <= 6 - $week; $e++) {

                    // 後半に空文字をセット
                    $calendar[$j]['day'] = '';
                    $calendar[$j]['week'] = $youbi[$week];
                    $calendar[$j]['holiday'] = " ";
                    $j++;
                }
            }    
        }
        return $calendar;
    }
    
    function user_update($id, $mail, $auth, $memo, $leaving, $edit_date) {
        try {
            $this->pdo->beginTransaction();

            // データが存在すれば更新、なければ作成
            $sql = "UPDATE
                        users
                    SET
                        mail = :mail,
                        auth = :auth,
                        memo = :memo,
                        leaving = :leaving,
                        edit_date = :edit_date
                    WHERE
                        id = :id
                    ";
                        
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':id',$id,PDO::PARAM_INT);
            $stmh->bindParam(':mail',$mail,PDO::PARAM_STR);
            $stmh->bindParam(':auth',$auth,PDO::PARAM_INT);
            $stmh->bindParam(':memo',$memo,PDO::PARAM_STR);
            $stmh->bindParam(':leaving',$leaving,PDO::PARAM_STR);
            $stmh->bindParam(':edit_date',$edit_date,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage() . "<br>";
        }
        print $this->status;
    }

    function dateuser_get($date_data) {
        try {
            $this->pdo->beginTransaction();

            //全ユーザーを取得
            $sql = "SELECT
                        *
                    FROM
                        posts inner join users
                    on
                        posts.user_id = users.id
                    WHERE
                        posts.date_id = :date_id
                    AND
                        posts.kei > 0
                    ";
            
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':date_id',$date_data,PDO::PARAM_STR);
            $stmh->execute();
            $date_users = $stmh->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        print $this->status;
        return $date_users;
    }
    
    function note_update($note, $user_date_id, $edit_date) {
        try {
            $this->pdo->beginTransaction();

            // noteのみアップデート
            $sql = "UPDATE
                        posts
                    SET
                        note = :note,
                        edit_date = :edit_date
                    WHERE
                        user_date_id = :user_date_id
                    ";
                        
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':note',$note,PDO::PARAM_STR);
            $stmh->bindParam(':user_date_id',$user_date_id,PDO::PARAM_STR);
            $stmh->bindParam(':edit_date',$edit_date,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage() . "<br>";
        }
        print $this->status;
    }
    
    function count() {
        try {
            $this->pdo->beginTransaction();

            //全ユーザーを取得
            $sql = "SELECT
                        date_id,
                        count(distinct user_id) as user_c,
                        sum(kei) as kei_c
                    FROM
                        posts
                    WHERE
                        kei > 0
                    group by
                        date_id
                    ";
            
            $stmh = $this->pdo->prepare($sql);
            $stmh->execute();
            $counts = $stmh->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        print $this->status;
        return $counts;
    }

    function error_get() {
        try {
            $this->pdo->beginTransaction();

            //エラーデータのあるユーザーを取得
            $sql = "SELECT
                        *
                    FROM
                        posts inner join users
                    on
                        posts.user_id = users.id
                    WHERE
                        posts.err <> ''
                    ORDER BY
                        users.id,
                        date_id
                    ";
            
            $stmh = $this->pdo->prepare($sql);
            $stmh->execute();
            $err_get = $stmh->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        print $this->status;
        return $err_get;
    }

        function err_up($user_date_id, $start, $finish, $rest, $kei, $edit_date, $err) {
        try {
            $this->pdo->beginTransaction();
            
            // エラーデータの修正
            $sql = "UPDATE
                        posts
                    SET
                        start = :start,
                        finish = :finish,
                        rest = :rest,
                        kei = :kei,
                        err = :err,
                        edit_date = :edit_date
                    WHERE
                        user_date_id = :user_date_id
                    ";
                        
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':start',$start,PDO::PARAM_INT);
            $stmh->bindParam(':finish',$finish,PDO::PARAM_INT);
            $stmh->bindParam(':rest',$rest,PDO::PARAM_INT);
            $stmh->bindParam(':kei',$kei,PDO::PARAM_INT);
            $stmh->bindParam(':err',$err,PDO::PARAM_STR);
            $stmh->bindParam(':user_date_id',$user_date_id,PDO::PARAM_STR);
            $stmh->bindParam(':edit_date',$edit_date,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage() . "<br>";
        }
        print $this->status;
    }
    
function inform_insert($comment, $created_at) {
        $id_auto = 0;
        
        try {
            $this->pdo->beginTransaction();
           
            // データが存在すれば更新、なければ作成
            $sql =  "INSERT INTO 
                        informs (id, comment, created_at)
                    VALUES
                        (:id, :comment, :created_at)
                    ";

            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':id',$id_auto,PDO::PARAM_STR);
            $stmh->bindParam(':comment',$comment,PDO::PARAM_STR);
            $stmh->bindParam(':created_at',$created_at,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage() . "<br>";
        }
        print $this->status;
        return "";
    }
    
    function comment_get() {
        try {
            $this->pdo->beginTransaction();
            
            //コメントを取得
            $sql = "SELECT * FROM informs";
            $stmh = $this->pdo->prepare($sql);
            $stmh->execute();
            $comment = $stmh->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        print $this->status;
        return $comment;
    }
    
    function inform_up($comment, $created_at) {
        try {
            $this->pdo->beginTransaction();

            // noteのみアップデート
            $sql = "UPDATE
                        informs
                    SET
                        comment = :comment,
                        created_at = :created_at
                    ";
                        
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':comment',$comment,PDO::PARAM_STR);
            $stmh->bindParam(':created_at',$created_at,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage() . "<br>";
        }
        print $this->status;
    }

}