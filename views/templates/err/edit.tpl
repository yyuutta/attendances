<form name="errdata" action="" method="post">
        <tr>
            <div class="form-group"><td>
                <a href="index.php?action=user&eventId=management&id={$value['id']}">
                id: {$value['id']} / {$value['username']|escape}
                </a>
            </td></div>
            <div class="form-group"><td>
                {$value['date_id']}
                ({$value['week']})
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
                <font color="#ff0000">{$value['err']}</font>
            </td></div>
            <div class="form-group"><td>
                <input class="form-control" name="note" value="{$value['note']|escape}">
            </td></div>
            <div class="form-group"><td>
                <select name="reason">
                    {html_options options=$reason selected=$reason}
                </select>
            </td></div>
            <div class="form-group"><td>
                <select name="approval">
                    {html_options options=$approval selected=$value['approval']}
                </select>
            </td></div>
            <td>
            {if $value['confirm'] == "off" || $loginUser_auth == 0}
                <input type="submit" class="btn btn-primary btn-block" value="更 新">
            {else}
                <p>シフト確定済</p>
            {/if}
            </td>
            <input type="hidden" name="user_id" value="{$value['id']}">
            <input type="hidden" name="date_id" value="{$value['date_id']}">
            <input type="hidden" name="user_date_id" value="{$value['user_date_id']}">
            <input type="hidden" name="now_start" value="{$value['start']}">
            <input type="hidden" name="now_finish" value="{$value['finish']}">
            <input type="hidden" name="now_rest" value="{$value['rest']}">
            <input type="hidden" name="now_kei" value="{$value['kei']}">
            <input type="hidden" name="now_note" value="{$value['note']}">
            <input type="hidden" name="now_approval" value="{$value['approval']}">
            <input type="hidden" name="exist" value="{$value['exist']}">
            <input type="hidden" name="week" value="{$value['week']}">
            <input type="hidden" name="warn" value="{$value['warn']}">
        </tr>
    <input type="hidden" name="action" value="store2">
    <input type="hidden" name="eventId" value="post">
    <input type="hidden" name="flag" value="エラー訂正">
</form>