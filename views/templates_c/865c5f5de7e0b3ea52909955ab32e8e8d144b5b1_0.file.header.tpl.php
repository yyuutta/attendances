<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-05 10:46:17
  from '/Applications/MAMP/htdocs/attendance/views/templates/layouts/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f536c79719123_97070006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '865c5f5de7e0b3ea52909955ab32e8e8d144b5b1' => 
    array (
      0 => '/Applications/MAMP/htdocs/attendance/views/templates/layouts/header.tpl',
      1 => 1599302640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f536c79719123_97070006 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_name']->value, ENT_QUOTES, 'UTF-8', true);?>
</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($_smarty_tpl->tpl_vars['loginUser_auth']->value < 2) {?>
                        <li><a href="index.php?year=<?php echo $_smarty_tpl->tpl_vars['dates']->value['year'];?>
&action=index&eventId=management">Management</a></li>
                    <?php }?>
                    <li><a href="index.php?action=logout&eventId=connect">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header><?php }
}
