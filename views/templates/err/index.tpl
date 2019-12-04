<!DOCTYPE html>
<html>
{include file="../layouts/head.tpl"}
{include file="../layouts/header.tpl"}
<body>
<div class="container">
<ul class="media-list">
<li class="media">
    <div class="col-md-12">
    <h2>エラーデータ</h2><BR>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id / スタッフ</th>
                    <th>日付</th>
                    <th>出</th>
                    <th>退</th>
                    <th>休</th>
                    <th>計</th>
                    <th>エラー</th>
                    <th>変更</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$err_get key=$key item=$value}
                {if $loginUser_auth == 0}
                    {include file="./edit.tpl"}
                {else}
                    {include file="./only_view.tpl"}
                {/if}
            {/foreach}
            </tbody>
        </table>
    </div>
</li>
</ul>
</div>
</body>
</html>