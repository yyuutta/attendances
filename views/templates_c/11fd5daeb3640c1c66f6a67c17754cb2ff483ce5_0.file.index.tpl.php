<?php
/* Smarty version 3.1.34-dev-7, created on 2019-11-29 12:16:57
  from 'C:\xampp\htdocs\attendance\views\templates\managements\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de08da97ad722_46628963',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11fd5daeb3640c1c66f6a67c17754cb2ff483ce5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\index.tpl',
      1 => 1574997410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/head.tpl' => 1,
    'file:../layouts/header.tpl' => 1,
    'file:./comment.tpl' => 1,
    'file:./users.tpl' => 1,
    'file:./years.tpl' => 1,
  ),
),false)) {
function content_5de08da97ad722_46628963 (Smarty_Internal_Template $_smarty_tpl) {
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
            <?php if ($_smarty_tpl->tpl_vars['loginUser_auth']->value < 1) {?>
                <a href="index.php?action=index&eventId=dataprocess"><h4><B>DOWNLOAD</B></h4></a>
                                <a href="index.php?action=error&eventId=management"><h4><B>ERROR</B></h4></a>
                <BR>
                <?php $_smarty_tpl->_subTemplateRender("file:./comment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <BR>
                <BR>
            <?php }?>
            <?php $_smarty_tpl->_subTemplateRender("file:./users.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
    <div class="media-body">
        <div class="col-md-12">
            <div class="text-header">
                <?php $_smarty_tpl->_subTemplateRender("file:./years.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
            <?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if (true) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 1; $__section_i_0_iteration <= 12; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                <table class="table table-bordered">
                    <thead><h3><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
月</h3>
                    <tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['weeks']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                            <th class="col-xs-1"><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</th>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['calendar']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['value']->value['week'] == "土" || $_smarty_tpl->tpl_vars['value']->value['week'] == "日" || isset($_smarty_tpl->tpl_vars['value']->value['holiday']) && $_smarty_tpl->tpl_vars['value']->value['holiday'] <> '') {?>
                                <td class="p-3 mb-2 bg-success text-white">
                                    <div class="day_height">
                                        <?php echo $_smarty_tpl->tpl_vars['value']->value['day'];
if (isset($_smarty_tpl->tpl_vars['value']->value['holiday'])) {?> <font size="1"><?php echo $_smarty_tpl->tpl_vars['value']->value['holiday'];?>
</font><?php }?>
                                    </div>
                                </td>
                            <?php } else { ?>
                                <td class="p-3 mb-2 text-white"> 
                                    <a href="index.php?action=monthlydate&eventId=management&year=<?php echo $_smarty_tpl->tpl_vars['dates']->value['year'];?>
&month=<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
&day=<?php echo $_smarty_tpl->tpl_vars['value']->value['day'];?>
">
                                    <div class="day_height">
                                        <B><?php echo $_smarty_tpl->tpl_vars['value']->value['day'];?>
</B>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['counts']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
                                            <?php if ($_smarty_tpl->tpl_vars['val']->value['date_id'] == (((($_smarty_tpl->tpl_vars['dates']->value['year']).("/")).((isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null))).("/")).($_smarty_tpl->tpl_vars['value']->value['day'])) {?>
                                                <BR><font size="2">人数: <?php echo $_smarty_tpl->tpl_vars['val']->value['user_c'];?>
</font>
                                                <BR><font size="2">時間: <?php echo $_smarty_tpl->tpl_vars['val']->value['kei_c'];?>
</font>
                                            <?php }?>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </div>
                                    </a>
                                </td>
                            <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['value']->value['week'] == "土" && $_smarty_tpl->tpl_vars['value']->value['day'] != '') {?>
                        </tr>
                        <tr>
                        <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </tr>
                    </tbody>
                </table>
            <?php
}
}
?>
        </div>
    </div>
</li>
</div>
</ul>               
</div>
</body>
</html><?php }
}
