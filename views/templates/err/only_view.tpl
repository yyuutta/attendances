<tr>
    <div class="form-group"><td>
        id: {$value['id']} / {$value['username']|escape}
    </td></div>
    <div class="form-group"><td>
        {$value['date_id']}
    </td></div>        
    <div class="form-group"><td>
        <select name="start" disabled>
            {html_options options=$options selected=$value['start']}
        </select>
    </td></div>
    <div class="form-group"><td>
        <select name="finish" disabled>
            {html_options options=$options selected=$value['finish']}
        </select>
    </td></div>
    <div class="form-group"><td>
        <select name="rest" disabled>
            {html_options options=$options_rest selected=$value['rest']}
        </select>
    </td></div>
    <div class="form-group"><td>
        {$value['kei']}
    </td></div>
    <div class="form-group"><td>
        {$value['err']}
    </td></div>
    <div class="form-group"><td>
        {$value['note']|escape}
    </td></div>
    <div class="form-group"><td>
        <select name="reason" disabled>
            {html_options options=$options selected=$value['reason']}
        </select>
    </td></div>
    <div class="form-group"><td>
        {$value['approval']}
    </td></div>
    <td></td>
</tr>
