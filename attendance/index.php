<?php

ini_set('display_errors', 1);

session_start();

//ローカルじゃなかったら
if($_SERVER['SERVER_NAME'] != "localhost") {
    require_once(dirname(__FILE__) . "/attendance/library/Dispatcher.php");
} else {
    require_once(dirname(__FILE__) . "/../library/Dispatcher.php");
}

$dispatcher = new Dispatcher();
$dispatcher->dispatch();