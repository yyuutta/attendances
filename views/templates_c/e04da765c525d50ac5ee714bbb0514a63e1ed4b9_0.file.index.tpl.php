<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-05 14:01:24
  from 'C:\xampp\htdocs\attendance\views\templates\err\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f2a3d241d6e89_54207024',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e04da765c525d50ac5ee714bbb0514a63e1ed4b9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\err\\index.tpl',
      1 => 1596603682,
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
function content_5f2a3d241d6e89_54207024 (Smarty_Internal_Template $_smarty_tpl) {
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
    <p>【注意】会社承認項目が選択されている場合は、その他項目は変更されません</p>
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
                    <th>備考</th>
                    <th>都合</th>
                    <th>会社承認</th>
                    <th>変更</th>
                </tr>
            </thead>
            <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['err_get']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['loginUser_auth']->value >= 0) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:./edit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                <?php } else { ?> <!-- 現時点では管理者以上は閲覧&編集可とする為、以下分岐は行わない -->
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
