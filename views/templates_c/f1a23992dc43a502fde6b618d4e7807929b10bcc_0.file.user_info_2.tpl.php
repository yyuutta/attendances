<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-12 17:45:57
  from 'C:\xampp\htdocs\attendance\views\templates\managements\user_info_2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d7a05c5bd8540_84361011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1a23992dc43a502fde6b618d4e7807929b10bcc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\user_info_2.tpl',
      1 => 1568277953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d7a05c5bd8540_84361011 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\attendance\\library\\smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<table class="table table-bordered">
    <tr>
        <th>管理権限 </th>
        <td>            
            <select name="auth" disabled>
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['auth']->value,'selected'=>$_smarty_tpl->tpl_vars['user']->value['auth']),$_smarty_tpl);?>

            </select>
        </td>
    </tr>
    <tr>
        <th>テスト合否 </th>
        <td>     
            <select name="test" disabled>
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['test']->value,'selected'=>$_smarty_tpl->tpl_vars['user']->value['test']),$_smarty_tpl);?>

            </select>
        </td>
    </tr>
    <tr>
        <th>入社日 </th>
        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['indate'], ENT_QUOTES, 'UTF-8', true);?>
</td>
    </tr>
    <tr>
        <th>退社日 </th>
        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['outdate'], ENT_QUOTES, 'UTF-8', true);?>
</td>
    </tr>
    <tr>
        <th>mail </th>
        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['mail'], ENT_QUOTES, 'UTF-8', true);?>
</td>
    </tr>
    <tr>
        <th>memo </th>
        <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['memo'], ENT_QUOTES, 'UTF-8', true);?>
</td>
    </tr>  
</table><?php }
}
