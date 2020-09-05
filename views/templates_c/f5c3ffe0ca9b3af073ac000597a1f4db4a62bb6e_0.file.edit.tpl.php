<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-19 12:52:44
  from '/Applications/MAMP/htdocs/attendance/views/templates/err/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3d209c650324_13590565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5c3ffe0ca9b3af073ac000597a1f4db4a62bb6e' => 
    array (
      0 => '/Applications/MAMP/htdocs/attendance/views/templates/err/edit.tpl',
      1 => 1596679130,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3d209c650324_13590565 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/Applications/MAMP/htdocs/attendance/library/smarty/libs/plugins/function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<form name="errdata" action="" method="post">
        <tr>
            <div class="form-group"><td>
                <a href="index.php?action=user&eventId=management&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
                id: <?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
 / <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['username'], ENT_QUOTES, 'UTF-8', true);?>

                </a>
            </td></div>
            <div class="form-group"><td>
                <?php echo $_smarty_tpl->tpl_vars['value']->value['date_id'];?>

                (<?php echo $_smarty_tpl->tpl_vars['value']->value['week'];?>
)
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
                <font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['value']->value['err'];?>
</font>
            </td></div>
            <div class="form-group"><td>
                <input class="form-control" name="note" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['note'], ENT_QUOTES, 'UTF-8', true);?>
">
            </td></div>
            <div class="form-group"><td>
                <select name="reason">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['reason']->value,'selected'=>$_smarty_tpl->tpl_vars['reason']->value),$_smarty_tpl);?>

                </select>
            </td></div>
            <div class="form-group"><td>
                <select name="approval">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['approval']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['approval']),$_smarty_tpl);?>

                </select>
            </td></div>
            <td>
            <?php if ($_smarty_tpl->tpl_vars['value']->value['confirm'] == "off" || $_smarty_tpl->tpl_vars['loginUser_auth']->value == 0) {?>
                <input type="submit" class="btn btn-primary btn-block" value="更 新">
            <?php } else { ?>
                <p>シフト確定済</p>
            <?php }?>
            </td>
            <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
            <input type="hidden" name="date_id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['date_id'];?>
">
            <input type="hidden" name="user_date_id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['user_date_id'];?>
">
            <input type="hidden" name="now_start" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['start'];?>
">
            <input type="hidden" name="now_finish" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['finish'];?>
">
            <input type="hidden" name="now_rest" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['rest'];?>
">
            <input type="hidden" name="now_kei" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['kei'];?>
">
            <input type="hidden" name="now_note" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['note'];?>
">
            <input type="hidden" name="now_approval" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['approval'];?>
">
            <input type="hidden" name="exist" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['exist'];?>
">
            <input type="hidden" name="week" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['week'];?>
">
            <input type="hidden" name="warn" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['warn'];?>
">
        </tr>
    <input type="hidden" name="action" value="store2">
    <input type="hidden" name="eventId" value="post">
    <input type="hidden" name="flag" value="エラー訂正">
</form><?php }
}
