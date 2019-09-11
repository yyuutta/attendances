<!DOCTYPE html>
<html>
{include file="../layouts/head.tpl"}
{include file="../layouts/header.tpl"}
<body>
<div class="container">
    <div class="text-center">
        <div class="row">
            <h3>{$message}</h3>
            <BR>
            <BR>
            <form name="mail" action="" method="post">
                <div class="form-group">
                    <p>送信先アドレス</p>
                    <input type="text" name="to" size="30">
                </div>
                <BR>
                <div class="form-group">
                    <p>タイトル</p>
                    <input type="text" name="title" size="30">
                </div>
                <BR>
                <div class="form-group">
                    <p>本文</p>
                    <textarea name="content" cols="40" rows="10"></textarea>
                </div>
                <BR>
                <input type="hidden" name="action" value="mail_send">
                <input type="hidden" name="eventId" value="management">
                <input class="btn btn-primary btn-mg" type="submit" name="send" value="送信">
            </form>
        </div>
    </div>
</div>
</body>
</html>