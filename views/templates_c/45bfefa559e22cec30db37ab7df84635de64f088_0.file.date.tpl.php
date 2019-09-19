<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-17 11:16:11
  from 'C:\xampp\htdocs\attendance\views\templates\managements\date.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d8041eb8804b4_95162125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45bfefa559e22cec30db37ab7df84635de64f088' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\date.tpl',
      1 => 1568686569,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/head.tpl' => 1,
    'file:../layouts/header.tpl' => 1,
    'file:./users.tpl' => 1,
  ),
),false)) {
function content_5d8041eb8804b4_95162125 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:../layouts/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<div class="container">
<ul class="media-list">
<div class="row">
<li class="media">
    <div class="col-md-3">
        <div class="media-left">
            <?php $_smarty_tpl->_subTemplateRender("file:./users.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
    <div class="media-body">
    <div class="col-md-12">
        <h2><a href="index.php?action=monthlydate&eventId=management&year=<?php echo $_smarty_tpl->tpl_vars['dates']->value['ago_y'];?>
&month=<?php echo $_smarty_tpl->tpl_vars['dates']->value['ago_m'];?>
&day=<?php echo $_smarty_tpl->tpl_vars['dates']->value['ago_d'];?>
">◀ </a>
            <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
年<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
月<?php echo $_smarty_tpl->tpl_vars['day']->value;?>
日(<?php echo $_smarty_tpl->tpl_vars['week']->value;?>
)
            <a href="index.php?action=monthlydate&eventId=management&year=<?php echo $_smarty_tpl->tpl_vars['dates']->value['later_y'];?>
&month=<?php echo $_smarty_tpl->tpl_vars['dates']->value['later_m'];?>
&day=<?php echo $_smarty_tpl->tpl_vars['dates']->value['later_d'];?>
"> ▶</a>
        </h2>
        <BR>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>スタッフ <?php echo $_smarty_tpl->tpl_vars['count']->value;?>
名</th>
                    <th>エラー</th>
                    <th>出</th>
                    <th>退</th>
                    <th>休</th>
                    <th>計</th>
                    <th>備考</th>
                </tr>
            </thead>
            <tbody>
                <form name="post_data" action="" method="post">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['date_users']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                    <tr>
                        <td>id:<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
 <a href="index.php?action=user&eventId=management&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['user_name']->value == $_smarty_tpl->tpl_vars['value']->value['username']) {?><font color='#00F'>* </font><?php }
echo $_smarty_tpl->tpl_vars['value']->value['username'];?>
</a></td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['err'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['start'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['finish'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['rest'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['kei'];?>
</td>
                        <td><textarea class="form-control" type="note" name="note[]"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['note'], ENT_QUOTES, 'UTF-8', true);?>
</textarea></td>
                        <input type="hidden" name="user_date_id[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['user_date_id'];?>
">
                    </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <input type="hidden" name="action" value="note_up">
                    <input type="hidden" name="eventId" value="management">
                    <input class="btn btn-primary btn-block" type="submit" value="更 新">
                </form>
            </tbody>
        </table>
    </div>
    </div>
</li>
</div>
</ul>           
</div>
</body>
</html><?php }
}
