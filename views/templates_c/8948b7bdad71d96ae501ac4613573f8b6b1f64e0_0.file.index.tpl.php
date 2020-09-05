<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-07 17:34:14
  from 'C:\xampp\htdocs\attendance\views\templates\history\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f2d1206a138c0_48845845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8948b7bdad71d96ae501ac4613573f8b6b1f64e0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\history\\index.tpl',
      1 => 1596789251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/head.tpl' => 1,
    'file:../layouts/header.tpl' => 1,
  ),
),false)) {
function content_5f2d1206a138c0_48845845 (Smarty_Internal_Template $_smarty_tpl) {
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
    <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['target_year']->value, ENT_QUOTES, 'UTF-8', true);?>
年 会社依頼シフト変更データ</h2><BR>
    
    <?php
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if (true) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 1; $__section_i_0_iteration <= 12; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
        <BR><BR>
        <h4>■<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null);?>
月</h4>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>id / スタッフ</th>
                    <th>出</th>
                    <th>退</th>
                    <th>休</th>
                    <th>計</th>
                    <th>備考</th>
                    <th>フラグ</th>
                    <th>都合</th>
                    <th>会社承認</th>
                    <th>編集者</th>
                    <th>更新日</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reshifts']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                    <?php if (isset($_smarty_tpl->tpl_vars['value']->value['month']) && $_smarty_tpl->tpl_vars['value']->value['month'] == (isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)) {?>
                  
                        <?php if (isset($_smarty_tpl->tpl_vars['value']->value['duplicate']) && $_smarty_tpl->tpl_vars['value']->value['duplicate'] != '') {?>
                            <tr bgcolor="#FFEEFF">
                        <?php } else { ?>
                            <tr>
                        <?php }?>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['date_id'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['user_id'], ENT_QUOTES, 'UTF-8', true);?>
 / <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['username'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['start'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['finish'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['rest'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['kei'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['note'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['flag'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['reason'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['approval'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['editor'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['create_date'], ENT_QUOTES, 'UTF-8', true);?>

                            </td></div>
                        </tr>

                    <?php }?>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    <?php
}
}
?>
    </div>
</li>
</ul>
</div>
</body>
</html><?php }
}
