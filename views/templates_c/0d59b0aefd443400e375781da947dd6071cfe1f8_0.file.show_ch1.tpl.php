<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-04 12:10:58
  from 'C:\xampp\htdocs\attendance\views\templates\posts\show_ch1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f28d1c2567863_29309235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d59b0aefd443400e375781da947dd6071cfe1f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\posts\\show_ch1.tpl',
      1 => 1595928889,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f28d1c2567863_29309235 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\attendance\\library\\smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<div class="form-group"><td>
    <select name="start[]">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['selected_start']),$_smarty_tpl);?>

    </select>
</td></div>
<div class="form-group"><td>
    <select name="finish[]">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['selected_finish']),$_smarty_tpl);?>

    </select>
</td></div>
<div class="form-group"><td>
    <select name="rest[]">
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options_rest']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['selected_rest']),$_smarty_tpl);?>

    </select>
</td></div>
<div class="form-group"><td><?php echo $_smarty_tpl->tpl_vars['value']->value['selected_kei'];?>

</td></div>
<input type="hidden" name="now_start[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['selected_start'];?>
">
<input type="hidden" name="now_finish[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['selected_finish'];?>
">
<input type="hidden" name="now_rest[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['selected_rest'];?>
">
<input type="hidden" name="now_kei[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['selected_kei'];?>
"><?php }
}
