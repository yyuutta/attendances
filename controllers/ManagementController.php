<?php

require_once("../models/Connect.php");
require_once("../models/Calendar.php");
require_once("../models/Post.php");
require_once("../models/Management.php");
require_once("../models/Holiday.php");
require_once("../models/Authority.php");
require_once("../models/Dataprocess.php");

require_once("../configs/define.php");
require_once("../library/smarty/libs/Smarty.class.php");

class ManagementController
{
    private $view;
    private $status;
    private $user_name;

    public function __construct()
    {
        // Smartyのインスタンスを生成
        $this->view = new Smarty();
        $this->default_modifiers = array('escape:html','nl2br');
        // テンプレートディレクトリとコンパイルディレクトリを読み込む
        $this->view->template_dir = "../views/templates";
        $this->view->compile_dir = "../views/templates_c";
    }
    
    public function indexAction() // 管理ページTOPへ(カレンダー)
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        //全ユーザー取得
        $action = new Management;
        $users = $action->user_get();
        
        // 日別の人数と時間を取得
        $action = new Management;
        $counts = $action->count();
        
        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        //日付を取得
        $action = new Management;
        for($i=1; $i<=12; $i++) {
        $calendar[$i] = $action->get_calendar_year($dates['year'], $i); // iは月
        }
        $weeks = array('日', '月', '火', '水', '木', '金', '土');
        
        // コメント取得
        $action = new Management;
        $comment = $action->comment_get(); 
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("comment", $comment);
        $this->view->assign("counts", $counts);
        $this->view->assign("calendar", $calendar);
        $this->view->assign("weeks", $weeks);
        $this->view->assign("dates", $dates);
        $this->view->assign("users", $users);
        $this->view->assign("user_name", $_SESSION["user"]);
        $this->view->display("managements/index.tpl");
    }
    public function userAction() // ユーザー管理ページへ
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        // 取得する年月を取得 ヘッダー部分のリンク用に使用　※管理ページに飛ぶにはyearが必要
        $action = new Calendar();
        $dates = $action->get_dates();
        
        //全ユーザー取得
        $action = new Management;
        $users = $action->user_get();
        
        //表示したいユーザーのみ取得
        $getid = $_GET['id'];
        $action = new Management;
        $user = $action->onlyuser_get($getid);
        
        // マスター以外がマスターデータを見るのはNG
        
        
        
        $auth = array(
            master => 'マスター',
            admin => '管理者',
            staff => 'スタッフ',
            out => '退社',
        );
        
        $test = array(
            'notClear' => '否',
            'Clear' => '合',
        );
        
        $tag = "";
        if ($user['id'] == $_SESSION["user_id"]) {
            $tag = "<font color='#00F'>* </font>";
        }
        
        // getユーザーの処理
        // getユーザーのpostデータを取得(月単位)
        $yearMonth = $dates['year'] . "/" . $dates['month'];
        $action = new Post();
        $row = $action->get_post($yearMonth, $getid);
        //日付などを取得
        $action = new Calendar();
        $calendar = $action->get_calendar($dates['year'], $dates['month'], $row);
        $options = $action->get_times(); // 時間帯の配列取得
        $options_rest = $action->get_times_rest(); // 時間帯の配列取得
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("calendar", $calendar);
        $this->view->assign("options", $options);
        $this->view->assign("options_rest", $options_rest);
        $this->view->assign("tag", $tag);
        $this->view->assign("test", $test);
        $this->view->assign("dates", $dates);
        $this->view->assign("users", $users);
        $this->view->assign("user", $user);
        $this->view->assign("auth", $auth);
        $this->view->assign("user_name", $_SESSION["user"]);
        $this->view->display("managements/user_index.tpl");
    }
    
    public function updateAction() // ユーザー情報を更新
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];

        // 持っている権限で開けるページなのか確認
        $A = master;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        $id = (int)$_POST['id'];
        $mail = $_POST['mail'];
        $auth = (int)$_POST['auth'];
        $memo = $_POST['memo'];
        if($auth == out) {
            if ($_POST['leaving'] == "") {
                $leaving = date("Y/m/d H:i:s");
            } else {
                $leaving = $_POST['leaving'];
            }
        }else{
            $leaving = "";
        }
        $edit_date = date("Y/m/d H:i:s");
        
        // 入社日と退社日、テスト合否項目を追加
        $indate = $_POST['indate'];
        $outdate = $_POST['outdate'];
        $test = $_POST['test'];
        
        $action = new Management();
        $user = $action->user_update($id, $mail, $auth, $memo, $leaving, $edit_date, $indate, $outdate, $test);
        
        $action = new ManagementController();
        $transfer  = $action->userAction();
    }
    
    public function monthlydateAction() // 日別の管理ページへ
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];

        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        // 全ユーザー取得
        $action = new Management;
        $users = $action->user_get();
        
        $year = $_GET['year'];
        $month = $_GET['month'];
        $day = $_GET['day'];
        $date_data = $year . "/" . $month . "/" . $day;
        
        // 日付別で対象者を取得
        $action = new Management;
        $date_users = $action->dateuser_get($date_data);
        $count = count($date_users);
        
        $weeks = array( "日", "月", "火", "水", "木", "金", "土" );
        $timestamp = date_create($year . "-" . $month . "-" . $day);
        $week = $weeks[date_format($timestamp, "w")];
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("count", $count);
        $this->view->assign("year", $year); 
        $this->view->assign("month", $month); 
        $this->view->assign("day", $day); 
        $this->view->assign("week", $week); 
        $this->view->assign("date_users", $date_users); 
        $this->view->assign("users", $users); 
        $this->view->assign("dates", $dates); 
        $this->view->assign("user_name", $_SESSION["user"]);
        $this->view->display("managements/date.tpl");
    }
    
    public function note_upAction() // 日別の管理ページ内のメモ更新
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        
        for($i = 0; $i < count($_POST['user_date_id']); $i++){
            $note = $_POST['note'][$i];
            $user_date_id = $_POST['user_date_id'][$i];
            $edit_date = date("Y/m/d H:i:s");

            $action = new Management();
            $user = $action->note_update($note, $user_date_id, $edit_date);
        }
        $action = new ManagementController();
        $transfer  = $action->monthlydateAction();
    }
    
    public function errorAction() // エラーデータ表示ページへ
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];

        // 持っている権限で開けるページなのか確認
        $A = master;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        $action = new Management();
        $err_get = $action->error_get();

        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        
        //日付などを取得
        $action = new Calendar;
        $options = $action->get_times(); // 時間帯の配列取得
        $options_rest = $action->get_times_rest(); // 時間帯の配列取得
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("options", $options);
        $this->view->assign("options_rest", $options_rest);
        $this->view->assign("err_get", $err_get); 
        $this->view->assign("dates", $dates); 
        $this->view->assign("user_name", $_SESSION["user"]);
        $this->view->display("err/index.tpl");
    }
    
    public function err_updateAction() // エラーデータの更新
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = master;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        $user_date_id = $_POST['user_date_id'];
        $start = (FLOAT)$_POST['start'];
        $finish = (FLOAT)$_POST['finish'];
        $rest = (FLOAT)$_POST['rest'];
        $kei = (FLOAT)($finish - $start - $rest);
        $edit_date = date("Y/m/d H:i:s");

        $err = "";
        if($start == 0 && $finish or $rest > 0 || $start > 0 and $start == $finish || $start > $finish || $start == 0 && $finish != 0 || $start == 0 && $finish == 0 && $rest != 0 || $finish - $start - $rest <= 0){
            $err = "不整合登録";
        }else{
            if($start != 0 && $finish - $start >= 6 && $rest != 1) {
                $err = "休憩1ｈ必須";
            }
        }

        $action = new Management();
        $data = $action->err_up($user_date_id, $start, $finish, $rest, $kei, $edit_date, $err);

        $action = new ManagementController();
        $transfer  = $action->errorAction();
    }
 
    public function mailAction() // メールページへ
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];

        // 持っている権限で開けるページなのか確認
        $A = master;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        
        $message = "メール送信画面";
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("message", $message);
        $this->view->assign("dates", $dates); 
        $this->view->assign("user_name", $_SESSION["user"]);
        $this->view->display("managements/mail.tpl");
    }
    
    public function mail_sendAction() // メール送信
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
    
        // 持っている権限で開けるページなのか確認
        $A = master;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");

        $to = $_POST['to'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        //$headers = "From: y.yamamoto@eagle-tokyo.co.jp";
        
        $message = "";
        if(mb_send_mail($to, $title, $content)){
            $message = "メールを送信しました";
        } else {
            $message = "メールの送信に失敗しました";
        }
        
        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("message", $message);
        $this->view->assign("dates", $dates); 
        $this->view->assign("user_name", $_SESSION["user"]);
        $this->view->display("managements/mail.tpl");
    }
    
    public function informAction() // コメントの記入 postページTOPに表示
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = master;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        $comment = $_POST['comment'];
        $created_at = date("Y/m/d H:i:s");
        
        // 既存コメントを格納
        $action = new Management();
        $check = $action->comment_get();
        
        // コメントがなければ作成、あれば更新
        if ($check == false) {
            $action = new Management();
            $insert = $action->inform_insert($comment, $created_at);
        } else {
            $action = new Management();
            $update = $action->inform_up($comment, $created_at);
        }
        
        $action = new ManagementController();
        $transfer  = $action->indexAction();
    }
    
}