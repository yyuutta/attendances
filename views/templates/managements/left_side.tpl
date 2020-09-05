<div class="media-left">
    <a href="index.php?action=error&eventId=management"><h4><B>ERROR</B></h4></a>
    {if $loginUser_auth < 1}
        <a href="index.php?action=index&eventId=dataprocess"><h4><B>DOWNLOAD</B></h4></a>
        <a href="index.php?action=mail&eventId=management"><h4><B>MAIL</B></h4></a>
        <BR>
        <h4><B>会社都合シフト変更履歴</B></h4>
        <a href="index.php?action=index&eventId=reshift&getyear={$dates['year_ago']}"><B>【{$dates['year_ago']}】</B></a>
        <a href="index.php?action=index&eventId=reshift&getyear={$dates['year_now']}"><B>【{$dates['year_now']}】</B></a>
    {/if}
    <BR><BR><BR>
    {include file="./users.tpl"}
</div>
