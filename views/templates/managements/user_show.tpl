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
                <p>{$key + 1}) {$value['create_date']} |{$value['flag']} |編集者{$value['editor']}
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
                    <input class="btn btn-success btn-block" type="submit" value="【{$dates['year']}年{$dates['month']}月分シフト】を確 定する">
                {else}
                    <p>【{$dates['year']}年{$dates['month']}月分シフト】は確 定されています</p>
                {/if}    
                
                <input type="hidden" name="action" value="mail_auto_send">
                <input type="hidden" name="eventId" value="management">
                <input type="hidden" name="target_user_id" value="{$user['id']}">
                <input type="hidden" name="year" value="{$dates['year']}">
                <input type="hidden" name="month" value="{$dates['month']}">
                <input type="hidden" name="mail" value="{$user['mail']}">
                <input type="hidden" name="username" value="{$user['username']}">
            </form>
            <br><br><br>
            
            <form name="store2" action="" method="post">
                <br>
                <input type="submit" value="ID: {$user['id']} / {$user['username']|escape}さんのシフトを編集する" class="btn btn-danger btn-block" onclick="return reasonCheck();">
                <br>
                <div class="form-group">【必須項目】編集都合について選んでください<td>
                    <select name="reason">
                        {html_options options=$reason selected=$reason}
                    </select>
                </td></div>
                <p>【注意】会社承認項目が選択されている場合は、その他項目は変更されません</p>
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