<?php

require_once(dirname(__FILE__) . "/../models/Connect.php");
require_once(dirname(__FILE__) . "/../models/Calendar.php");
require_once(dirname(__FILE__) . "/../models/Post.php");
require_once(dirname(__FILE__) . "/../models/Management.php");
require_once(dirname(__FILE__) . "/../models/Holiday.php");
require_once(dirname(__FILE__) . "/../models/Authority.php");
require_once(dirname(__FILE__) . "/../models/Dataprocess.php");
require_once(dirname(__FILE__) . "/../models/Reshift.php");
require_once(dirname(__FILE__) . "/../models/Confirm.php");

require_once(dirname(__FILE__) . "/../controllers/ManagementController.php");

require_once(dirname(__FILE__) . "/../configs/define.php");
require_once(dirname(__FILE__) . "/../library/smarty/libs/Smarty.class.php");

class DataprocessController
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
    
    public function indexAction() // ダウンロード
    {
        // 現在は利用していない為、indexへ飛ばす
        $action = new ManagementController();
        $transfer  = $action->indexAction();
        return; // ここで処理終了
        
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];

        // 持っている権限で開けるページなのか確認
        $A = master;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        // 全データを取得
        $action = new Dataprocess();
        $csv = $action->userdata_download();
    }

}