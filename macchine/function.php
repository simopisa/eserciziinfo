<html>
    <head>

    <style>
        @import url("style.css");
    </style>
    </head>

</html>

<?php
session_start();

$db_host = "localhost";
$db_name = "macchine";
$dbuser = "root";
$dbpass = "";
$connessione = mysqli_connect($db_host, $dbuser, $dbpass);
    #===============================================================================================
    if (!$connessione) {
      die("connessione fallita: ");
    }
    #===============================================================================================
    mysqli_select_db($connessione, $db_name) or die("impossibile selezionare database");
    #===============================================================================================

    if (isset($_POST['username']) && isset($_POST["password"])) {
      $_SESSION["user"] = $_POST["username"];
      $_SESSION["psw"] = $_POST["password"];
      #===============================================================================================
      $result = mysqli_query($connessione, "SELECT * FROM users WHERE username='" . $_SESSION["user"] . "' AND password= '" . $_SESSION["psw"] . "'");
      if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('nome utente o password errata')</script>";
        header("location: index.php");
      }else{
        $_SESSION["sessione"]=true;
        $ress=mysqli_query($connessione, "SELECT tipo FROM users WHERE username='".$_SESSION["user"]."'");
        $value = mysqli_fetch_object($ress);
        $tipo= $value->tipo;
        if ($tipo=="admin") {
          $_SESSION["admin"]=true;
          header("location: pagine_interne/user.php");
        }else{
          $_SESSION["admin"]=false;
          header("location: pagine_interne/usernoadmin.php");
        }
        
      }
       #===============================================================================================
    }



?>