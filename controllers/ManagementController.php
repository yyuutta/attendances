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

require_once(dirname(__FILE__) . "/../configs/define.php");
require_once(dirname(__FILE__) . "/../library/smarty/libs/Smarty.class.php");

class ManagementController
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
    
    public function indexAction() // 管理ページTOPへ(カレンダー)
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        //全ユーザー取得
        $action = new Management;
        $users = $action->user_get();
        
        // 日別の人数と時間を取得
        $action = new Management;
        $counts = $action->count();
        
        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        //日付を取得
        $action = new Management;
        for($i=1; $i<=12; $i++) {
        $calendar[$i] = $action->get_calendar_year($dates['year'], $i); // iは月
        }
        $weeks = array('日', '月', '火', '水', '木', '金', '土');
        
        // コメント取得
        $action = new Management;
        $comment = $action->comment_get(); 
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("comment", $comment);
        $this->view->assign("counts", $counts);
        $this->view->assign("calendar", $calendar);
        $this->view->assign("weeks", $weeks);
        $this->view->assign("dates", $dates);
        $this->view->assign("users", $users);
        $this->view->assign("user_name", $_SESSION["user_at"]);
        $this->view->display("managements/index.tpl");
    }
    public function userAction() // ユーザー管理ページへ
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        // 取得する年月を取得 ヘッダー部分のリンク用に使用　※管理ページに飛ぶにはyearが必要
        $action = new Calendar();
        $dates = $action->get_dates();
        
        //全ユーザー取得
        $action = new Management;
        $users = $action->user_get();
        
        //表示したいユーザーのみ取得 ※同時に履歴も取得しておく
        $getid = $_GET['id'];
        $action = new Management;
        $user = $action->onlyuser_get($getid);
        
        // マスター以外がマスターデータを見るのはNG→侵入しようとしたらログアウト
        if ($user['auth'] == master && $loginUser_auth > master) {
                unset($_SESSION["app_at"]);
                unset($_SESSION["user_at"]);
                unset($_SESSION["user_id_at"]);
                
                if (!isset($_SESSION["user_at"])) {
                    header("Location: index.php");
                    exit;
                }
        }

        $auth = array(
            master => 'マスター',
            admin => '管理者',
            staff => 'スタッフ',
            out => '退社',
        );
        
        $test = array(
            'notClear' => '否',
            'Clear' => '合',
        );
        
        $department = array(
            '' => '配属先を選んで下さい',
            'web' => 'Web事業部',
            'customer' => 'カスタマー事業部',
            'merchandise' => '商品管理事業部',
            'system' => 'システム開発事業部',
        );
        
        $tag = "";
        if ($user['id'] == $_SESSION["user_id_at"]) {
            $tag = "<font color='#00F'>* </font>";
        }
        
        $reason = array(
            '' => '-----',
            'staff' => 'スタッフ',
            'company' => '会社',
        );

        $approval = array(
            '' => '-----',
            'OK' => '会社承認済',
        );
                
        // getユーザーの処理
        // getユーザーのpostデータを取得(月単位)
        $yearMonth = $dates['year'] . "/" . $dates['month'];
        $action = new Post();
        $row = $action->get_post($yearMonth, $getid);
        
        //日付などを取得
        $action = new Calendar();
        $calendar = $action->get_calendar($dates['year'], $dates['month'], $row);
        $options = $action->get_times(); // 時間帯の配列取得
        $options_rest = $action->get_times_rest(); // 時間帯の配列取得
        
        // getユーザーの履歴データを取得(対象月のみ)
        $action = new Reshift;
        $history = $action->get_reshift($yearMonth, $getid);
        
        // シフト確定ボタンの表示、非表示
        // confirmsに対象データがあれば非表示とする
        $action = new Confirm;
        $confirm = $action->get_confirm($yearMonth, $getid);
        
        if ($confirm > 0) {
            $shift_info = "false"; // 非表示
        } else {
            $shift_info = "true"; // 表示
        }
        
        $this->view->assign("shift_info", $shift_info);
        $this->view->assign("approval", $approval);
        $this->view->assign("history", $history);
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("calendar", $calendar);
        $this->view->assign("options", $options);
        $this->view->assign("options_rest", $options_rest);
        $this->view->assign("tag", $tag);
        $this->view->assign("department", $department);
        $this->view->assign("test", $test);
        $this->view->assign("reason", $reason);
        $this->view->assign("dates", $dates);
        $this->view->assign("users", $users);
        $this->view->assign("user", $user);
        $this->view->assign("auth", $auth);
        $this->view->assign("user_name", $_SESSION["user_at"]);
        $this->view->display("managements/user_index.tpl");
    }
    
    public function updateAction() // ユーザー情報を更新
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];

        // 持っている権限で開けるページなのか確認
        $A = master;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        $id = (int)$_POST['id'];
        $mail = $_POST['mail'];
        $auth = (int)$_POST['auth'];
        $memo = $_POST['memo'];
        if($auth == out) {
            if ($_POST['leaving'] == "") {
                $leaving = date("Y/m/d H:i:s");
            } else {
                $leaving = $_POST['leaving'];
            }
        }else{
            $leaving = "";
        }
        $edit_date = date("Y/m/d H:i:s");
        
        // 入社日と退社日、テスト合否項目を追加
        $indate = $_POST['indate'];
        $outdate = $_POST['outdate'];
        $test = $_POST['test'];
        
        // 事業部の登録
        $department = $_POST['department'];
        
        $action = new Management();
        $user = $action->user_update($id, $mail, $auth, $memo, $leaving, $edit_date, $indate, $outdate, $test, $department);
        
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: ".$uri);
    }
    
    public function monthlydateAction() // 日別の管理ページへ
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];

        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        // 全ユーザー取得
        $action = new Management;
        $users = $action->user_get();
        
        $year = $_GET['year'];
        $month = $_GET['month'];
        $day = $_GET['day'];
        $date_data = $year . "/" . $month . "/" . $day;
        
        // 日付別で対象者を取得
        $action = new Management;
        $date_users = $action->dateuser_get($date_data);
        $count = count($date_users);
        
        $weeks = array( "日", "月", "火", "水", "木", "金", "土" );
        $timestamp = date_create($year . "-" . $month . "-" . $day);
        $week = $weeks[date_format($timestamp, "w")];
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("count", $count);
        $this->view->assign("year", $year); 
        $this->view->assign("month", $month); 
        $this->view->assign("day", $day); 
        $this->view->assign("week", $week); 
        $this->view->assign("date_users", $date_users); 
        $this->view->assign("users", $users); 
        $this->view->assign("dates", $dates); 
        $this->view->assign("user_name", $_SESSION["user_at"]);
        $this->view->display("managements/date.tpl");
    }
    
    public function note_upAction() // 日別の管理ページ内のメモ更新
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        
        for($i = 0; $i < count($_POST['user_date_id']); $i++){
            $note = $_POST['note'][$i];
            $user_date_id = $_POST['user_date_id'][$i];
            $edit_date = date("Y/m/d H:i:s");

            $action = new Management();
            $user = $action->note_update($note, $user_date_id, $edit_date);
        }
        
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: ".$uri);
    }
    
    public function errorAction() // エラーデータ表示ページへ
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        // エラーデータの取得
        $action = new Management();
        $err_get = $action->error_get();
        
        // エラーデータのシフト確定がされている年月は更新ボタンを表示しない
        foreach ($err_get as $key => $value) {
            // 確認に必要なデータを格納
            $getid = $value['user_id'];
            // スラッシュ区切りでデータを分けて年と月だけ利用
            list($year, $month, $day) = explode('/', $value['date_id']);
            $date_id = $year . "/" . $month;
            
            // 確定されているか確認
            $action = new Confirm;
            $confirm = $action->get_confirm($date_id, $getid);

            // 確定ボタンが押下済みであればon
            if ($confirm > 0) {
                $err_get[$key]['confirm'] = "on";
            } else {
                $err_get[$key]['confirm'] = "off";
            }
        }
        
        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        // 本年度より前後一年間全てのデータを取得
        $calendar[] = "";
        $calendar1 = "";
        $calendar2 = "";
        $calendar3 = "";
        for ($i = 1; $i < 13; $i++) {
            $calendar1 = $action->get_calendar($dates['year_now'], $i, $err_get);
            $calendar2 = $action->get_calendar($dates['year_ago'], $i, $err_get);
            $calendar3 = $action->get_calendar($dates['year_add'], $i, $err_get);
            $calendar = array_merge($calendar, $calendar1, $calendar2, $calendar3);
        }

        // 以下、エラーデータにて、出勤必須の日があればデータを格納しておく
        foreach ($err_get as $key1 => $value) {
            $flag_check = 0;
            foreach ($calendar as $key2 => $calendarvaluevalue) {
                if ($flag_check == 0) {
                    if (isset($calendarvaluevalue['flag_date']) && isset($calendarvaluevalue['warn']) && $calendarvaluevalue['warn'] != "" && ($value['date_id'] == $calendarvaluevalue['flag_date'])) {
                        $err_get[$key1]['warn'] = "出勤必須";
                        $flag_check = 1;
                    } else {
                        $err_get[$key1]['warn'] = "";
                    }
                }
            }
        }

        //日付などを取得
        $action = new Calendar;
        $options = $action->get_times(); // 時間帯の配列取得
        $options_rest = $action->get_times_rest(); // 時間帯の配列取得
        
        $reason = array(
            'staff' => 'スタッフ',
            'company' => '会社',
        );

        $approval = array(
            '' => '-----',
            'OK' => '会社承認済',
        );
        
        $this->view->assign("approval", $approval);
        $this->view->assign("reason", $reason);
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("options", $options);
        $this->view->assign("options_rest", $options_rest);
        $this->view->assign("err_get", $err_get); 
        $this->view->assign("dates", $dates); 
        $this->view->assign("user_name", $_SESSION["user_at"]);
        $this->view->display("err/index.tpl");
    }
 
    public function mailAction() // メールページへ
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
        
        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        
        $message = "メール送信画面";
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("message", $message);
        $this->view->assign("dates", $dates); 
        $this->view->assign("user_name", $_SESSION["user_at"]);
        $this->view->display("managements/mail.tpl");

    }
    
    public function mail_sendAction() // メール送信
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
        
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");

        $to = $_POST['to'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $headers = "From: " . sender_mail;
        
        $message = "";
        if(mb_send_mail($to, $title, $content)){
            $message = $to . " 宛にメールを送信しました";
        } else {
            $message = $to . " 宛へのメールの送信に失敗しました";
        }
        
        // 取得する年月を取得
        $action = new Calendar();
        $dates = $action->get_dates();
        
        $this->view->assign("loginUser_auth", $loginUser_auth);
        $this->view->assign("message", $message);
        $this->view->assign("dates", $dates); 
        $this->view->assign("user_name", $_SESSION["user_at"]);
        $this->view->display("managements/mail.tpl");

    }
    
    public function informAction() // コメントの記入 postページTOPに表示
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = master;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        $comment = $_POST['comment'];
        $created_at = date("Y/m/d H:i:s");
        
        // 既存コメントを格納
        $action = new Management();
        $check = $action->comment_get();
        
        // コメントがなければ作成、あれば更新
        if ($check == false) {
            $action = new Management();
            $insert = $action->inform_insert($comment, $created_at);
        } else {
            $action = new Management();
            $update = $action->inform_up($comment, $created_at);
        }
        
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: ".$uri);
    }

    public function mail_auto_sendAction() // メール送信 ※ユーザー管理ページの確定ボタンを押下したら自動で飛ぶ
    {
        // ユーザー確認
        $action = new Authority();
        $login_check = $action->login_check();
        $loginUser_auth = $login_check['auth'];
        
        // 持っている権限で開けるページなのか確認
        $A = admin;
        $action = new Authority();
        $confirm = $action->auth_ch($A, $loginUser_auth);
        
        // ユーザーname / id / mail
        $name = $_POST['username'];
        $getid = $_POST['target_user_id'];
        $getmail = $_POST['mail'];
        
        // year month取得
        $get_year = $_POST['year'];
        $get_month = $_POST['month'];
        
        // getユーザーの処理
        // getユーザーのpostデータ(シフト)を取得(月単位)
        $yearMonth = $get_year . "/" . $get_month;
        $action = new Post();
        $row = $action->get_post($yearMonth, $getid);
        
        $mail_sentence = "出勤日\n";
        foreach ($row as $key => $value) {
                    
            // 本文作成
            $mail_sentence .= $value['date_id'] . "(" . $value['week'] . ")"
                            . " 出:" . $value['start']
                            . " /退:" . $value['finish']
                            . " /休:" . $value['rest']
                            . " /計" . $value['kei']
                            . "\n"
                    ;
            
        }

        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        
        $to = $getmail; // 送信元
        $subject  = "【" . $name . "様】" . $get_year . "年" . $get_month . "月のシフトが確定しました"; // 題名
        $message  = $mail_sentence; // 本文
        $headers = "From: " . sender_mail;
        $headers .= "\n";
        $headers .= "Bcc: " . bcc_mail;
        
        $result = "";
        if(mb_send_mail($to, $subject, $message, $headers )){
            $result = "メールを送信しました";
        } else {
            $result = "メールの送信に失敗しました";
        }

        // 履歴
        $move_history['user_date_id'] = $name . "_" . date("Y/n/j");
        $move_history['user_id'] = $getid;
        $move_history['date_id'] = $get_year . "/" . $get_month;
        $move_history['past_start'] = "-";
        $move_history['past_finish'] = "-";
        $move_history['past_rest'] = "-";
        $move_history['past_kei'] = "-";
        $move_history['past_note'] = $result;
        $move_history['flag'] = "メール送信";
        $move_history['reason'] = "mail";
        $move_history['editor'] = "id:" . $_SESSION["user_id_at"] . "_" . $_SESSION["user_at"];
        $move_history['create_date'] = date("Y/m/d H:i:s");
        $move_history['past_approval'] = "-";

        $action = new Reshift;
        $history = $action->store_reshift($move_history);
        
        // 確定ボタンを押下したらフラグを立てる
        $move_confirm['user_id'] = $getid;
        $move_confirm['date_id'] = $get_year . "/" . $get_month;
        $move_confirm['editor'] = "id:" . $_SESSION["user_id_at"] . "_" . $_SESSION["user_at"];
        $move_confirm['create_date'] = date("Y/m/d H:i:s");

        $action = new Confirm;
        $confirm = $action->store_confirm($move_confirm);

        
        $uri = $_SERVER['HTTP_REFERER'];
        header("Location: ".$uri);

    }
    
}