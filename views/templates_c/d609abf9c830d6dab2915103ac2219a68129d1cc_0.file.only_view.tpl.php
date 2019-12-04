<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-04 10:56:58
  from 'C:\xampp\htdocs\attendance\views\templates\err\only_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de7126a3766c9_29138047',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd609abf9c830d6dab2915103ac2219a68129d1cc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\err\\only_view.tpl',
      1 => 1575424378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de7126a3766c9_29138047 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\attendance\\library\\smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<tr>
    <div class="form-group"><td>
        id: <?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
 / <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['username'], ENT_QUOTES, 'UTF-8', true);?>

    </td></div>
    <div class="form-group"><td>
        <?php echo $_smarty_tpl->tpl_vars['value']->value['date_id'];?>

    </td></div>        
    <div class="form-group"><td>
        <select name="start" disabled>
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['start']),$_smarty_tpl);?>

        </select>
    </td></div>
    <div class="form-group"><td>
        <select name="finish" disabled>
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['finish']),$_smarty_tpl);?>

        </select>
    </td></div>
    <div class="form-group"><td>
        <select name="rest" disabled>
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['options_rest']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['rest']),$_smarty_tpl);?>

        </select>
    </td></div>
    <div class="form-group"><td>
        <?php echo $_smarty_tpl->tpl_vars['value']->value['kei'];?>

    </td></div>
    <div class="form-group"><td>
        <?php echo $_smarty_tpl->tpl_vars['value']->value['err'];?>

    </td></div>
    <td></td>
</tr>
<?php }
}
