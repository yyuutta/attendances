<ul class="media-list">
    <p class="show-button"><b>■マスター</b></p>
    <div class="hide-area">
        {foreach from=$users key=$key item=$value}
        {if $value['auth'] == 0}
        <li class="media">
            <div class="media-left">
                id:{$value['id']}
            </div>
            <div class="media-body">
                <p><a href="index.php?action=user&eventId=management&id={$value['id']}">{if $user_name == $value['username']}<font color='#00F'>* </font>{/if}{$value['username']|escape}</a></p>
            </div>
        </li>
        {/if}
        {/foreach}
    </div>
    
    <br>
    
    <p class="show-button"><b>■管理者</b></p>
    <div class="hide-area">
        {foreach from=$users key=$key item=$value}
        {if $value['auth'] == 1}
        <li class="media">
            <div class="media-left">
                id:{$value['id']}
            </div>
            <div class="media-body">
                <p><a href="index.php?action=user&eventId=management&id={$value['id']}">{if $user_name == $value['username']}<font color='#00F'>* </font>{/if}{$value['username']|escape}</a></p> 
            </div>
        </li>
        {/if}
        {/foreach}
    </div>
    
    <br>
    
    <p class="show-button"><b>■スタッフ</b></p>
    <div class="hide-area">
        {foreach from=$users key=$key item=$value}
        {if $value['auth'] == 2}
        <li class="media">
            <div class="media-left">
                id:{$value['id']}
            </div>
            <div class="media-body">
                <p><a href="index.php?action=user&eventId=management&id={$value['id']}">{if $user_name == $value['username']}<font color='#00F'>* </font>{/if}{$value['username']|escape}</a></p>
            </div>
        </li>
        {/if}
        {/foreach}
    </div>
    
    <br>
    
    <p class="show-button"><b>■退社</b></p>
    <div class="hide-area">
        {foreach from=$users key=$key item=$value}
        {if $value['auth'] == 3}
        <li class="media">
            <div class="media-left">
                id:{$value['id']}
            </div>
            <div class="media-body">
                <p><a href="index.php?action=user&eventId=management&id={$value['id']}">{if $user_name == $value['username']}<font color='#00F'>* </font>{/if}{$value['username']|escape}</a></p>
            </div>
        </li>
        {/if}
        {/foreach}
    </div>
</ul>