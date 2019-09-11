<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-10 14:31:00
  from 'C:\xampp\htdocs\attendance\views\templates\managements\comment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d77351436ff20_58356081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3b004c297e95c3d3fb1b90df13856cd63c58a28' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\comment.tpl',
      1 => 1568093458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d77351436ff20_58356081 (Smarty_Internal_Template $_smarty_tpl) {
?><form name="comment" action="" method="post">
    <div class="form-group">
        <label for="name">Comment</label>
        <textarea class="form-control" type="comment" name="comment" rows="7"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['comment'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
        <p><?php echo $_smarty_tpl->tpl_vars['comment']->value['created_at'];?>
</p>
    </div>
    <input type="hidden" name="action" value="inform">
    <input type="hidden" name="eventId" value="management">
    <input class="btn btn-primary btn-block btn-xm" type="submit" value="up">
</form><?php }
}
