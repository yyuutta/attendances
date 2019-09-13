<?php

require_once("../controllers/ConnectController.php");

require_once("../models/Connect.php");
require_once("../models/Calendar.php");
require_once("../models/Post.php");
require_once("../models/Management.php");
require_once("../models/Holiday.php");
require_once("../models/Authority.php");
require_once("../models/Dataprocess.php");

require_once("../configs/define.php");
require_once("../library/smarty/libs/Smarty.class.php");

class PostController
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
    
    public function indexAction() //取得ボタン押下
    {
        //日付を選択→取得された月のデータ一覧を取得　select
        // ConnectControllerのindexActionにて処理
    }
    
    public function storeAction() //更新ボタン押下
    {
        // ログインしているか確認
        $action = new Authority();
        $login_check = $action->login_check();
        
        //データ更新or作成
        for($i = 0; $i < count($_POST['date_name']); $i++){
            $user_date_id = $_SESSION["user"] . "_" . $_POST['date_name'][$i];
            $user_id = $_SESSION["user_id"];
            $date_id = $_POST['date_name'][$i];
            $start = (FLOAT)$_POST['start'][$i];
            $finish = (FLOAT)$_POST['finish'][$i];
            $rest = (FLOAT)$_POST['rest'][$i];
            $kei = (FLOAT)($finish - $start - $rest);
            $note = "";
            $edit_date = date("Y/m/d H:i:s");
            $create_date = date("Y/m/d H:i:s");
            
            $err = "";
            if($start == 0 && $finish or $rest > 0 || $start > 0 and $start == $finish || $start > $finish || $start == 0 && $finish != 0 || $start == 0 && $finish == 0 && $rest != 0 || $finish - $start - $rest <= 0){
                $err = "不整合登録";
            }else{
                if($start != 0 && $finish - $start >= 6 && $rest != 1) {
                    $err = "休憩1ｈ必須";
                }
            }
            
            $action = new Post;
            $data = $action->store($user_date_id, $user_id, $date_id, $start, $finish, $rest, $kei, $note, $edit_date, $create_date, $err);
        }
        
        $action = new ConnectController();
        $transfer  = $action->indexAction();
    }

}