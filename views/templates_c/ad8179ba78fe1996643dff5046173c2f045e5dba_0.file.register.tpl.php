<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-02 12:41:14
  from 'C:\xampp\htdocs\attendance\views\templates\connect\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de487da6ea735_06901321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad8179ba78fe1996643dff5046173c2f045e5dba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\connect\\register.tpl',
      1 => 1575258021,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/head.tpl' => 1,
  ),
),false)) {
function content_5de487da6ea735_06901321 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>  
<html lang="ja">
    <head>
        <title>ADD_NEW_STAFF</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <?php echo '<script'; ?>
 type="text/javascript">
            function checkForminsert(){
                if (document.insert.username.value === "" || document.insert.password.value === "" || document.insert.accessCode.value === ""){
                        alert("項目を入力して下さい。");
                        return false;
                }else{
                        document.insert.submit();
                }
            }
         <?php echo '</script'; ?>
> 
    </head>
    <?php $_smarty_tpl->_subTemplateRender("file:../layouts/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <body>
    <div class="container">
        <font size="5"><b>ADD_NEW_STAFF</b></font><br>
        <hr width="100%">
        <font size="4" color="red"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['status']->value, ENT_QUOTES, 'UTF-8', true);?>
</font>
        <form name="insert" action="" method="post">
            <table border="0" width="500" cellspacing="0" cellpadding="10">
                <!--username--> 
                <tr>
                    <td style="padding-bottom:20px;" align="left" nowrap>username</td>
                    <td style="padding-bottom:20px;" bgcolor="" valign="middle" width="450"><input type="text" name="username" style="ime-mode:disabled" value="">　※20文字以内</td>
                </tr>
                <!--password--> 
                <tr>
                    <td style="padding-bottom:20px;" align="left" nowrap>password</td>
                    <td style="padding-bottom:20px;" bgcolor="" valign="middle" width="450"><input type="password" name="password" value="">　※数字(6～20桁)</td>
                </tr>
                <!--mail--> 
                <tr>
                    <td style="padding-bottom:20px;" align="left" nowrap>mail</td>
                    <td style="padding-bottom:20px;" bgcolor="" valign="middle" width="450"><input type="mail" name="mail" value=""></td>
                </tr>
                <!--accessCode--> 
                <tr>
                    <td style="padding-bottom:20px;" align="left" nowrap>accessCode</td>
                    <td style="padding-bottom:20px;" bgcolor="" valign="middle" width="450"><input type="password" name="accessCode" value="">　※登録権限</td>
                </tr>
            </table>
            <br>
            <input type="hidden" name="action" value="create">
            <input type="hidden" name="eventId" value="connect">
            <input type="button" value="create" onclick="return checkForminsert();" class="btn btn-primary">
            <br>
            <br>
            <br>
            <a href="index.php" class="btn btn-primary">Return</a>
        </form>
    </div>
    </body>
</html><?php }
}
