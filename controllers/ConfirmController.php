<?php

require_once(dirname(__FILE__) . "/../controllers/ConnectController.php");

require_once(dirname(__FILE__) . "/../models/Connect.php");
require_once(dirname(__FILE__) . "/../models/Calendar.php");
require_once(dirname(__FILE__) . "/../models/Post.php");
require_once(dirname(__FILE__) . "/../models/Management.php");
require_once(dirname(__FILE__) . "/../models/Holiday.php");
require_once(dirname(__FILE__) . "/../models/Authority.php");
require_once(dirname(__FILE__) . "/../models/Dataprocess.php");
require_once(dirname(__FILE__) . "/../models/Reshift.php");
require_once(dirname(__FILE__) . "/../models/Confirm.php");

require_once(dirname(__FILE__) . "/../configs/define.php");
require_once(dirname(__FILE__) . "/../library/smarty/libs/Smarty.class.php");

class ConfirmController
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
    
    public function deleteAction() // confirmデータを削除
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = master;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);

        // 取得データを格納
        $move_delete['user_id'] = $_POST['target_user_id'];;
        $move_delete['date_id'] = $_POST['year'] . "/" . $_POST['month'];
        
        // 実行
        $action = new Confirm();
        $delete = $action->delete_confirm($move_delete);
        
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: ".$uri);
    }
}