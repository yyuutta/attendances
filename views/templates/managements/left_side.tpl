<div class="media-left">
    <a href="index.php?action=error&eventId=management"><h4><B>ERROR</B></h4></a>
    {if $loginUser_auth < 1}
        <a href="index.php?action=index&eventId=dataprocess"><h4><B>DOWNLOAD</B></h4></a>
        {* <a href="index.php?action=mail&eventId=management"><h4><B>MAIL</B></h4></a> *}
        <BR>
    {/if}
    {include file="./users.tpl"}
</div>
