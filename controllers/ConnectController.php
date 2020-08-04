<?php

require_once(dirname(__FILE__) . "/../models/Connect.php");
require_once(dirname(__FILE__) . "/../models/Calendar.php");
require_once(dirname(__FILE__) . "/../models/Post.php");
require_once(dirname(__FILE__) . "/../models/Management.php");
require_once(dirname(__FILE__) . "/../models/Holiday.php");
require_once(dirname(__FILE__) . "/../models/Authority.php");
require_once(dirname(__FILE__) . "/../models/Dataprocess.php");
require_once(dirname(__FILE__) . "/../models/Reshift.php");

require_once(dirname(__FILE__) . "/../configs/define.php");
require_once(dirname(__FILE__) . "/../library/smarty/libs/Smarty.class.php");

class ConnectController
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
        $this->view->template_dir = dirname(__FILE__) . "/../views/templates";
        $this->view->compile_dir = dirname(__FILE__) . "/../views/templates_c";
    }
    
    public function indexAction() // 何もアクション指定しなければ、ここに来る！
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = staff;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        $getid = $_SESSION["user_id_at"];
        
        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        // ここでログインユーザーのpostデータを取得(月単位)
        $yearMonth = $dates['year'] . "/" . $dates['month'];
        $action = new Post();
        $row = $action->get_post($yearMonth, $getid);
        
        //日付などを取得
        $action = new Calendar();
        $calendar = $action->get_calendar($dates['year'], $dates['month'], $row);
        $options = $action->get_times(); // 時間帯の配列取得
        $options_rest = $action->get_times_rest(); // 時間帯の配列取得

        // コメント取得
        $action = new Management;
        $comment = $action->comment_get(); 
        
        if ($comment['comment'] == "") {
            $comment['created_at'] = "";
        }
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("comment", $comment);
        $this->view->assign("dates", $dates);
        $this->view->assign("options", $options);
        $this->view->assign("options_rest", $options_rest);
        $this->view->assign("calendar", $calendar);
        $this->view->assign("user_name", $_SESSION["user_at"]);
        $this->view->display("posts/show.tpl");
    }
    
    public function createAction() // ユーザー作成
    {
        // ユーザー確認はなし

        // ユーザー作成処理
        $action = new Connect();
        if($_POST['accessCode'] == secret) {
            $this->status = $action->user_create($_POST);
        } else {
            $this->status = "accessCodeが違います";
        }
        $this->view->assign("status", $this->status);
        $this->view->display("connect/register.tpl");
    }
    
    public function loginAction() // ログイン
    {
        // ユーザー確認はなし
 
        // ログイン
        $action = new Connect();
        $this->status = $action->login($_POST);
        if($this->status == 1) {
            $action = new ConnectController();
            $transfer  = $action->indexAction();
        } else {
            $this->view->assign("status", $this->status);
            $this->view->display("connect/index.tpl");
        }
    }
    
    public function registerAction() // ユーザー登録
    {
        // ユーザー確認はなし
        
        $this->view->assign("status", $this->status);
        $this->view->display("connect/register.tpl");
    }
    
    public function logoutAction() // ログアウト
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        unset($_SESSION["app_at"]);
        unset($_SESSION["user_at"]);
        unset($_SESSION["user_id_at"]);
        
        if (!isset($_SESSION["app_at"])) {
            header("Location: index.php");
        }
    }

}
