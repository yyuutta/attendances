<select name="year" style="width:100px; height:30px;">
    <option {if $dates['year'] == $dates['year_ago'] }selected{/if} value="{$dates['year_ago']}">{$dates['year_ago']}年</option>
    <option {if $dates['year'] == $dates['year_now'] }selected{/if} value="{$dates['year_now']}">{$dates['year_now']}年</option>
    <option {if $dates['year'] == $dates['year_add'] }selected{/if} value="{$dates['year_add']}">{$dates['year_add']}年</option>
</select>
<select name="month" style="width:100px; height:30px;">
{section name="month" start=1 loop=13}
    <option {if $dates['month'] == {$smarty.section.month.index} }selected{/if} value="{$smarty.section.month.index}">{$smarty.section.month.index}月</option>
{/section}
</select>
<input type="submit" value="取 得" class="btn btn-primary btn-xs" style="width:50px; height:30px;">