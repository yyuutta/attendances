<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>LOGIN</title>
        <meta http-equiv="Content-type" content="text/html;charset=utf-8">
        <script type="text/javascript">
            function checkFormlogin(){
                if (document.login.username.value === "" || document.login.password.value === ""){
                        alert("項目を入力して下さい。");
                        return false;
                }else{
                        document.login.submit();
                }
            }
        </script>
    </head>
    <body>
        <font size="5"><b>LOGIN</b></font><br>
        <hr width="100%">
        <font size="4" color="red">{$status}</font>
        <form name="login" action="" method="post">
            <table border="0" width="300" cellspacing="0" cellpadding="5">
                <tr>
                    <td>username</td>
                    <td><input type="text" name="username" value=""></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="password" name="password" value=""></td>
                </tr>
            </table>
            <br>
            <input type="hidden" name="action" value="login">
            <input type="hidden" name="eventId" value="connect">
            <input type="submit" value="enter" onclick="return checkFormlogin(); ">
        </form>
        <br>
        <br>
        <form name="register" action="" method="get">
            <input type="hidden" name="action" value="register">
            <input type="hidden" name="eventId" value="connect">
            <input type="submit" value="add_staff" >
        </form>
    </body>
</html>