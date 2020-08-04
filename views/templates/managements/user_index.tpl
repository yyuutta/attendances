<!DOCTYPE html>
<html>
{include file="../layouts/head.tpl"}
{include file="../layouts/header.tpl"}
<body>
<div class="container">
<ul class="media-list">
<div class="row">
<li class="media">
    <div class="col-md-2">
        {include file="./left_side.tpl"}
    </div>
    <div class="media-body">
        <div class="row">
            <div class="col-md-9 col-md-offset-2">
                <div class="text-header">
                    <h2>ID: {$user['id']} / {$tag}{$user['username']|escape}さん
                    &emsp;&emsp;{if $user['test'] == "notClear"}<font color='red'>試用期間中</font>{/if}</h2>
                </div>
                <BR>
                {if $loginUser_auth < 1}
                    {include file="./user_info_1.tpl"}
                {else}
                    {include file="./user_info_2.tpl"}
                {/if}
                
                <BR>   
                <ul class="media-list">
                    <li>作成日:{$user['create_date']}</li>
                    <li>編集日:{$user['edit_date']}</li>
                    <li>退社日:{$user['leaving']}</li>
                </ul>
                <BR>
                <h3>～シフト一覧～</h3>
                {include file="./user_show.tpl"}
            </div>
        </div>
    </div>
</li>
</div>
</ul>               
</div>
</body>
</html>