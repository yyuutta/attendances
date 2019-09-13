<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-13 17:35:00
  from 'C:\xampp\htdocs\attendance\views\templates\connect\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d7b54b441b377_17308470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97ecc9a9c767a2a65933813b03140daa993b9cf4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\connect\\index.tpl',
      1 => 1568363698,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d7b54b441b377_17308470 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
    <head>
        <title>LOGIN</title>
        <meta http-equiv="Content-type" content="text/html;charset=utf-8">
        <?php echo '<script'; ?>
 type="text/javascript">
            function checkFormlogin(){
                if (document.login.username.value === "" || document.login.password.value === ""){
                        alert("項目を入力して下さい。");
                        return false;
                }else{
                        document.login.submit();
                }
            }
        <?php echo '</script'; ?>
>
    </head>
    <body>
        <font size="5"><b>LOGIN</b></font><br>
        <hr width="100%">
        <font size="4" color="red"><?php echo $_smarty_tpl->tpl_vars['status']->value;?>
</font>
        <form name="login" action="" method="post">
            <table border="0" width="300" cellspacing="0" cellpadding="10">
                <tr>
                    <td>username</td>
                    <td><input type="text" name="username" value=""></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="password" name="password" value=""></td>
                </tr>
            </table>
            <br>
            <input type="hidden" name="action" value="login">
            <input type="hidden" name="eventId" value="connect">
            <input type="submit" value="enter" onclick="return checkFormlogin(); ">
        </form>
        <br>
        <br>
        <form name="register" action="" method="get">
            <input type="hidden" name="action" value="register">
            <input type="hidden" name="eventId" value="connect">
            <input type="submit" value="add_staff" >
        </form>
    </body>
</html><?php }
}
