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
        $this->view->template_dir = "../views/templates";
        $this->view->compile_dir = "../views/templates_c";
    }
    
    public function indexAction() // 何もアクション指定しなければ、ここに来る！
    {
        // ログインしているか確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        $getid = $_SESSION["user_id"];

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
        $this->view->assign("user_name", $_SESSION["user"]);
        $this->view->display("posts/show.tpl");
    }
    
    public function createAction()
    {
        // ログイン確認なしでOK

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
    
    public function loginAction()
    {
        // ログイン確認なしでOK
 
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
    
    public function registerAction()
    {
        // ログイン確認なしでOK
        
        $this->view->assign("status", $this->status);
        $this->view->display("connect/register.tpl");
    }
    
    public function logoutAction()
    {
        // ログインしているか確認
        $action = new Authority();
        $login_check = $action->login_check();
        
        unset($_SESSION["user"]);
        unset($_SESSION["user_id"]);
        
        if (!isset($_SESSION["user"])) {
            header("Location: index.php");
        }
    }

}
