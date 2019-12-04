<?php
/* Smarty version 3.1.34-dev-7, created on 2019-12-04 10:38:57
  from 'C:\xampp\htdocs\attendance\views\templates\err\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5de70e31713172_28930876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e04da765c525d50ac5ee714bbb0514a63e1ed4b9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\err\\index.tpl',
      1 => 1575423534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/head.tpl' => 1,
    'file:../layouts/header.tpl' => 1,
    'file:./edit.tpl' => 1,
    'file:./only_view.tpl' => 1,
  ),
),false)) {
function content_5de70e31713172_28930876 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<?php $_smarty_tpl->_subTemplateRender("file:../layouts/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:../layouts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>
<div class="container">
<ul class="media-list">
<li class="media">
    <div class="col-md-12">
    <h2>エラーデータ</h2><BR>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id / スタッフ</th>
                    <th>日付</th>
                    <th>出</th>
                    <th>退</th>
                    <th>休</th>
                    <th>計</th>
                    <th>エラー</th>
                    <th>変更</th>
                </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['err_get']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['loginUser_auth']->value == 0) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:./edit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php } else { ?>
                    <?php $_smarty_tpl->_subTemplateRender("file:./only_view.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php }?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</li>
</ul>
</div>
</body>
</html><?php }
}
