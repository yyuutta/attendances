<!DOCTYPE html>
<html>
{include file="../layouts/head.tpl"}
{include file="../layouts/header.tpl"}
<body>
<div class="container">
    <div class="text-center">
        <div class="text-left">
            <p>{$comment['created_at']}</p>
            <h4><font color="#ff0000">{$comment['comment']|escape|nl2br}</h4></font>
        </div>
        <br>
    <div class="text-header">
        <form name="index" action="" method="get">
            <br>
            {include file="./show_header.tpl"}
        </form>
        <br>
        <br>
    </div>
    <form name="store" action="" method="post">
        <br>
        {if $dates['check'] == 1}
            <input type="submit" value="更 新" class="btn btn-danger btn-lg btn-block">
        {else}
            <h2>閲覧のみとなります</h2>
        {/if}
        <h4>入力可能範囲は翌月のみ<br>期間は当月1日～20日中</h4>
        <br>
        <div class="container-fluid">
        <div class="row">
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
                        {if $dates['check'] == 1}
                            {include file="./show_ch1.tpl"}
                        {else}
                            {include file="./show_ch0.tpl"}
                        {/if}
                    <input type="hidden" name="date_name[]" value="{$dates['year']|cat:"/"|cat:$dates['month']|cat:"/"|cat:$value['day']}">
                    {/if}
                    </tr>
                {if $value['err'] != "" && $dates['check'] == 1}
                <script type="text/javascript">
                  alert("{$value['day']} ({$value['week']})が不整合データです。すぐに訂正してください");
                </script>
                {/if}
                {/foreach}
                </tbody>
            </table>
        </div>
        </div>
        <input type="hidden" name="year" value="{$dates['year']}">
        <input type="hidden" name="month" value="{$dates['month']}">
        <input type="hidden" name="action" value="store">
        <input type="hidden" name="eventId" value="post">
    </form>
    </div>
</div>
</body>
</html>