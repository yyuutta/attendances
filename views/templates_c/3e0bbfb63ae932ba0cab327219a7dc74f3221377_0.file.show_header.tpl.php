<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-04 09:49:07
  from 'C:\xampp\htdocs\attendance\views\templates\posts\show_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f28b0837aa1d8_83601162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e0bbfb63ae932ba0cab327219a7dc74f3221377' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\posts\\show_header.tpl',
      1 => 1568273476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f28b0837aa1d8_83601162 (Smarty_Internal_Template $_smarty_tpl) {
?><select name="year" style="width:100px; height:30px;">
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
<select name="month" style="width:100px; height:30px;">
<?php
$_smarty_tpl->tpl_vars['__smarty_section_month'] = new Smarty_Variable(array());
if (true) {
for ($__section_month_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_month']->value['index'] = 1; $__section_month_0_iteration <= 12; $__section_month_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_month']->value['index']++){
?>
    <option <?php ob_start();
echo (isset($_smarty_tpl->tpl_vars['__smarty_section_month']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_month']->value['index'] : null);
$_prefixVariable1 = ob_get_clean();
if ($_smarty_tpl->tpl_vars['dates']->value['month'] == $_prefixVariable1) {?>selected<?php }?> value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_month']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_month']->value['index'] : null);?>
"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_month']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_month']->value['index'] : null);?>
月</option>
<?php
}
}
?>
</select>
<input type="submit" value="取 得" class="btn btn-primary btn-xs" style="width:50px; height:30px;"><?php }
}
