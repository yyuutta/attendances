<?php
/* Smarty version 3.1.34-dev-7, created on 2019-08-07 14:57:01
  from 'C:\xampp\htdocs\attendance\views\templates\layouts\app.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d4a682d2a97c2_57218225',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95989638b583ba997ed3e2ff8fff21910b81f39a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\layouts\\app.tpl',
      1 => 1565157419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./head.tpl' => 1,
    'file:./header.tpl' => 1,
    'file:../posts/show.tpl' => 1,
  ),
),false)) {
function content_5d4a682d2a97c2_57218225 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:./head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<?php $_smarty_tpl->_subTemplateRender("file:./header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="container">
    <?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>

    <?php $_smarty_tpl->_subTemplateRender("file:../posts/show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

</body>
</html><?php }
}
