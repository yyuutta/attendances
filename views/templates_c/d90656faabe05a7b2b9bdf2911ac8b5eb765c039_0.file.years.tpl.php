<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-19 12:52:41
  from '/Applications/MAMP/htdocs/attendance/views/templates/managements/years.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3d2099a26889_92957827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd90656faabe05a7b2b9bdf2911ac8b5eb765c039' => 
    array (
      0 => '/Applications/MAMP/htdocs/attendance/views/templates/managements/years.tpl',
      1 => 1567668210,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3d2099a26889_92957827 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<form name="index" action="" method="get">
    <select name="year" style="width:100px; height:30px;">
        <option <?php if ($_smarty_tpl->tpl_vars['dates']->value['year'] == $_smarty_tpl->tpl_vars['dates']->value['year_ago']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['dates']->value['year_ago'];?>
"><?php echo $_smarty_tpl->tpl_vars['dates']->value['year_ago'];?>
年</option>
        <option <?php if ($_smarty_tpl->tpl_vars['dates']->value['year'] == $_smarty_tpl->tpl_vars['dates']->value['year_now']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['dates']->value['year_now'];?>
"><?php echo $_smarty_tpl->tpl_vars['dates']->value['year_now'];?>
年</option>
        <option <?php if ($_smarty_tpl->tpl_vars['dates']->value['year'] == $_smarty_tpl->tpl_vars['dates']->value['year_add']) {?>selected<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['dates']->value['year_add'];?>
"><?php echo $_smarty_tpl->tpl_vars['dates']->value['year_add'];?>
年</option>
    </select>
    <input type="hidden" name="action" value="index">
    <input type="hidden" name="eventId" value="management">
    <input type="submit" value="取 得" class="btn btn-primary btn-xs" style="width:70; height:30px;">
</form>
<br>
<br><?php }
}
