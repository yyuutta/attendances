<!DOCTYPE html>  
<html lang="ja">
    <head>
        <title>ADD_NEW_STAFF</title>
        <meta http-equiv="Content-type" content="text/html;charset=utf-8">
        <script type="text/javascript">
            function checkForminsert(){
                if (document.insert.username.value === "" || document.insert.password.value === "" || document.insert.accessCode.value === ""){
                        alert("項目を入力して下さい。");
                        return false;
                }else{
                        document.insert.submit();
                }
            }
         </script> 
    </head>
    <body>
    <header>
	    <font size="5"><b>ADD_NEW_STAFF</b></font><br>
            <hr width="100%">
    </header>
    <font size="4" color="red">{$status|escape}</font>
    <br>
        <form name="insert" action="" method="post">
            <table border="0" width="500" cellspacing="0" cellpadding="10">
                <!--username--> 
                <tr>
                    <td align="left" nowrap>username</td>
                    <td bgcolor="" valign="middle" width="450"><input type="text" name="username" style="ime-mode:disabled" value="">　※20文字以内</td>
                </tr>
                <!--password--> 
                <tr>
                    <td align="left" nowrap>password</td>
                    <td bgcolor="" valign="middle" width="450"><input type="password" name="password" value="">　※数字(6～20桁)</td>
                </tr>
                <!--mail--> 
                <tr>
                    <td align="left" nowrap>mail</td>
                    <td bgcolor="" valign="middle" width="450"><input type="mail" name="mail" value=""></td>
                </tr>
                <!--accessCode--> 
                <tr>
                    <td align="left" nowrap>accessCode</td>
                    <td bgcolor="" valign="middle" width="450"><input type="password" name="accessCode" value="">　※登録権限</td>
                </tr>
            </table>
            <br>
            <input type="hidden" name="action" value="create">
            <input type="hidden" name="eventId" value="connect">
            <input type="button" value="create" onclick="return checkForminsert();">
            <br>
            <br>
            <a href="index.php">Return</a>
        </form>
    </body>
</html>