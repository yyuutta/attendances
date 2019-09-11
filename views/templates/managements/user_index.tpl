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
            {include file="./users.tpl"}
        </div>
    </div>
    <div class="media-body">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="text-header">
                    <h2>ID: {$user['id']} / {$tag}{$user['username']|escape}さん</h2><br>
                </div>
                <BR>
                <form name="user" action="" method="post">
                    <div class="form-group">
                        <label for="name">管理権限</label>
                        <select name="auth">
                            {html_options options=$auth selected={$user['auth']}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">mail</label>
                        <input class="form-control" type="mail" name="mail" value="{$user['mail']|escape}">
                    </div>

                    <div class="form-group">
                        <label for="name">memo</label>
                        <textarea class="form-control" type="memo" name="memo">{$user['memo']|escape}</textarea>
                    </div>
                    <br>
                    <input type="hidden" name="id" value="{$user['id']}">
                    <input type="hidden" name="username" value="{$user['username']}">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="eventId" value="management">
                    <input type="hidden" name="leaving" value="{$user['leaving']}">
                    <input class="btn btn-primary btn-block" type="submit" value="更 新">
                </form>
                <BR>   
                <ul class="media-list">
                    <li>作成日:{$user['create_date']}</li>
                    <li>編集日:{$user['edit_date']}</li>
                    <li>退社日:{$user['leaving']}</li>
                </ul>
            </div>
        </div>
    </div>
</li>
</div>
</ul>               
</div>
</body>
</html>