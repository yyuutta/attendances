<?php

// 祝日などは models/Holiday.phpに記載有→更新する事

//DB_connect
//本番
define("db_user","bceirclonjchwy"); //ユーザー名
define("db_pass","cce917c7f5840406d896f69affc0e58f6982291e6d0cbd0d827764ddad8dd8b6"); //パスワード
define("db_host","ec2-107-20-15-85.compute-1.amazonaws.com"); //ホスト名
define("db_name","postgresql-pointy-15512"); //データベース名
define("db_type","postgresql"); //データベースの種類

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