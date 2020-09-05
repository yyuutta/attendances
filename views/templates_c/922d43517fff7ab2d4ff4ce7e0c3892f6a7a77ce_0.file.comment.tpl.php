<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-19 12:52:41
  from '/Applications/MAMP/htdocs/attendance/views/templates/managements/comment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3d20999cd688_98528349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '922d43517fff7ab2d4ff4ce7e0c3892f6a7a77ce' => 
    array (
      0 => '/Applications/MAMP/htdocs/attendance/views/templates/managements/comment.tpl',
      1 => 1575426818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3d20999cd688_98528349 (Smarty_Internal_Template $_smarty_tpl) {
?><form name="comment" action="" method="post">
    <div class="form-group">
        <label for="name">Comment</label>
        <textarea class="form-control" type="comment" name="comment" rows="7"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value['comment'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
        <p>更新日:<?php echo $_smarty_tpl->tpl_vars['comment']->value['created_at'];?>
</p>
    </div>
    <input type="hidden" name="action" value="inform">
    <input type="hidden" name="eventId" value="management">
    <input class="btn btn-primary btn-block btn-xm" type="submit" value="up">
</form><?php }
}
