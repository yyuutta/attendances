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

require_once(dirname(__FILE__) . "/../configs/define.php");
require_once(dirname(__FILE__) . "/../library/smarty/libs/Smarty.class.php");

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
        $this->view->template_dir = dirname(__FILE__) . "/../views/templates";
        $this->view->compile_dir = dirname(__FILE__) . "/../views/templates_c";
    }
    
    public function indexAction() // ユーザーのシフト入力月を取得
    {
        //日付を選択→取得された月のデータ一覧を取得　select
        // ConnectControllerのindexActionにて処理
    }
    
    public function storeAction() // ユーザーのシフト登録　
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = staff;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        //データ更新or作成
        for($i = 0; $i < count($_POST['date_name']); $i++){
             
            // 変更希望データ
            $user_date_id = $_SESSION["user_at"] . "_" . $_POST['date_name'][$i];
            $user_id = $_SESSION["user_id_at"];
            $date_id = $_POST['date_name'][$i];
            $start = (FLOAT)$_POST['start'][$i];
            $finish = (FLOAT)$_POST['finish'][$i];
            $rest = (FLOAT)$_POST['rest'][$i];
            $kei = (FLOAT)($finish - $start - $rest);
            $note = $_POST['note'][$i];
            $approval = $_POST['approval'][$i];
            $edit_date = date("Y/m/d H:i:s");
            $create_date = date("Y/m/d H:i:s");
            $warn = $_POST['warn'][$i];
            $week = $_POST['week'][$i];
            
            // 現時点で登録されているデータ
            $now_start = (FLOAT)$_POST["now_start"][$i];
            $now_finish = (FLOAT)$_POST["now_finish"][$i];
            $now_rest = (FLOAT)$_POST["now_rest"][$i];
            $now_kei = (FLOAT)$_POST["now_kei"][$i];
            
            // 出勤必須日、または現在登録しているデータが存在し、かつ変更希望データが格納されていれば編集 または現在登録データ無かつ変更希望データが格納されていれば登録
            if (($warn != "") || (($now_start != 0 || $now_finish != 0 || $now_rest != 0) and ($start != 0 || $finish != 0 || $rest != 0)) || (($now_start == 0 || $now_finish == 0 || $now_rest == 0) and ($start != 0 || $finish != 0 || $rest != 0))) {

                $err = "";
                if($start == 0 && $finish or $rest > 0 || $start > 0 and $start == $finish || $start > $finish || $start == 0 && $finish != 0 || $start == 0 && $finish == 0 && $rest != 0 || $finish - $start - $rest <= 0){
                    $err = "不整合登録";
                }elseif($start != 0 && $finish - $start >= 6 && $rest != 1) {
                        $err = "休憩1ｈ必須";
                } elseif($start != 0 && $kei < 4) { // 1日4時間勤務必須
                        $err = "4h以上必須";
                } elseif ($warn != "") {
                        $err = $warn;
                }
                
                $action = new Post;
                $data = $action->store($user_date_id, $user_id, $date_id, $start, $finish, $rest, $kei, $note, $edit_date, $create_date, $err, $approval, $week);

            } elseif (($now_start != 0 || $now_finish != 0 || $now_rest != 0) and ($start == 0 || $finish == 0 || $rest == 0)) {

                // 現在登録しているデータが存在し、かつ変更希望データがなければDBデータを削除
                $action = new Post;
                $delete = $action->delete($user_date_id);

            }
        }
        
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: ".$uri);
    }
    
    public function store2Action() // ユーザーのシフト登録　ユーザー管理ページ(from ManagementController/userAction) & エラーページ(from ManagementController/errorAction)
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        if (isset($_POST['date_name'])) {
            $counta = $_POST['date_name']; // ユーザー管理ページからの場合はこっち
        } else {
            $counta = $_POST['user_date_id']; // エラーページからの場合はこっち
        }
        
        //データ更新or作成
        for($i = 0; $i < count($counta); $i++){
            
            if (isset($_POST['date_name'])) { // ユーザー管理ページからの場合はこっち
                
                $user_date_id = $_POST['target_user_name'] . "_" . $_POST['date_name'][$i];
                $user_id = $_POST['target_user_id'];
                $date_id = $_POST['date_name'][$i];
                $start = (FLOAT)$_POST['start'][$i];
                $finish = (FLOAT)$_POST['finish'][$i];
                $rest = (FLOAT)$_POST['rest'][$i];
                $note = $_POST['note'][$i];
                $approval = $_POST['approval'][$i];
                $warn = $_POST['warn'][$i];
                $week = $_POST['week'][$i];
                
                // 現時点で登録されているデータ
                $now_start = (FLOAT)$_POST["now_start"][$i];
                $now_finish = (FLOAT)$_POST["now_finish"][$i];
                $now_rest = (FLOAT)$_POST["now_rest"][$i];
                $now_kei = (FLOAT)$_POST["now_kei"][$i];
                $now_note = $_POST["now_note"][$i];
                $now_approval = $_POST['now_approval'][$i];
                $exist = $_POST['exist'][$i]; // 存在しているデータか確認用
                
            } else { // エラーページからの場合はこっち
                
                $user_date_id = $_POST['user_date_id'];
                $user_id= $_POST['user_id'];
                $date_id  = $_POST['date_id'];
                $start = (FLOAT)$_POST['start'];
                $finish = (FLOAT)$_POST['finish'];
                $rest = (FLOAT)$_POST['rest'];
                $note = $_POST['note'];
                $approval = $_POST['approval'];
                $warn = $_POST['warn'];
                $week = $_POST['week'];
                
                // 現時点で登録されているデータ
                $now_start = (FLOAT)$_POST["now_start"];
                $now_finish = (FLOAT)$_POST["now_finish"];
                $now_rest = (FLOAT)$_POST["now_rest"];
                $now_kei = (FLOAT)$_POST["now_kei"];
                $now_note = $_POST["now_note"];
                $now_approval = $_POST['now_approval'];
                $exist = $_POST['exist']; // 存在しているデータか確認用
                
            }
                    
            $kei = (FLOAT)($finish - $start - $rest);
            $edit_date = date("Y/m/d H:i:s");
            $create_date = date("Y/m/d H:i:s");
            
            // 履歴
            $move_history['user_date_id'] = $user_date_id;
            $move_history['user_id'] = $user_id;
            $move_history['date_id'] = $date_id;
            $move_history['past_start'] = $now_start . " → " . $start;
            $move_history['past_finish'] = $now_finish . " → " . $finish;
            $move_history['past_rest'] = $now_rest . " → " . $rest;
            $move_history['past_kei'] = $now_kei . " → " . $kei;
            $move_history['past_note'] = $now_note . " → " . $note;
            $move_history['flag'] = $_POST['flag'];
            $move_history['reason'] = $_POST['reason'];
            $move_history['editor'] = "id:" . $_SESSION["user_id_at"] . "_" . $_SESSION["user_at"];
            $move_history['create_date'] = $create_date;
            $move_history['past_approval'] = $now_approval . " → " . $approval;

            // 会社承認項目が登録データと未登録データで異なる場合、本項目のみ更新→履歴を残し終了または次のデータにループ
            if (($approval != $now_approval)) {

                // データ登録
                $action = new Post;
                $data = $action->update($user_date_id, $approval);
                    
                // 履歴
                $action = new Reshift;
                $history = $action->store_reshift($move_history);
            
            // 前回と同じデータの場合はスルー　※未登録変更予定データ有と現在登録されているデータが異なっていたら処理を進める
            } elseif ($start != $now_start || $finish != $now_finish || $rest != $now_rest || $kei != $now_kei || $note != $now_note) {
                
                // 現在登録しているデータが存在し、かつ変更希望データが0、かつ出勤必須日なく、会社承認がなければDBデータを削除
                if (($exist != "") && ($start == 0 || $finish == 0 || $rest == 0) && $warn == "" && $approval == "" && $now_approval == "") {

                    $action = new Post;
                    $delete = $action->delete($user_date_id);

                    // 履歴
                    $action = new Reshift;
                    $history = $action->store_reshift($move_history);

                } else {
                    
                    $err = "";
                    if($start == 0 && $finish or $rest > 0 || $start > 0 and $start == $finish || $start > $finish || $start == 0 && $finish != 0 || $start == 0 && $finish == 0 && $rest != 0 || $finish - $start - $rest <= 0){
                            $err = "不整合登録";
                    }elseif($start != 0 && $finish - $start >= 6 && $rest != 1) {
                            $err = "休憩1ｈ必須";
                    } elseif($start != 0 && $kei < 4) { // 1日4時間勤務必須
                            $err = "4h以上必須";
                    } elseif ($warn != "") {
                            $err = $warn;
                    }
                    
                    // データ登録
                    $action = new Post;
                    $data = $action->store($user_date_id, $user_id, $date_id, $start, $finish, $rest, $kei, $note, $edit_date, $create_date, $err, $approval, $week);

                    // 履歴
                    $action = new Reshift;
                    $history = $action->store_reshift($move_history);
                }

            }
            
        }

        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: ".$uri);
    }
}