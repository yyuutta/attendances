<?php

require_once("../models/Connect.php");
require_once("../models/Calendar.php");
require_once("../models/Post.php");
require_once("../models/Management.php");
require_once("../models/Holiday.php");
require_once("../models/Authority.php");
require_once("../models/Dataprocess .php");

require_once("../configs/define.php");
require_once("../library/smarty/libs/Smarty.class.php");


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
        $this->view->template_dir = "../views/templates";
        $this->view->compile_dir = "../views/templates_c";
    }
    
    public function indexAction()
    {
        // ログインしているか確認
        $action = new Authority();
        $login_check = $action->login_check();
        
        if (!isset($_SESSION["user"])) {
            $this->view->assign("status", "");
            $this->view->display("connect/index.tpl");
        } else {
            $this->view->assign("user_name", $_SESSION["user"]);
            $this->view->assign("status", "");
            $this->view->display("posts/show.tpl");   
        }
    }

}
