<?php
/* Smarty version 3.1.34-dev-7, created on 2020-08-04 14:38:47
  from 'C:\xampp\htdocs\attendance\views\templates\managements\user_show.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f28f467855179_64441529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46bc446cd9ab962ff0bf2cb8ff1ccce78b08b241' => 
    array (
      0 => 'C:\\xampp\\htdocs\\attendance\\views\\templates\\managements\\user_show.tpl',
      1 => 1596519521,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../posts/show_header.tpl' => 1,
    'file:../posts/show_ch1.tpl' => 1,
  ),
),false)) {
function content_5f28f467855179_64441529 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\attendance\\library\\smarty\\libs\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
?>
<div class="container-fluid">
        <div class="row">
        <div class="text-header">
            <form name="user_show" action="" method="get">
                <?php $_smarty_tpl->_subTemplateRender("file:../posts/show_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                <input type="hidden" name="action" value="user">
                <input type="hidden" name="eventId" value="management">
            </form>
        </div>
            <BR>
            <h4>データ変更履歴</h4>
            <?php if ($_smarty_tpl->tpl_vars['history']->value > 0) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['history']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                <p><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
) <?php echo $_smarty_tpl->tpl_vars['value']->value['create_date'];?>
 |<?php echo $_smarty_tpl->tpl_vars['value']->value['flag'];?>
 |編集者<?php echo $_smarty_tpl->tpl_vars['value']->value['editor'];?>

                <br>[日付] <?php echo $_smarty_tpl->tpl_vars['value']->value['date_id'];?>

                <br>[出] <?php echo $_smarty_tpl->tpl_vars['value']->value['start'];?>
 [退] <?php echo $_smarty_tpl->tpl_vars['value']->value['finish'];?>
 [休] <?php echo $_smarty_tpl->tpl_vars['value']->value['rest'];?>
 [計] <?php echo $_smarty_tpl->tpl_vars['value']->value['kei'];?>

                <br>[都合] <?php echo $_smarty_tpl->tpl_vars['value']->value['reason'];?>

                <br>[備考] <?php echo $_smarty_tpl->tpl_vars['value']->value['note'];?>

                <br>[会社承認] <?php echo $_smarty_tpl->tpl_vars['value']->value['approval'];?>

                <br>---------------------------------------------</p>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            <?php } else { ?>
            <p><?php echo $_smarty_tpl->tpl_vars['dates']->value['year'];?>
年<?php echo $_smarty_tpl->tpl_vars['dates']->value['month'];?>
月のデータ変更履歴はありません</p>
            <?php }?>
            <br><br><br>
            <form name="sendmail" action="" method="post">
                <?php if ($_smarty_tpl->tpl_vars['shift_info']->value == "true") {?>
                    <input class="btn btn-success btn-block" type="submit" value="【<?php echo $_smarty_tpl->tpl_vars['dates']->value['year'];?>
年<?php echo $_smarty_tpl->tpl_vars['dates']->value['month'];?>
月分シフト】を確 定する">
                <?php } else { ?>
                    <p>【<?php echo $_smarty_tpl->tpl_vars['dates']->value['year'];?>
年<?php echo $_smarty_tpl->tpl_vars['dates']->value['month'];?>
月分シフト】は確 定されています</p>
                <?php }?>    
                
                <input type="hidden" name="action" value="mail_auto_send">
                <input type="hidden" name="eventId" value="management">
                <input type="hidden" name="target_user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                <input type="hidden" name="year" value="<?php echo $_smarty_tpl->tpl_vars['dates']->value['year'];?>
">
                <input type="hidden" name="month" value="<?php echo $_smarty_tpl->tpl_vars['dates']->value['month'];?>
">
                <input type="hidden" name="mail" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['mail'];?>
">
                <input type="hidden" name="username" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">
            </form>
            <br><br><br>
            
            <form name="store2" action="" method="post">
                <br>
                <input type="submit" value="ID: <?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
 / <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value['username'], ENT_QUOTES, 'UTF-8', true);?>
さんのシフトを編集する" class="btn btn-danger btn-block" onclick="return reasonCheck();">
                <br>
                <div class="form-group">【必須項目】編集都合について選んでください<td>
                    <select name="reason">
                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['reason']->value,'selected'=>$_smarty_tpl->tpl_vars['reason']->value),$_smarty_tpl);?>

                    </select>
                </td></div>
                <p>【注意】会社承認項目が選択されている場合は、その他項目は変更されません</p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?php echo $_smarty_tpl->tpl_vars['dates']->value['year'];?>
/ <?php echo $_smarty_tpl->tpl_vars['dates']->value['month'];?>
</th>
                        <th>出勤</th>
                        <th>退勤</th>
                        <th>休憩</th>
                        <th>計</th>
                        <th>備考</th>
                        <th>会社承認</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['calendar']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['value']->value['week'] == "土" || $_smarty_tpl->tpl_vars['value']->value['week'] == "日" || $_smarty_tpl->tpl_vars['value']->value['holiday'] <> '') {?>
                        <tr bgcolor="#f5f5f5">
                            <div class="form-group">
                                <td class="text-left col-xs-2"><?php echo $_smarty_tpl->tpl_vars['value']->value['day'];?>
 (<?php echo $_smarty_tpl->tpl_vars['value']->value['week'];?>
)　<font size="1"><?php echo $_smarty_tpl->tpl_vars['value']->value['holiday'];?>
</font></td>
                            </div>
                            <div class="form-group"><td></td></div>
                            <div class="form-group"><td></td></div>
                            <div class="form-group"><td></td></div>
                            <div class="form-group"><td></td></div>
                            <div class="form-group"><td></td></div>
                            <div class="form-group"><td></td></div>
                        <?php } else { ?>
                        <tr>
                        <div class="form-group"><td class="text-left col-xs-2">
                            <?php echo $_smarty_tpl->tpl_vars['value']->value['day'];?>
 (<?php echo $_smarty_tpl->tpl_vars['value']->value['week'];?>
)<?php if ($_smarty_tpl->tpl_vars['value']->value['selected_kei'] > 0) {?>
                            <font color="#00F">●</font><?php }?>
                            <b><font color="#ff0000"><?php echo $_smarty_tpl->tpl_vars['value']->value['err'];?>
</font></b>
                            <input type="hidden" name="warn[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['warn'];?>
">
                            <input type="hidden" name="week[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['week'];?>
">
                        </td></div>
                        <?php $_smarty_tpl->_subTemplateRender("file:../posts/show_ch1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                        </td></div>
                        <div class="form-group"><td><input class="form-control" type="note" name="note[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value['note'], ENT_QUOTES, 'UTF-8', true);?>
">
                        <input type="hidden" name="now_note[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['note'];?>
">
                        </td></div>
                        <div class="form-group"><td>
                            <select name="approval[]">
                                <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['approval']->value,'selected'=>$_smarty_tpl->tpl_vars['value']->value['approval']),$_smarty_tpl);?>

                            </select>
                            <input type="hidden" name="now_approval[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['approval'];?>
">
                        </td></div>
                        <input type="hidden" name="date_name[]" value="<?php echo (((($_smarty_tpl->tpl_vars['dates']->value['year']).("/")).($_smarty_tpl->tpl_vars['dates']->value['month'])).("/")).($_smarty_tpl->tpl_vars['value']->value['day']);?>
">
                        <?php }?>
                        </tr>
                    <input type="hidden" name="exist[]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['exist'];?>
">
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
            <input type="hidden" name="year" value="<?php echo $_smarty_tpl->tpl_vars['dates']->value['year'];?>
">
            <input type="hidden" name="month" value="<?php echo $_smarty_tpl->tpl_vars['dates']->value['month'];?>
">
            <input type="hidden" name="target_user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
            <input type="hidden" name="target_user_name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
">
            <input type="hidden" name="flag" value="再更新">
            <input type="hidden" name="action" value="store2">
            <input type="hidden" name="eventId" value="post">
            </form>
        </div>
        </div>
        
        <?php echo '<script'; ?>
>
        function reasonCheck(){
            if (document.store2.reason.value === "") {
                alert("【必須項目】を選んでください");
                return false;
            }
            document.store2.submit();
        }
        <?php echo '</script'; ?>
><?php }
}
