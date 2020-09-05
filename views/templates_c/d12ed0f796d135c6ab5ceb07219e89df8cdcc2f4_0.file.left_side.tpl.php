<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-19 12:52:41
  from '/Applications/MAMP/htdocs/attendance/views/templates/managements/left_side.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f3d20999d85d4_28389180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd12ed0f796d135c6ab5ceb07219e89df8cdcc2f4' => 
    array (
      0 => '/Applications/MAMP/htdocs/attendance/views/templates/managements/left_side.tpl',
      1 => 1596766698,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./users.tpl' => 1,
  ),
),false)) {
function content_5f3d20999d85d4_28389180 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="media-left">
    <a href="index.php?action=error&eventId=management"><h4><B>ERROR</B></h4></a>
    <?php if ($_smarty_tpl->tpl_vars['loginUser_auth']->value < 1) {?>
        <a href="index.php?action=index&eventId=dataprocess"><h4><B>DOWNLOAD</B></h4></a>
        <a href="index.php?action=mail&eventId=management"><h4><B>MAIL</B></h4></a>
        <BR>
        <h4><B>会社都合シフト変更履歴</B></h4>
        <a href="index.php?action=index&eventId=reshift&getyear=<?php echo $_smarty_tpl->tpl_vars['dates']->value['year_ago'];?>
"><B>【<?php echo $_smarty_tpl->tpl_vars['dates']->value['year_ago'];?>
】</B></a>
        <a href="index.php?action=index&eventId=reshift&getyear=<?php echo $_smarty_tpl->tpl_vars['dates']->value['year_now'];?>
"><B>【<?php echo $_smarty_tpl->tpl_vars['dates']->value['year_now'];?>
】</B></a>
    <?php }?>
    <BR><BR><BR>
    <?php $_smarty_tpl->_subTemplateRender("file:./users.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php }
}
