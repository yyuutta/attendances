<br>
<form name="index" action="" method="get">
    <select name="year" style="width:100px; height:30px;">
        <option {if $dates['year'] == $dates['year_ago'] }selected{/if} value="{$dates['year_ago']}">{$dates['year_ago']}年</option>
        <option {if $dates['year'] == $dates['year_now'] }selected{/if} value="{$dates['year_now']}">{$dates['year_now']}年</option>
        <option {if $dates['year'] == $dates['year_add'] }selected{/if} value="{$dates['year_add']}">{$dates['year_add']}年</option>
    </select>
    <input type="hidden" name="action" value="index">
    <input type="hidden" name="eventId" value="management">
    <input type="submit" value="取 得" class="btn btn-primary btn-xs" style="width:70; height:30px;">
</form>
<br>
<br>