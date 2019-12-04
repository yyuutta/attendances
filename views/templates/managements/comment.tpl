<form name="comment" action="" method="post">
    <div class="form-group">
        <label for="name">Comment</label>
        <textarea class="form-control" type="comment" name="comment" rows="7">{$comment['comment']|escape}</textarea>
        <p>更新日:{$comment['created_at']}</p>
    </div>
    <input type="hidden" name="action" value="inform">
    <input type="hidden" name="eventId" value="management">
    <input class="btn btn-primary btn-block btn-xm" type="submit" value="up">
</form>