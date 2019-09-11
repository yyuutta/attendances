<?php
/* Smarty version 3.1.34-dev-7, created on 2019-08-05 18:49:52
  from 'C:\xampp\htdocs\attendance\library\views\templates\connect\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d47fbc0ad7910_33272039',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08a1888ead0680492668a192afa74ee20c35fee1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\library\\views\\templates\\connect\\register.tpl',
      1 => 1564979724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d47fbc0ad7910_33272039 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>  
<html lang="ja">
    <head>
        <title>新規ユーザー登録</title>
        <meta http-equiv="Content-type" content="text/html;charset=utf-8">
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
    <body>
    <header>
	    <font size="5"><b>新規ユーザー登録</b></font><br>
            <hr width="100%">
    </header>
    <?php echo $_smarty_tpl->tpl_vars['status']->value;?>

    <br>
 
        <form name="insert" action="" method="post">
            <table border="0" width="500" cellspacing="0" cellpadding="5">
                <!--username--> 
                <tr>
                    <td align="left" nowrap>username</td>
                    <td bgcolor="" valign="middle" width="450"><input type="text" name="username" style="ime-mode:disabled" value="">　※20文字以内</td>
                </tr>
                <!--password--> 
                <tr>
                    <td align="left" nowrap>password</td>
                    <td bgcolor="" valign="middle" width="450"><input type="password" name="password" value="">　※数字(4～20桁)</td>
                </tr>
                <!--accessCode--> 
                <tr>
                    <td align="left" nowrap>accessCode</td>
                    <td bgcolor="" valign="middle" width="450"><input type="password" name="accessCode" value="">　※登録権限コード</td>
                </tr>
            </table>
            <br>
            <input type="button" value="登録" onclick="return checkForminsert();">
            <input type="hidden" name="action" value="create">
            <input type="hidden" name="eventId" value="connect">
        </form>
    </body>
</html><?php }
}
