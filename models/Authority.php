<?php

require_once("../models/Connect.php");
require_once("../models/Calendar.php");
require_once("../models/Post.php");
require_once("../models/Management.php");
require_once("../models/Holiday.php");
require_once("../models/Authority.php");

require_once("../configs/define.php");
require_once("../library/smarty/libs/Smarty.class.php");

class Authority {
    public $view;
    public $status;
    public $user_name;
    
    public function __construct()
    {
            // Smartyのインスタンスを生成
            $this->view = new Smarty();
            $this->default_modifiers = array('escape:html','nl2br');
            // テンプレートディレクトリとコンパイルディレクトリを読み込む
            $this->view->template_dir = "../views/templates";
            $this->view->compile_dir = "../views/templates_c";
    }
    
    function login_check()
    {
            // ログインしているかどうか
            if (!isset($_SESSION["user"])) {
                $this->view->assign("status", "");
                $this->view->display("connect/index.tpl");
                exit;
            }
            
            // ログイン者の情報を取得→権限レベルを確認
            // 退社ステータスならログアウトさせる
            $getid = $_SESSION["user_id"];
            $action = new Management;
            $user = $action->onlyuser_get($getid);
            if ($user['auth'] == out) {
                unset($_SESSION["user"]);
                unset($_SESSION["user_id"]);

                if (!isset($_SESSION["user"])) {
                    header("Location: index.php");
                    exit;
                }
            }
            return $user;
    }
    
    function auth_ch($A, $loginUser_auth)
    {
            // 持っている権限で開けるページなのか確認
            if ($A < $loginUser_auth) {
                    unset($_SESSION["user"]);
                    unset($_SESSION["user_id"]);

                    if (!isset($_SESSION["user"])) {
                        header("Location: index.php");
                        exit;
                    }
            }
    }
    
}