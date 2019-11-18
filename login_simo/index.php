<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url("style.css");
    </style>
    <script src="script.js"></script>
    <?php
        setcookie("verifica",false);
    ?>
</head>

<body>



    <div class="card-container" id="card-container">
        <div class="card" id="card">
            <div class="front">
                <form action="function.php" method="post" onsubmit="return verifica();">
                    <p><b>SIGN IN*</b></p>
                    user:<input type="text" name="username" id="username" placeholder="user">
                    password: <input type="password" name="password" id="password" placeholder="password">
                    <input type="submit" value="sign in" class="button sign-in" name="submit">

                </form>
                <button onclick="return registrati();" class="button sign-in">SIGN UP</button>
            </div>
            <div class="back">
                <form action="registrati.php" method="post" onsubmit="return verifica1();">
                    <p><b>SIGN UP*</b></p>
                    user: <input type="text" name="username" id="username1" placeholder="user"><br>
                    password: <input type="password" name="password" id="password1" placeholder="password"><br>
                    telefono: <input type="number" name="telefono" id="telefono" placeholder="555-5555555"><br>
                    email: <input type="email" name="email" id="email" placeholder="mail@dominio.aa"><br>
                    <input type="submit" value="sign up" class="button sign-up">

                </form>

                <button onclick="return login();" class="button sign-up">SIGN IN</button>
            </div>
        </div>



    </div>

    <footer id="footer">

        *By signing in you agree to the ridiculously long terms that you didn't bother to read

    </footer>
</body>

</html>