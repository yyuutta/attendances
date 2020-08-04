<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-04 12:10:58
  from 'C:\xampp\htdocs\attendance\views\templates\managements\user_index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f28d1c2512e64_43221871',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '087f8a1f7bfc14f2a74944ce61724b3209456abb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\user_index.tpl',
      1 => 1595995732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../layouts/head.tpl' => 1,
    'file:../layouts/header.tpl' => 1,
    'file:./left_side.tpl' => 1,
    'file:./user_info_1.tpl' => 1,
    'file:./user_info_2.tpl' => 1,
    'file:./user_show.tpl' => 1,
  ),
),false)) {
function content_5f28d1c2512e64_43221871 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="col-md-2">
        <?php $_smarty_tpl->_subTemplateRender("file:./left_side.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
    <div class="media-body">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="text-header">
                    <h2>ID: <?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
 / <?php echo $_smarty_tpl->tpl_vars['tag']->value;
echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['username'], ENT_QUOTES, 'UTF-8', true);?>
さん
                    &emsp;&emsp;<?php if ($_smarty_tpl->tpl_vars['user']->value['test'] == "notClear") {?><font color='red'>試用期間中</font><?php }?></h2>
                </div>
                <BR>
                <?php if ($_smarty_tpl->tpl_vars['loginUser_auth']->value < 1) {?>
                    <?php $_smarty_tpl->_subTemplateRender("file:./user_info_1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php } else { ?>
                    <?php $_smarty_tpl->_subTemplateRender("file:./user_info_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php }?>
                
                <BR>   
                <ul class="media-list">
                    <li>作成日:<?php echo $_smarty_tpl->tpl_vars['user']->value['create_date'];?>
</li>
                    <li>編集日:<?php echo $_smarty_tpl->tpl_vars['user']->value['edit_date'];?>
</li>
                    <li>退社日:<?php echo $_smarty_tpl->tpl_vars['user']->value['leaving'];?>
</li>
                </ul>
                <BR>
                <h3>～シフト一覧～</h3>
                <?php $_smarty_tpl->_subTemplateRender("file:./user_show.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </div>
</li>
</div>
</ul>               
</div>
</body>
</html><?php }
}
