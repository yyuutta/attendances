<!DOCTYPE html>
<html>
{include file="../layouts/head.tpl"}
{include file="../layouts/header.tpl"}
<body>
<div class="container">
<ul class="media-list">
<div class="row">
<li class="media">
    <div class="col-md-3">
        {include file="./left_side.tpl"}
    </div>
    <div class="media-body">
    <div class="col-md-12">
        <h2><a href="index.php?action=monthlydate&eventId=management&year={$dates['ago_y']}&month={$dates['ago_m']}&day={$dates['ago_d']}">◀ </a>
            {$year}年{$month}月{$day}日({$week})
            <a href="index.php?action=monthlydate&eventId=management&year={$dates['later_y']}&month={$dates['later_m']}&day={$dates['later_d']}"> ▶</a>
        </h2>
        <BR>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>スタッフ {$count}名</th>
                    <th>エラー</th>
                    <th>出</th>
                    <th>退</th>
                    <th>休</th>
                    <th>計</th>
                    <th>備考</th>
                </tr>
            </thead>
            <tbody>
                <form name="post_data" action="" method="post">
                    {foreach from=$date_users key=$key item=$value}
                    <tr>
                        <td>id:{$value['id']} <a href="index.php?action=user&eventId=management&id={$value['id']}">{if $user_name == $value['username']}<font color='#00F'>* </font>{/if}{$value['username']}</a></td>
                        <td><font color='#ff0000'>{$value['err']}</font></td>
                        <td>{$value['start']}</td>
                        <td>{$value['finish']}</td>
                        <td>{$value['rest']}</td>
                        <td>{$value['kei']}</td>
                        <td><textarea class="form-control" type="note" name="note[]">{$value['note']|escape}</textarea></td>
                        <input type="hidden" name="user_date_id[]" value="{$value['user_date_id']}">
                    </tr>
                    {/foreach}
                    <input type="hidden" name="action" value="note_up">
                    <input type="hidden" name="eventId" value="management">
                    <input class="btn btn-primary btn-block" type="submit" value="更 新">
                </form>
            </tbody>
        </table>
    </div>
    </div>
</li>
</div>
</ul>           
</div>
</body>
</html>