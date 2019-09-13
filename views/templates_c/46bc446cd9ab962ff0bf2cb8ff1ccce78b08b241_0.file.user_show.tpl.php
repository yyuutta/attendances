<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-12 16:43:13
  from 'C:\xampp\htdocs\attendance\views\templates\managements\user_show.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d79f711e151b2_59516630',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46bc446cd9ab962ff0bf2cb8ff1ccce78b08b241' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\user_show.tpl',
      1 => 1568274192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../posts/show_header.tpl' => 1,
    'file:../posts/show_ch0.tpl' => 1,
  ),
),false)) {
function content_5d79f711e151b2_59516630 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container-fluid">
        <div class="row">
        <div class="text-header">
            <form name="user_show" action="" method="get">
                <?php $_smarty_tpl->_subTemplateRender("file:../posts/show_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                <input type="hidden" name="action" value="user">
                <input type="hidden" name="eventId" value="management">
            </form>
        </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><?php echo $_smarty_tpl->tpl_vars['dates']->value['year'];?>
/ <?php echo $_smarty_tpl->tpl_vars['dates']->value['month'];?>
</th>
                    <th>出勤</th>
                    <th>退勤</th>
                    <th>休憩</th>
                    <th>計</th>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['calendar']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['value']->value['week'] == "土" || $_smarty_tpl->tpl_vars['value']->value['week'] == "日" || $_smarty_tpl->tpl_vars['value']->value['holiday'] <> '') {?>
                    <tr bgcolor="#f5f5f5">
                        <div class="form-group">
                            <td class="text-left col-xs-2"><?php echo $_smarty_tpl->tpl_vars['value']->value['day'];?>
 (<?php echo $_smarty_tpl->tpl_vars['value']->value['week'];?>
)　<font size="1"><?php echo $_smarty_tpl->tpl_vars['value']->value['holiday'];?>
</font></td>
                        </div>
                        <div class="form-group"><td></td></div>
                        <div class="form-group"><td></td></div>
                        <div class="form-group"><td></td></div>
                        <div class="form-group"><td></td></div>
                    <?php } else { ?>
                    <tr>
                    <div class="form-group"><td class="text-left col-xs-2">
                        <?php echo $_smarty_tpl->tpl_vars['value']->value['day'];?>
 (<?php echo $_smarty_tpl->tpl_vars['value']->value['week'];?>
)<?php if ($_smarty_tpl->tpl_vars['value']->value['selected_kei'] > 0) {?>
                        <font color="#00F">●</font><?php }?><b><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['value']->value['err'];?>
</font></b>
                    </td></div>
                    <?php $_smarty_tpl->_subTemplateRender("file:../posts/show_ch0.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                    <?php }?>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
        </div><?php }
}
