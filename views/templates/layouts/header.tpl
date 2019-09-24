<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Eagle-{$user_name|escape}</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    {if $loginUser_auth < 2}
                        <li><a href="index.php?year={$dates['year']}&action=index&eventId=management">Management</a></li>
                    {/if}
                    <li><a href="index.php?action=logout&eventId=connect">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>