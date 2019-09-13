<form name="user" action="" method="post">
    <div class="form-group">
        <label for="name">管理権限 </label>
        <select name="auth">
            {html_options options=$auth selected=$user['auth']}
        </select>
        &emsp;&emsp;
        <label for="name">テスト合否 </label>
        <select name="test">
            {html_options options=$test selected=$user['test']}
        </select>
    </div>
    <div class="form-group">
        <label for="name">入社日</label>
        <input class="form-control" type="indate" name="indate" value="{$user['indate']|escape}">
    </div>
    <div class="form-group">
        <label for="name">退社日</label>
        <input class="form-control" type="outdate" name="outdate" value="{$user['outdate']|escape}">
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
