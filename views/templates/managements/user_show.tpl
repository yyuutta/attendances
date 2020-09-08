<div class="container-fluid">
    <div class="row">
    <div class="text-header">
        <form name="user_show" action="" method="get">
            {include file="../posts/show_header.tpl"}
            <input type="hidden" name="id" value="{$user['id']}">
            <input type="hidden" name="action" value="user">
            <input type="hidden" name="eventId" value="management">
        </form>
    </div>
        <BR>
        <h4>データ変更履歴</h4>
        {if $history > 0}
        {foreach from=$history key=$key item=$value}
            <p>{$key + 1}) {$value['created_at']} |{$value['flag']} |編集者{$value['editor']}
            <br>[日付] {$value['date_id']}
            <br>[出] {$value['start']} [退] {$value['finish']} [休] {$value['rest']} [計] {$value['kei']}
            <br>[都合] {$value['reason']}
            <br>[備考] {$value['note']}
            <br>[会社承認] {$value['approval']}
            <br>---------------------------------------------</p>
        {/foreach}
        {else}
        <p>{$dates['year']}年{$dates['month']}月のデータ変更履歴はありません</p>
        {/if}
        <br><br><br>
        <form name="sendmail" action="" method="post">
            {if $shift_info == "true"}
                <input class="btn btn-success btn-block" type="submit" name="mailsend_button" value="【{$dates['year']}年{$dates['month']}月分シフト】を確 定する(未使用)">
            {else}
                <h3><font color="#228b22">【{$dates['year']}年{$dates['month']}月分シフト】は確 定されています</font></h3>
                {if $loginUser_auth == 0}
                    <input class="btn btn-success btn-block" type="submit" name="mailsend_button" value="【{$dates['year']}年{$dates['month']}月分シフト】を再 確 定する">
                {/if}
            {/if}
            <input type="hidden" name="action" value="mail_auto_send">
            <input type="hidden" name="eventId" value="management">
            <input type="hidden" name="target_user_id" value="{$user['id']}">
            <input type="hidden" name="year" value="{$dates['year']}">
            <input type="hidden" name="month" value="{$dates['month']}">
            <input type="hidden" name="mail" value="{$user['mail']}">
            <input type="hidden" name="username" value="{$user['username']}">
        </form>
        <br>
        {if $shift_info == "false" and $loginUser_auth == 0}
            <form name="delete_confirm" action="" method="post">
                <button type="submit" class="btn btn-info">管理者用シフト確定ボタン復活</button>
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="eventId" value="confirm">
                <input type="hidden" name="target_user_id" value="{$user['id']}">
                <input type="hidden" name="year" value="{$dates['year']}">
                <input type="hidden" name="month" value="{$dates['month']}">
            </form>
        {/if}
        <br>
        <br>
        <form name="store2" action="" method="post">
            {if $shift_info == "true" || $loginUser_auth == 0}
            <br>
            <input type="submit" value="ID: {$user['id']} / {$user['username']|escape}さんのシフトを編集する" class="btn btn-danger btn-block" onclick="return reasonCheck();">
            <br>
            <div class="form-group"><h4>【必須項目】編集都合を選んでください</h4><td>
                <select name="reason">
                    {html_options options=$reason selected=$reason}
                </select>
            </td></div>
            <p>【注意】</p>
            <p>会社承認項目が選択されている場合は、その他項目は変更されません</p>
            <p>スタッフが登録していないデータに対して会社承認を押下してもデータは登録されません　※履歴は残る</p>
            {/if}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{$dates['year']}/ {$dates['month']}</th>
                    <th>出勤</th>
                    <th>退勤</th>
                    <th>休憩</th>
                    <th>計</th>
                    <th>備考</th>
                    <th>会社承認</th>
                </tr>
                </thead>
                <tbody>
                {foreach from=$calendar key=$key item=$value}
                    {if $value['week'] == "土" || $value['week'] == "日" || $value['holiday'] <> ""}
                    <tr bgcolor="#f5f5f5">
                        <div class="form-group">
                            <td class="text-left col-xs-2">{$value['day']} ({$value['week']})　<font size="1">{$value['holiday']}</font></td>
                        </div>
                        <div class="form-group"><td></td></div>
                        <div class="form-group"><td></td></div>
                        <div class="form-group"><td></td></div>
                        <div class="form-group"><td></td></div>
                        <div class="form-group"><td></td></div>
                        <div class="form-group"><td></td></div>
                    {else}
                        <tr>
                        <div class="form-group"><td class="text-left col-xs-2">
                            {$value['day']} ({$value['week']}){if $value['selected_kei'] > 0}
                            <font color="#00F">●</font>{/if}
                            <b><font color="#ff0000">{$value['err']}</font></b>
                            <input type="hidden" name="warn[]" value="{$value['warn']}">
                            <input type="hidden" name="week[]" value="{$value['week']}">
                        </td></div>
                        {if $shift_info == "true" || $loginUser_auth == 0}
                            {include file="../posts/show_ch1.tpl"}
                            </td></div>
                            <div class="form-group"><td><input class="form-control" type="note" name="note[]" value="{$value['note']|escape}">
                            <input type="hidden" name="now_note[]" value="{$value['note']}">
                            </td></div>
                            <div class="form-group"><td>
                                <select name="approval[]">
                                    {html_options options=$approval selected=$value['approval']}
                                </select>
                                <input type="hidden" name="now_approval[]" value="{$value['approval']}">
                            </td></div>
                            <input type="hidden" name="date_name[]" value="{$dates['year']|cat:"/"|cat:$dates['month']|cat:"/"|cat:$value['day']}">
                            </tr>
                        {else}
                            {include file="../posts/show_ch0.tpl"}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['note']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                    {$value['approval']}
                            </td></div>
                            </tr>
                        {/if}
                    </td></div>
                    {/if}
                    </tr>
                <input type="hidden" name="exist[]" value="{$value['exist']}">
                {/foreach}
                </tbody>
            </table>
        <input type="hidden" name="year" value="{$dates['year']}">
        <input type="hidden" name="month" value="{$dates['month']}">
        <input type="hidden" name="target_user_id" value="{$user['id']}">
        <input type="hidden" name="target_user_name" value="{$user['username']}">
        <input type="hidden" name="flag" value="再更新">
        <input type="hidden" name="action" value="store2">
        <input type="hidden" name="eventId" value="post">
        </form>
    </div>
</div>
        
<script>
function reasonCheck(){
    if (document.store2.reason.value === "") {
        alert("【必須項目】を選んでください");
        return false;
    }
    document.store2.submit();
}
</script>