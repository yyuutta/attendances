<?php
/* Smarty version 3.1.34-dev-7, created on 2019-08-05 18:49:27
  from 'C:\xampp\htdocs\attendance\library\views\templates\connect\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d47fba7dbe9c0_81684012',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85ee40833ecd5878051375f85aa2cc6c8744c593' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\library\\views\\templates\\connect\\index.tpl',
      1 => 1562570823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d47fba7dbe9c0_81684012 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
    <head>
        <title>ログイン</title>
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
        <font size="5"><b>ログイン</b></font><br>
        <hr width="100%">
        
        <?php echo $_smarty_tpl->tpl_vars['status']->value;?>

        
        <form name="login" action="" method="post">
            <table border="0" width="300" cellspacing="0" cellpadding="5">
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
            <input type="submit" value="ログイン" onclick="return checkFormlogin(); ">
            <input type="hidden" name="action" value="login">
            <input type="hidden" name="eventId" value="connect">
        </form>
        <br>
        <br>
        <form name="register" action="" method="post">
            <input type="submit" value="ユーザー登録" >
            <input type="hidden" name="action" value="register">
            <input type="hidden" name="eventId" value="connect">
        </form>
    </body>
</html><?php }
}
