<?php

ini_set('display_errors', 1);

session_start();

require_once(dirname(__FILE__) . "/../../attendance/library/Dispatcher.php");

$dispatcher = new Dispatcher();
$dispatcher->dispatch();