<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body class="login">
    <div class="blurred-box">
        <form action="script/login.php" method="post" onsubmit="return controllo();">
            <div class="user-login-box">
                <span class="user-icon"></span>
                <br><br>
                <input class="user-password" type="text" name="user" placeholder="username" id="user"/><br><br>
                <input class="user-password" type="password" name="password" placeholder="password" id="password"/><br> <br>
                <input type="submit" value="login" class="user-submit">
            </div>
        </form>
    </div>
</body>

</html>