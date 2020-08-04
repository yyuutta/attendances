<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-04 09:49:07
  from 'C:\xampp\htdocs\attendance\views\templates\posts\show_ch0.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f28b0837b8928_07899808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a84f5122f79ebb8113f59c8a520699b3611b5b4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\posts\\show_ch0.tpl',
      1 => 1595389329,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f28b0837b8928_07899808 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="form-group"><td>
        <?php if ($_smarty_tpl->tpl_vars['value']->value['selected_start'] == 0) {?>-<?php } else {
echo $_smarty_tpl->tpl_vars['value']->value['selected_start'];
}?>
</td></div>
<div class="form-group"><td>
        <?php if ($_smarty_tpl->tpl_vars['value']->value['selected_finish'] == 0) {?>-<?php } else {
echo $_smarty_tpl->tpl_vars['value']->value['selected_finish'];
}?>
</td></div>
<div class="form-group"><td>
        <?php if ($_smarty_tpl->tpl_vars['value']->value['selected_rest'] == 0) {?>-<?php } else {
echo $_smarty_tpl->tpl_vars['value']->value['selected_rest'];
}?>
</td></div>
<div class="form-group"><td><?php echo $_smarty_tpl->tpl_vars['value']->value['selected_kei'];?>

</td></div><?php }
}
