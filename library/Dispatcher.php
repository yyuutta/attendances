<?php
require_once(dirname(__FILE__) . "/../models/Connect.php"); //DBに接続する為

// 各コントローラーに振り分けていく
class Dispatcher
{
    public function dispatch()
    {
            // イベントID取得
            if (isset($_POST['eventId']) && isset($_POST['action'])) {
                    $eventId = $_POST['eventId'];
                    $action = $_POST['action'];
            } elseif (isset($_GET['eventId']) && isset($_GET['action'])) {
                    $eventId = $_GET['eventId'];
                    $action = $_GET['action']; 
            } else {
                    $eventId = 'connect';
                    $action = 'index';
            }
        
        //最初の文字がアルファベットなら大文字→コントローラークラス名格納
        $className = ucfirst(strtolower($eventId)) . 'Controller';

        // クラスファイル読込
        require_once(dirname(__FILE__) . '/../controllers/' . $className . '.php');

        // クラスインスタンス生成
        $controllerInstance = new $className();

        // アクションメソッドを実行
        $actionMethod = $action . 'Action';
        $controllerInstance->$actionMethod();
    }
}