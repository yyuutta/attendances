<?php
/* Smarty version 3.1.34-dev-7, created on 2019-08-29 11:07:29
  from 'C:\xampp\htdocs\attendance\views\templates\posts\show_ch0.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d6733615296a1_07649170',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a84f5122f79ebb8113f59c8a520699b3611b5b4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\posts\\show_ch0.tpl',
      1 => 1567044447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d6733615296a1_07649170 (Smarty_Internal_Template $_smarty_tpl) {
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
