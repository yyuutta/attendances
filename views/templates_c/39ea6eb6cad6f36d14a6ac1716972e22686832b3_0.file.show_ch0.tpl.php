<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-19 12:52:39
  from '/Applications/MAMP/htdocs/attendance/views/templates/posts/show_ch0.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3d20973ec3b8_93108018',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39ea6eb6cad6f36d14a6ac1716972e22686832b3' => 
    array (
      0 => '/Applications/MAMP/htdocs/attendance/views/templates/posts/show_ch0.tpl',
      1 => 1595389330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3d20973ec3b8_93108018 (Smarty_Internal_Template $_smarty_tpl) {
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
