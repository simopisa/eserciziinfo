<?php
session_start();
$db_host = "localhost";
$db_name = "db_piccoloprincipe";
$dbuser = "root";
$dbpass = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Il piccolo principe</title>

    <style>
    @import url("css/main-style.css");
    </style>
</head>

<body>
    <script>
    function createstar(type, quantity) {
        for (let i = 0; i < quantity; i++) {
            var star = document.createElement("div");
            star.classList.add('star', 'type-' + type);
            star.style.left = randomnumber(1, 99) + "%";
            star.style.bottom = randomnumber(1, 99) + "%";
            star.style.animationDuration = randomnumber(50, 100) + "s";

            document.body.appendChild(star);
        }

        function randomnumber(min, max) {
            return Math.floor(Math.random() * max) + min;
        }


    }
    createstar(1, 100);
    createstar(2, 85);
    createstar(3, 70);
    </script>
    <div class="container" id="container" name="container">
        <br><br>
        <div class="header">
            <h1>Il piccolo principe</h1>
        </div>
        <br><br>
          <?php
      #===============================================================================================
      $connessione = mysqli_connect($db_host, $dbuser, $dbpass);
      #===============================================================================================
      if (!$connessione) {
        die("connessione fallita: ");
      }
      #===============================================================================================
      mysqli_select_db($connessione, $db_name) or die("impossibile selezionare database");
      #===============================================================================================

      if (isset($_POST['username']) && isset($_POST["psw"])) {
        $_SESSION["user"] = $_POST["username"];
        $_SESSION["psw"] = $_POST["psw"];
        #===============================================================================================
        $result = mysqli_query($connessione, "SELECT * FROM utenti WHERE username='" . $_SESSION["user"] . "' AND password= '" . $_SESSION["psw"] . "'");
        if (mysqli_num_rows($result) == 0) {
          echo "<script>alert('nome utente o password errata')</script>";
        }else{
          $_SESSION["sessione"]=true;
        }
        #===============================================================================================
      }



      ?>
        <div class="wrapper">
            <div class="frasi" id="frasi">
            </div>
            <br>
            <div class="cit" id="cit">
                --Antoine-Marie-Roger de Saint-Exupéry <br>
                <span id="sotto">dal libro "Il piccolo principe" di Antoine-Marie-Roger de Saint-Exupéry</span>
            </div>
            <br>
            <br>

            <div class="formm">


                <?php
        if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
        ?>
                <div class="menuu">

                    <button onclick="window.location.href='#'" id="submit">Home</button>
                    <button onclick="window.location.href='pages/storia.php'" id="submit">Storia</button>
                </div>
                <br><?php
              echo "benvenuto " .   $_SESSION["user"];
              ?>
                <br>
                <br>
                <br>
                <br>
                <button onclick="window.location.href='pages/logout.php'" id="submit">Logout</button>

                <?php
        } else {
          echo '
          <h3>LOGIN</h3>
          <form action="#" method="POST" id="my-form" onsubmit="return controlla();">

            <input type="text" name="username" id="username"><br><br>
            <input type="password" name="psw" id="psw"><br><br>
            <input type="submit" value="submit" id="submit">
          </form>
          ';
        }
        ?>

            </div>
        </div>
    </div>



    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src="./js/script.js"></script>



</body>

</html>