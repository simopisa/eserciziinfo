<?php
session_start();

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
    <?php
    if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
      echo '
        <div class="menu">
        <a href="#">Home</a>
        <a href="pages/storia.php">Storia</a>
        </div>
        <br><br>
        ';
    }

    ?>
    <br><br>

    <div class="wrapper">
      <div class="frasi" id="frasi">
      </div>
      <br>
      <div class="cit" id="cit">
        --Antoine-Marie-Roger de Saint-Exupéry <br>
        <span id="sotto">dal libro "Il piccolo principe" di Antoine-Marie-Roger de Saint-Exupéry</span>
      </div>
      <div class="formm">
        <?php
        if (isset($_POST['submit'])) {

          //hanno inviato il submit quindi gestisco i dati


        } else {
          ?>
          <form action="index.php?fatto=fatto1" method="post" id="my-form">

            <input type="text" name="username" id="username">
            <input type="password" name="psw" id="psw">
            <input type="submit" value="submit">
          </form>

        <?php
          echo '';
        }
        if (isset($_POST["submit"])) {
          echo '<script> alert("' . $_SESSION["sessione"] . '");</script>';

          if ($_REQUEST["fatto"] == "fatto1") {
            $user = $_POST["userame"];
            $psw = $_POST["psw"];
            $mess = $user . $psw;
            $_SESSION["sessione"] = true;
            echo '<script> alert("' . $_SESSION["sessione"] . '");</script>';
            echo $mess;
          }
        }
        ?>

      </div>
    </div>
  </div>



  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src="./js/script.js"></script>


</body>

</html>