<form name="err_data" action="" method="post">
        <tr>
            <div class="form-group"><td>
                id: {$value['id']} / {$value['username']|escape}
            </td></div>
            <div class="form-group"><td>
                {$value['date_id']}
            </td></div>        
            <div class="form-group"><td>
                <select name="start">
                    {html_options options=$options selected=$value['start']}
                </select>
            </td></div>
            <div class="form-group"><td>
                <select name="finish">
                    {html_options options=$options selected=$value['finish']}
                </select>
            </td></div>
            <div class="form-group"><td>
                <select name="rest">
                    {html_options options=$options_rest selected=$value['rest']}
                </select>
            </td></div>
            <div class="form-group"><td>
                {$value['kei']}
            </td></div>
            <div class="form-group"><td>
                {$value['err']}
            </td></div>
            <td><input class="btn btn-primary btn-block" type="submit" value="更 新"></td>
            <input type="hidden" name="user_id" value="{$value['id']}">
            <input type="hidden" name="user_date_id" value="{$value['user_date_id']}">
        </tr>
    <input type="hidden" name="action" value="err_update">
    <input type="hidden" name="eventId" value="management">
</form>