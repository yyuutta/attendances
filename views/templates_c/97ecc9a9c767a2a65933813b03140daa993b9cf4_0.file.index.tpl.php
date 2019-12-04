<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-02 12:45:47
  from 'C:\xampp\htdocs\attendance\views\templates\connect\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de488eb981430_40604149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '97ecc9a9c767a2a65933813b03140daa993b9cf4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\connect\\index.tpl',
      1 => 1575258289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/head.tpl' => 1,
  ),
),false)) {
function content_5de488eb981430_40604149 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
    <head>
        <title>LOGIN</title>
        <meta http-equiv="content-type" charset="utf-8">
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
    <?php $_smarty_tpl->_subTemplateRender("file:../layouts/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <body>
    <div class="container">
        <font size="5"><b>LOGIN</b></font><br>
        <hr width="100%">
        <font size="4" color="red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8', true);?>
</font>
        <form name="login" action="" method="post">

            <table border="0" width="350" cellspacing="0" cellpadding="10">
                <tr>
                    <td style="padding-bottom:20px;">username</td>
                    <td style="padding-bottom:20px;"><input type="text" name="username" value=""></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="password" name="password" value=""></td>
                </tr>
            </table>
            <br>
            <input type="hidden" name="action" value="login">
            <input type="hidden" name="eventId" value="connect">
            <input type="submit" value="enter" onclick="return checkFormlogin();" class="btn btn-primary">
        </form>
        <br>
        <br>
        <form name="register" action="" method="get">
            <input type="hidden" name="action" value="register">
            <input type="hidden" name="eventId" value="connect">
            <input type="submit" value="add_staff" class="btn btn-primary">
        </form>
    </div>
    </body>
</html><?php }
}
