<?php
/* Smarty version 3.1.34-dev-7, created on 2019-08-06 16:56:34
  from 'C:\xampp\htdocs\attendance\views\templates\layouts\app.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d4932b22adaa7_32586343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67f47a1090caf93c2ab2218b28fbdd3ed1013934' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\layouts\\app.php',
      1 => 1565078192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d4932b22adaa7_32586343 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>
session_start();
<?php echo '?>';?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>fb-attendance</title>
        <LINK REL="SHORTCUT ICON" HREF="https://www.rakuten.ne.jp/gold/freshbox/favicon.ico">
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
        
        <!-- cssの呼び出し -->
        <link rel="stylesheet" href="" type="text/css">
        
        <!-- jsファイルの呼び出し -->
        <?php echo '<script'; ?>
 type="text/javascript" src=""><?php echo '</script'; ?>
>
        
    </head>
    <body>
        
        <?php echo '<?php ';?>
require("./header.php"); <?php echo '?>';?>


        <div class="container">
            a
            <?php echo '<?php ';?>
include("../posts/show.tpl"); <?php echo '?>';?>

         
        </div>
    </body>
</html><?php }
}
