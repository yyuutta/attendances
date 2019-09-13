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
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>{$dates['year']}/ {$dates['month']}</th>
                    <th>出勤</th>
                    <th>退勤</th>
                    <th>休憩</th>
                    <th>計</th>
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
                    {else}
                    <tr>
                    <div class="form-group"><td class="text-left col-xs-2">
                        {$value['day']} ({$value['week']}){if $value['selected_kei'] > 0}
                        <font color="#00F">●</font>{/if}<b><font color="#ff0000">{$value['err']}</font></b>
                    </td></div>
                    {include file="../posts/show_ch0.tpl"}
                    {/if}
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
        </div>