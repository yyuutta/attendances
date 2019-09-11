<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-10 14:35:26
  from 'C:\xampp\htdocs\attendance\views\templates\managements\mail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d77361ea08938_63212995',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbfa7ae27fc68cd8cacc75b97a56c9856ee26663' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\mail.tpl',
      1 => 1568093399,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/head.tpl' => 1,
    'file:../layouts/header.tpl' => 1,
  ),
),false)) {
function content_5d77361ea08938_63212995 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:../layouts/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<div class="container">
    <div class="text-center">
        <div class="row">
            <h3><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h3>
            <BR>
            <BR>
            <form name="mail" action="" method="post">
                <div class="form-group">
                    <p>送信先アドレス</p>
                    <input type="text" name="to" size="30">
                </div>
                <BR>
                <div class="form-group">
                    <p>タイトル</p>
                    <input type="text" name="title" size="30">
                </div>
                <BR>
                <div class="form-group">
                    <p>本文</p>
                    <textarea name="content" cols="40" rows="10"></textarea>
                </div>
                <BR>
                <input type="hidden" name="action" value="mail_send">
                <input type="hidden" name="eventId" value="management">
                <input class="btn btn-primary btn-mg" type="submit" name="send" value="送信">
            </form>
        </div>
    </div>
</div>
</body>
</html><?php }
}
