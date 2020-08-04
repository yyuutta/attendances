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
    <p>【注意】会社承認項目が選択されている場合は、その他項目は変更されません</p>
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
                    <th>備考</th>
                    <th>【必須】都合</th>
                    <th>会社承認</th>
                    <th>変更</th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$err_get key=$key item=$value}
                {if $loginUser_auth >= 0}
                    {include file="./edit.tpl"}
                {else} <!-- 現時点では管理者以上は閲覧&編集可とする為、以下分岐は行わない -->
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