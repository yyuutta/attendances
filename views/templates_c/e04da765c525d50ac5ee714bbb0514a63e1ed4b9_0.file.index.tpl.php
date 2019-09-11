<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-05 13:15:54
  from 'C:\xampp\htdocs\attendance\views\templates\err\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d708bfac78ae4_50619736',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e04da765c525d50ac5ee714bbb0514a63e1ed4b9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\err\\index.tpl',
      1 => 1567651580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/head.tpl' => 1,
    'file:../layouts/header.tpl' => 1,
  ),
),false)) {
function content_5d708bfac78ae4_50619736 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\attendance\\library\\smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<!DOCTYPE html>
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
                <form name="err_data" action="" method="post">
                        <tr>
                            <div class="form-group"><td>
                                id: <?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
 / <?php echo $_smarty_tpl->tpl_vars['value']->value['username'];?>

                            </td></div>
                            <div class="form-group"><td>
                                <?php echo $_smarty_tpl->tpl_vars['value']->value['date_id'];?>

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
                                <?php echo $_smarty_tpl->tpl_vars['value']->value['err'];?>

                            </td></div>
                            <td><input class="btn btn-primary btn-block" type="submit" value="更 新"></td>
                            <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
                            <input type="hidden" name="user_date_id" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['user_date_id'];?>
">
                        </tr>
                    <input type="hidden" name="action" value="err_update">
                    <input type="hidden" name="eventId" value="management">
                </form>
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
