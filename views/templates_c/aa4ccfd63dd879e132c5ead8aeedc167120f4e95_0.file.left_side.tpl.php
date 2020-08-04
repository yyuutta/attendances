<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-04 09:49:10
  from 'C:\xampp\htdocs\attendance\views\templates\managements\left_side.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f28b0862850a6_61186808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa4ccfd63dd879e132c5ead8aeedc167120f4e95' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\left_side.tpl',
      1 => 1595986406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./users.tpl' => 1,
  ),
),false)) {
function content_5f28b0862850a6_61186808 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="media-left">
    <a href="index.php?action=error&eventId=management"><h4><B>ERROR</B></h4></a>
    <?php if ($_smarty_tpl->tpl_vars['loginUser_auth']->value < 1) {?>
        <a href="index.php?action=index&eventId=dataprocess"><h4><B>DOWNLOAD</B></h4></a>
        <a href="index.php?action=mail&eventId=management"><h4><B>MAIL</B></h4></a>
        <BR>
    <?php }?>
    <?php $_smarty_tpl->_subTemplateRender("file:./users.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php }
}
