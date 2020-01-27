<?php
    session_start();

?>
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
             
            </div>
            <!-- <div class="back">
                <form action="registrati.php" method="post" onsubmit="return verifica1();">
                    <p><b>SIGN UP*</b></p>
                    nome: <input type="text" name="nome" id="nome" placeholder="es. MARIO"><br>
                    cognome: <input type="text" name="cognome" id="cognome" placeholder="es. ROSSI"><br>
                    username: <input type="text" name="username1" id="username1" placeholder="es. MROSSI"><br>
                    password: <input type="password" name="password1" id="password1" placeholder="password"><br>
                    città: <input type="text" name="citta" id="citta" placeholder="es. TORINO"><br>
                    indirizzo: <input type="text" name="indirizzo" id="indirizzo" placeholder="es. VIA VERDI 9"><br>
                    <input type="submit" value="sign up" class="button sign-up">

                </form>

                <button onclick="return login();" class="button sign-up">SIGN IN</button>
            </div> -->
        </div>



    </div>

    <footer id="footer">

        *By signing in you agree to the ridiculously long terms that you didn't bother to read

    </footer>
</body>

</html>