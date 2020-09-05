<?php

// 祝日などは models/Holiday.phpに記載有→更新する事

//DB_connect
//local
define("db_user_local","root"); //ユーザー名
define("db_pass_local","root"); //パスワード
define("db_host_local","localhost"); //ホスト名
define("db_name_local","attendance"); //データベース名
define("db_type_local","mysql"); //データベースの種類
//本番
define("db_user","root"); //ユーザー名
define("db_pass","Z3iEPd2g"); //パスワード
define("db_host","localhost"); //ホスト名
define("db_name","attendance"); //データベース名
define("db_type","mysql"); //データベースの種類

define("app","attendance"); // アプリ名

// ユーザー登録時のaccessCode
define("secret_master","eagle012"); // マスターとして登録される
define("secret_staff","eagle"); // スタッフとして登録される

define("lastday","20"); // ユーザーがシフト入力できる期間の最終日 Calendar.php

// 管理権限 ManagementController.php
define("master","0");
define("admin","1");
define("staff","2");
define("out","3");

// メール用 ManagementController.php
define("sender_mail",""); // 送信アドレス
define("bcc_mail",""); // bcc送信アドレス