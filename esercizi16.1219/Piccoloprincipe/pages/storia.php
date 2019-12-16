<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
?>
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
    <br><br>
    <?php
    if (isset($_POST['username']) && isset($_POST["psw"])) {
      if ($_POST["username"] == "pippo" && $_POST["psw"] == "12345678") {
        echo '
        <br>
        <br>
        <div class="menu">
        <a href="#">Home</a>
        <a href="pages/storia.php">Storia</a>
        </div>
        <br><br>
        
      ';
      $_SESSION["sessione"]=true;
      }else{
        echo '<script>alert("nome utente o pasword errata")</script>';
      }
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
        if (isset($_SESSION["sessione"]) && $_SESSION["sessione"]==true) {
          echo "benvenuto ".$_POST["username"];
          ?>
          <br>
          <br>
          <br>
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


<?php
}else{
    header("location: ../index.php");
}
?>