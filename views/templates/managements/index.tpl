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
        <div class="media-left">
            {if $loginUser_auth < 1}
                <a href="index.php?action=index&eventId=dataprocess"><h4><B>DOWNLOAD</B></h4></a>
                {* <a href="index.php?action=mail&eventId=management"><h4><B>MAIL</B></h4></a> *}
                <a href="index.php?action=error&eventId=management"><h4><B>ERROR</B></h4></a>
                <BR>
                {include file="./comment.tpl"}
                <BR>
                <BR>
            {/if}
            {include file="./users.tpl"}
        </div>
    </div>
    <div class="media-body">
        <div class="col-md-12">
            <div class="text-header">
                {include file="./years.tpl"}
            </div>
            {section name=i start=1 loop=13}
                <table class="table table-bordered">
                    <thead><h3>{$smarty.section.i.index}月</h3>
                    <tr>
                        {foreach from=$weeks key=$key item=$value}
                            <th class="col-xs-1">{$value}</th>
                        {/foreach}
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        {foreach from=$calendar[$smarty.section.i.index] key=$key item=$value}
                            {if $value['week'] == "土" || $value['week'] == "日" || isset($value['holiday']) && $value['holiday'] <> ""}
                                <td class="p-3 mb-2 bg-success text-white">
                                    <div class="day_height">
                                        {$value['day']}{if isset($value['holiday'])} <font size="1">{$value['holiday']}</font>{/if}
                                    </div>
                                </td>
                            {else}
                                <td class="p-3 mb-2 text-white"> 
                                    <a href="index.php?action=monthlydate&eventId=management&year={$dates['year']}&month={$smarty.section.i.index}&day={$value['day']}">
                                    <div class="day_height">
                                        <B>{$value['day']}</B>
                                        {foreach from=$counts key=$key item=$val}
                                            {if $val['date_id'] == $dates['year']|cat:"/"|cat:$smarty.section.i.index|cat:"/"|cat:$value['day']}
                                                <BR><font size="2">人数: {$val['user_c']}</font>
                                                <BR><font size="2">時間: {$val['kei_c']}</font>
                                            {/if}
                                        {/foreach}
                                    </div>
                                    </a>
                                </td>
                            {/if}
                        {if $value['week'] == "土" && $value['day'] != ""}
                        </tr>
                        <tr>
                        {/if}
                        {/foreach}
                        </tr>
                    </tbody>
                </table>
            {/section}
        </div>
    </div>
</li>
</div>
</ul>               
</div>
</body>
</html>