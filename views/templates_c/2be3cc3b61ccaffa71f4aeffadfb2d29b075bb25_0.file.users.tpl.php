<?php
/* Smarty version 3.1.34-dev-7, created on 2019-09-09 17:21:38
  from 'C:\xampp\htdocs\attendance\views\templates\managements\users.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5d760b923da429_18060424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2be3cc3b61ccaffa71f4aeffadfb2d29b075bb25' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\users.tpl',
      1 => 1568017296,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d760b923da429_18060424 (Smarty_Internal_Template $_smarty_tpl) {
?><ul class="media-list">
    <p class="show-button"><b>■マスター</b></p>
    <div class="hide-area">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['value']->value['auth'] == 0) {?>
        <li class="media">
            <div class="media-left">
                id:<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>

            </div>
            <div class="media-body">
                <p><a href="index.php?action=user&eventId=management&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['user_name']->value == $_smarty_tpl->tpl_vars['value']->value['username']) {?><font color='#00F'>* </font><?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['username'], ENT_QUOTES, 'UTF-8', true);?>
</a></p>
            </div>
        </li>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    
    <br>
    
    <p class="show-button"><b>■管理者</b></p>
    <div class="hide-area">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['value']->value['auth'] == 1) {?>
        <li class="media">
            <div class="media-left">
                id:<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>

            </div>
            <div class="media-body">
                <p><a href="index.php?action=user&eventId=management&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['user_name']->value == $_smarty_tpl->tpl_vars['value']->value['username']) {?><font color='#00F'>* </font><?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['username'], ENT_QUOTES, 'UTF-8', true);?>
</a></p> 
            </div>
        </li>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    
    <br>
    
    <p class="show-button"><b>■スタッフ</b></p>
    <div class="hide-area">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['value']->value['auth'] == 2) {?>
        <li class="media">
            <div class="media-left">
                id:<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>

            </div>
            <div class="media-body">
                <p><a href="index.php?action=user&eventId=management&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['user_name']->value == $_smarty_tpl->tpl_vars['value']->value['username']) {?><font color='#00F'>* </font><?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['username'], ENT_QUOTES, 'UTF-8', true);?>
</a></p>
            </div>
        </li>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    
    <br>
    
    <p class="show-button"><b>■退社</b></p>
    <div class="hide-area">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['value']->value['auth'] == 3) {?>
        <li class="media">
            <div class="media-left">
                id:<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>

            </div>
            <div class="media-body">
                <p><a href="index.php?action=user&eventId=management&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['user_name']->value == $_smarty_tpl->tpl_vars['value']->value['username']) {?><font color='#00F'>* </font><?php }
echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['username'], ENT_QUOTES, 'UTF-8', true);?>
</a></p>
            </div>
        </li>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</ul><?php }
}
