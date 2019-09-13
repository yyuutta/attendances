<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-12 18:01:19
  from 'C:\xampp\htdocs\attendance\views\templates\layouts\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d7a095f0ca1f2_03458592',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bbdd983dc6db075daeaceb0728b28622e1f31f22' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\layouts\\header.tpl',
      1 => 1568278876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d7a095f0ca1f2_03458592 (Smarty_Internal_Template $_smarty_tpl) {
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
                <a class="navbar-brand" href="index.php">FB-<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user_name']->value, ENT_QUOTES, 'UTF-8', true);?>
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
