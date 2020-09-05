<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-19 12:52:50
  from '/Applications/MAMP/htdocs/attendance/views/templates/managements/user_info_1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3d20a20c3982_79214116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59c126b48adff138bbfd2304100a10c230d25129' => 
    array (
      0 => '/Applications/MAMP/htdocs/attendance/views/templates/managements/user_info_1.tpl',
      1 => 1595229504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3d20a20c3982_79214116 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/MAMP/htdocs/attendance/library/smarty/libs/plugins/function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<form name="user" action="" method="post">
    <div class="form-group">
        <label for="name">管理権限 </label>
        <select name="auth">
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['auth']->value,'selected'=>$_smarty_tpl->tpl_vars['user']->value['auth']),$_smarty_tpl);?>

        </select>
        &emsp;&emsp;
        <label for="name">事業部 </label>
        <select name="department">
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['department']->value,'selected'=>$_smarty_tpl->tpl_vars['user']->value['department']),$_smarty_tpl);?>

        </select> 
        &emsp;&emsp;
        <label for="name">テスト合否 </label>
        <select name="test">
            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['test']->value,'selected'=>$_smarty_tpl->tpl_vars['user']->value['test']),$_smarty_tpl);?>

        </select>
    </div>
    <div class="form-group">
        <label for="name">入社日</label>
        <input class="form-control" type="indate" name="indate" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['indate'], ENT_QUOTES, 'UTF-8', true);?>
">
    </div>
    <div class="form-group">
        <label for="name">退社日</label>
        <input class="form-control" type="outdate" name="outdate" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['outdate'], ENT_QUOTES, 'UTF-8', true);?>
">
    </div>
    <div class="form-group">
        <label for="name">mail</label>
        <input class="form-control" type="mail" name="mail" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['mail'], ENT_QUOTES, 'UTF-8', true);?>
">
    </div>
    <div class="form-group">
        <label for="name">memo</label>
        <textarea class="form-control" type="memo" name="memo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['memo'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    </div>
    <br>
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
    <input type="hidden" name="username" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="eventId" value="management">
    <input type="hidden" name="leaving" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['leaving'];?>
">
    <input class="btn btn-primary btn-block" type="submit" value="更 新">
</form>
<?php }
}
