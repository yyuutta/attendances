<div class="form-group"><td>
    <select name="start[]">
        {html_options options=$options selected=$value['selected_start']}
    </select>
</td></div>
<div class="form-group"><td>
    <select name="finish[]">
        {html_options options=$options selected=$value['selected_finish']}
    </select>
</td></div>
<div class="form-group"><td>
    <select name="rest[]">
        {html_options options=$options_rest selected=$value['selected_rest']}
    </select>
</td></div>
<div class="form-group"><td>{$value['selected_kei']}
</td></div>
<input type="hidden" name="now_start[]" value="{$value['selected_start']}">
<input type="hidden" name="now_finish[]" value="{$value['selected_finish']}">
<input type="hidden" name="now_rest[]" value="{$value['selected_rest']}">
<input type="hidden" name="now_kei[]" value="{$value['selected_kei']}">