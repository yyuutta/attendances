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

class ReshiftController
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
    
    public function indexAction() // 会社都合シフト変更履歴ページへ
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
        
        // 本年度を基準に本年、前年が対象データになっているか確認
        if ($_GET['getyear'] != $dates['year_now'] && $_GET['getyear'] != $dates['year_ago']) {
            header("Location: index.php");
            return; // ここで処理終了
        }
        
        // 対象の年を格納
        $target_year = $_GET['getyear'];
        $action = new Reshift();
        $reshifts = $action->get_reshift_user($target_year);
        
        // データがセットされていたら処理
        if ($reshifts > 0) {
            
            // 月ごとにデータを格納
            for($i = 1; $i < 12; $i++) {

                // 対象データを探す用
                $year_month = $target_year . "/" . $i;

                // 月単位でデータを振り分ける
                foreach ($reshifts as $key => $value) {

                    // 重複したデータが存在するかチェック
                    $target_user = $value['user_date_id'];
                    $action = new Reshift();
                    $reshifts_d_user = $action->get_duplicate_user($target_user);
                    
                    // 重複データがあれば格納
                    if ($reshifts_d_user[0]['user_date_id'] > 1) {
                        $reshifts[$key]['duplicate'] = "duplicate";
                    }

                    // 何月のデータなのかチェック → 月のみを格納
                    if (strpos($value['date_id'], $year_month) !== false) {
                        $reshifts[$key]['month'] = $i;
                    }

                }
            }
        
        }
        
    $this->view->assign("reshifts", $reshifts);
    $this->view->assign("dates", $dates);
    $this->view->assign("target_year", $target_year);
    $this->view->assign("loginUser_auth", $loginUser_auth);
    $this->view->assign("user_name", $_SESSION["user_at"]);
    $this->view->display("history/index.tpl");
    
    }

}