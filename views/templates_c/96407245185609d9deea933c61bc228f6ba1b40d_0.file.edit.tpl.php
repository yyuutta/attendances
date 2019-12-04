<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-04 10:53:51
  from 'C:\xampp\htdocs\attendance\views\templates\err\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de711af1f4670_93175478',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96407245185609d9deea933c61bc228f6ba1b40d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\err\\edit.tpl',
      1 => 1575424361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de711af1f4670_93175478 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\attendance\\library\\smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<form name="err_data" action="" method="post">
        <tr>
            <div class="form-group"><td>
                id: <?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
 / <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['username'], ENT_QUOTES, 'UTF-8', true);?>

            </td></div>
            <div class="form-group"><td>
                <?php echo $_smarty_tpl->tpl_vars['value']->value['date_id'];?>

            </td></div>        
            <div class="form-group"><td>
                <select name="start">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['start']),$_smarty_tpl);?>

                </select>
            </td></div>
            <div class="form-group"><td>
                <select name="finish">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['finish']),$_smarty_tpl);?>

                </select>
            </td></div>
            <div class="form-group"><td>
                <select name="rest">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options_rest']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['rest']),$_smarty_tpl);?>

                </select>
            </td></div>
            <div class="form-group"><td>
                <?php echo $_smarty_tpl->tpl_vars['value']->value['kei'];?>

            </td></div>
            <div class="form-group"><td>
                <?php echo $_smarty_tpl->tpl_vars['value']->value['err'];?>

            </td></div>
            <td><input class="btn btn-primary btn-block" type="submit" value="更 新"></td>
            <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
            <input type="hidden" name="user_date_id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['user_date_id'];?>
">
        </tr>
    <input type="hidden" name="action" value="err_update">
    <input type="hidden" name="eventId" value="management">
</form><?php }
}
