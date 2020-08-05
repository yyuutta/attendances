<?php

require_once(dirname(__FILE__) . "/../models/Connect.php");
require_once(dirname(__FILE__) . "/../models/Calendar.php");
require_once(dirname(__FILE__) . "/../models/Post.php");
require_once(dirname(__FILE__) . "/../models/Management.php");
require_once(dirname(__FILE__) . "/../models/Holiday.php");
require_once(dirname(__FILE__) . "/../models/Authority.php");
require_once(dirname(__FILE__) . "/../models/Dataprocess .php");
require_once(dirname(__FILE__) . "/../models/Reshift.php");
require_once(dirname(__FILE__) . "/../models/Confirm.php");

require_once(dirname(__FILE__) . "/../configs/define.php");
require_once(dirname(__FILE__) . "/../library/smarty/libs/Smarty.class.php");


class CalendarController
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
    
    // 用途不詳のため、一旦閉鎖
    /*
     * 
    public function indexAction()
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        
        
        if (!isset($_SESSION["user"])) {
            $this->view->assign("status", "");
            $this->view->display("connect/index.tpl");
        } else {
            $this->view->assign("loginUser_auth", $loginUser_auth);
            $this->view->assign("user_name", $_SESSION["user"]);
            $this->view->assign("status", "");
            //$this->view->display("posts/show.tpl");   
        }
    }
    * 
    */

}
