<!DOCTYPE html>
<html>
{include file="../layouts/head.tpl"}
{include file="../layouts/header.tpl"}
<body>
<div class="container">
<ul class="media-list">
<li class="media">
    <div class="col-md-12">
    <h2>{$target_year|escape}年 会社依頼シフト変更データ</h2><BR>
    
    {section name=i start=1 loop=13}
        <BR><BR>
        <h4>■{$smarty.section.i.index}月</h4>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>id / スタッフ</th>
                    <th>出</th>
                    <th>退</th>
                    <th>休</th>
                    <th>計</th>
                    <th>備考</th>
                    <th>フラグ</th>
                    <th>都合</th>
                    <th>会社承認</th>
                    <th>編集者</th>
                    <th>更新日</th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$reshifts key=$key item=$value}
                    {if isset($value['month']) && $value['month'] == $smarty.section.i.index}
                  
                        {if isset($value['duplicate']) && $value['duplicate'] != ""}
                            <tr bgcolor="#FFEEFF">
                        {else}
                            <tr>
                        {/if}
                            <div class="form-group"><td>
                                {$value['date_id']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['user_id']|escape} / {$value['username']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['start']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['finish']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['rest']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['kei']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['note']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['flag']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['reason']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['approval']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['editor']|escape}
                            </td></div>
                            <div class="form-group"><td>
                                {$value['date_id']|escape}
                            </td></div>
                        </tr>

                    {/if}
                {/foreach}
            </tbody>
        </table>
    {/section}
    </div>
</li>
</ul>
</div>
</body>
</html>