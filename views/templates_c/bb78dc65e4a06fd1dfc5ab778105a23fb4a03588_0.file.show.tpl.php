<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-12 16:30:37
  from 'C:\xampp\htdocs\attendance\views\templates\posts\show.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d79f41d2544c1_12006358',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb78dc65e4a06fd1dfc5ab778105a23fb4a03588' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\posts\\show.tpl',
      1 => 1568273427,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/head.tpl' => 1,
    'file:../layouts/header.tpl' => 1,
    'file:./show_header.tpl' => 1,
    'file:./show_ch1.tpl' => 1,
    'file:./show_ch0.tpl' => 1,
  ),
),false)) {
function content_5d79f41d2544c1_12006358 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:../layouts/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<div class="container">
    <div class="text-center">
        <div class="text-left">
            <p><?php echo $_smarty_tpl->tpl_vars['comment']->value['created_at'];?>
</p>
            <h4><font color="#ff0000"><?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['comment'], ENT_QUOTES, 'UTF-8', true));?>
</h4></font>
        </div>
        <br>
    <div class="text-header">
        <form name="index" action="" method="get">
            <br>
            <?php $_smarty_tpl->_subTemplateRender("file:./show_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </form>
        <br>
        <br>
    </div>
    <form name="store" action="" method="post">
        <br>
        <?php if ($_smarty_tpl->tpl_vars['dates']->value['check'] == 1) {?>
            <input type="submit" value="更 新" class="btn btn-danger btn-lg btn-block">
        <?php } else { ?>
            <h2>閲覧のみとなります</h2>
        <?php }?>
        <h4>入力可能範囲は翌月のみ<br>期間は当月1日～20日中</h4>
        <br>
        <div class="container-fluid">
        <div class="row">
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
                        <?php if ($_smarty_tpl->tpl_vars['dates']->value['check'] == 1) {?>
                            <?php $_smarty_tpl->_subTemplateRender("file:./show_ch1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                        <?php } else { ?>
                            <?php $_smarty_tpl->_subTemplateRender("file:./show_ch0.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                        <?php }?>
                    <input type="hidden" name="date_name[]" value="<?php echo (((($_smarty_tpl->tpl_vars['dates']->value['year']).("/")).($_smarty_tpl->tpl_vars['dates']->value['month'])).("/")).($_smarty_tpl->tpl_vars['value']->value['day']);?>
">
                    <?php }?>
                    </tr>
                <?php if ($_smarty_tpl->tpl_vars['value']->value['err'] != '' && $_smarty_tpl->tpl_vars['dates']->value['check'] == 1) {?>
                <?php echo '<script'; ?>
 type="text/javascript">
                  alert("<?php echo $_smarty_tpl->tpl_vars['value']->value['day'];?>
 (<?php echo $_smarty_tpl->tpl_vars['value']->value['week'];?>
)が不整合データです。すぐに訂正してください");
                <?php echo '</script'; ?>
>
                <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
        </div>
        <input type="hidden" name="year" value="<?php echo $_smarty_tpl->tpl_vars['dates']->value['year'];?>
">
        <input type="hidden" name="month" value="<?php echo $_smarty_tpl->tpl_vars['dates']->value['month'];?>
">
        <input type="hidden" name="action" value="store">
        <input type="hidden" name="eventId" value="post">
    </form>
    </div>
</div>
</body>
</html><?php }
}
