<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-09 17:20:40
  from 'C:\xampp\htdocs\attendance\views\templates\managements\user_index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d760b58b63926_52182691',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '087f8a1f7bfc14f2a74944ce61724b3209456abb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\user_index.tpl',
      1 => 1568017238,
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
function content_5d760b58b63926_52182691 (Smarty_Internal_Template $_smarty_tpl) {
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
<div class="row">
<li class="media">
    <div class="col-md-3">
        <div class="media-left">
            <?php $_smarty_tpl->_subTemplateRender("file:./users.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </div>
    <div class="media-body">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-header">
                    <h2>ID: <?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
 / <?php echo $_smarty_tpl->tpl_vars['tag']->value;
echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['username'], ENT_QUOTES, 'UTF-8', true);?>
さん</h2><br>
                </div>
                <BR>
                <form name="user" action="" method="post">
                    <div class="form-group">
                        <label for="name">管理権限</label>
                        <select name="auth">
                            <?php ob_start();
echo $_smarty_tpl->tpl_vars['user']->value['auth'];
$_prefixVariable1 = ob_get_clean();
echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['auth']->value,'selected'=>$_prefixVariable1),$_smarty_tpl);?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">mail</label>
                        <input class="form-control" type="mail" name="mail" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['mail'], ENT_QUOTES, 'UTF-8', true);?>
">
                    </div>

                    <div class="form-group">
                        <label for="name">memo</label>
                        <textarea class="form-control" type="memo" name="memo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['memo'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                    </div>
                    <br>
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                    <input type="hidden" name="username" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="eventId" value="management">
                    <input type="hidden" name="leaving" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['leaving'];?>
">
                    <input class="btn btn-primary btn-block" type="submit" value="更 新">
                </form>
                <BR>   
                <ul class="media-list">
                    <li>作成日:<?php echo $_smarty_tpl->tpl_vars['user']->value['create_date'];?>
</li>
                    <li>編集日:<?php echo $_smarty_tpl->tpl_vars['user']->value['edit_date'];?>
</li>
                    <li>退社日:<?php echo $_smarty_tpl->tpl_vars['user']->value['leaving'];?>
</li>
                </ul>
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
