<?php

class Connect {
    public $pdo;
    public $status;
    
    //function db_connect() {
    function __construct() {

        //ローカルじゃなかったら
        if($_SERVER['SERVER_NAME'] != "localhost") {
            //本番
                $db_user = db_user; //ユーザー名
                $db_pass = db_pass; //パスワード
                $db_host = db_host; //ホスト名
                $db_name = db_name; //データベース名
                $db_type = db_type; //データベースの種類         
        } else {
            //ローカル
                $db_user = db_user_local; //ユーザー名
                $db_pass = db_pass_local; //パスワード
                $db_host = db_host_local; //ホスト名
                $db_name = db_name_local; //データベース名
                $db_type = db_type_local; //データベースの種類
        }
        
        $dsn = '$db_type:host=$db_host;dbname=$db_name;';
        
        //$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
        try {
            $this->pdo = new PDO($dsn,$db_user,$db_pass);
            $this->pdo->query("set names utf8");  // この記述が必要
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //例外をスロー
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //PDOクラスのエミュレーションを無効にする
            //print "接続中 <br>";
        } catch (PDOException $Exception) {
            die('エラー:' . $Exception->getMessage());
        }
        //return $this->pdo;
    }
    
    
    function login($POST) {  
        
        //受け取った値をここで格納
        $username = $_POST['username'];
        $password = str_replace(array(" ", "　"), "", $_POST['password']);
        
        function out_get($conf) {
                if($conf == out) {
                    throw new PDOException("ログインできません");
                }
        }
        
        try {
            $this->pdo->beginTransaction();

            //ユーザ名が一致するレコードを探す
            $sql = "SELECT * FROM users WHERE `username` = :username";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':username',$username,PDO::PARAM_STR);
            $stmh->execute();
            $count = $stmh->rowCount();
                if ($count > 0) {                    
                    $row = $stmh->fetch(PDO::FETCH_ASSOC);
                        // 退社ユーザーはログインさせない
                        $conf = $row['auth'];
                        out_get($conf);
                        //if (password_verify($password, $row['password'])) {
                        if (crypt($password, $row['password']) == $row['password']) {
                            $_SESSION["app_at"] = app;
                            $_SESSION["user_at"] = $row['username'];
                            $_SESSION["user_id_at"] = $row['id'];
                            $this->status = 1;
                        } else {
                            $this->status = "パスワードが違います。";
                        }
                } else {
                    $this->status = "ログインできませんでした。";
                }
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        return $this->status;
    }
    
    function user_create($POST, $number) { 
        //受け取った値をここで格納
        $username = $_POST['username'];
        $password = str_replace(array(" ", "　"), "", $_POST['password']);
        $mail = str_replace(array(" ", "　"), "", $_POST['mail']);
        
        //ユーザーネームが重複しているか、パスが4ケタ以上かつ数字のみ利用か確認
        function check($pass,$count,$password,$user,$mail){
                if ($count > 0){
                       throw new PDOException("そのユーザーネームは既に使用されています。");
                }
                if ($user > 20){
                       throw new PDOException("ユーザーネームは20文字以内でお願いします。");
                }
                if (!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $mail)){
                       throw new PDOException("mailの入力は必須です。");
                }
                if ($pass < 6 || $pass > 20) {
                       throw new PDOException("パスワードは6～20桁で入力してください。");    
                }
                if (!preg_match("/^[0-9]+$/", $password)) {
                       throw new PDOException("パスワードは数字(4～20桁)のみとなります。"); 
                }
        }

        try {
            $this->pdo->beginTransaction();

            //ユーザーネームが重複しているか、パスが4ケタ以上か確認用データ取得
            //プレースホルダでSQL作成
            $sql = "SELECT COUNT(*) FROM users WHERE `username` = :username";
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':username',$username,PDO::PARAM_STR);
            $stmh->execute();

            $count = $stmh->fetchColumn();
            //文字数格納
            $user = strlen($username);
            $pass = strlen($password);
            $mail = $mail;
            $auth = $number;
            $memo = "";
            $indate = "";
            $outdate = "";
            $test = "notClear";
            $leaving = "";
            $edit_date = date("Y/m/d H:i:s");
            $create_date = date("Y/m/d H:i:s");
            
            check($pass,$count,$password,$user,$mail);

            //ハッシュ
            //$hash = password_hash($password, PASSWORD_DEFAULT);
            //$hash = crypt($password, PASSWORD_BCRYPT);
            //$hash = password_hash($password, PASSWORD_BCRYPT);
            $hash = crypt($password);
            
            //情報を登録
            //プレースホルダでSQL作成
            $sql = "INSERT INTO
                        users (username, password, mail, auth, memo, indate, outdate, test, leaving, edit_date, create_date)
                    VALUES
                        (:username, :password, :mail, :auth, :memo, :indate, :outdate, :test, :leaving, :edit_date, :create_date)
                    ";
                        
            $stmh = $this->pdo->prepare($sql);
            $stmh->bindParam(':username',$username,PDO::PARAM_STR);
            $stmh->bindParam(':password',$hash,PDO::PARAM_INT);
            $stmh->bindParam(':mail',$mail,PDO::PARAM_STR);
            $stmh->bindParam(':auth',$auth,PDO::PARAM_INT);
            $stmh->bindParam(':memo',$memo,PDO::PARAM_STR);
            $stmh->bindParam(':indate',$indate,PDO::PARAM_STR);
            $stmh->bindParam(':outdate',$outdate,PDO::PARAM_STR);
            $stmh->bindParam(':test',$test,PDO::PARAM_STR);
            $stmh->bindParam(':leaving',$leaving,PDO::PARAM_STR);
            $stmh->bindParam(':edit_date',$edit_date,PDO::PARAM_STR);
            $stmh->bindParam(':create_date',$create_date,PDO::PARAM_STR);
            $stmh->execute();
            $this->pdo->commit();
            $this->status = "ユーザー【" . $username . "】-" . $stmh->rowCount() . "件登録しました。"; 
        } catch (PDOException $Exception) {
            $this->pdo->rollBack();
            $this->status = "エラー:" . $Exception->getMessage();
        }
        return $this->status;
    }   
    
}