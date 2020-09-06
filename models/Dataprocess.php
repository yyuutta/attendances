<?php

class Dataprocess {
    public $pdo;
    public $status;
    
    //function db_connect() {
    function __construct() {
        $action = new Connect();
        $this->pdo = $action->pdo;
    }
    
    
    function userdata_download() {
        $nowdate = date("Y年m月d日H時i分");
        
        try {
            $this->pdo->beginTransaction();

            //全ユーザーを取得
            $sql = "SELECT
                        *
                    FROM
                        posts inner join users
                    on
                        posts.user_id = users.id
                    ";
                    
            $stmh = $this->pdo->prepare($sql);
            $stmh->execute();
            
            //CSV文字列生成
            $csvstr = "id," . "username," . "date_id," . "start," . "finish," . "rest," . "kei" . "\r\n";
            while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
              $csvstr .= $row['id'] . ",";
              $csvstr .= $row['username'] . ",";
              $csvstr .= $row['date_id'] . ",";
              $csvstr .= $row['start'] . ",";
              $csvstr .= $row['finish'] . ",";
              $csvstr .= $row['rest'] . ",";
              $csvstr .= $row['kei'] . "\r\n";
            }
            
            //CSV出力
            $fileNm = $nowdate . ".csv";
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename='.$fileNm);
            //echo mb_convert_encoding($csvstr, "SJIS", "UTF-8"); //Shift-JISに変換したい場合のみ
            exit();
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        print $this->status;
        }
}