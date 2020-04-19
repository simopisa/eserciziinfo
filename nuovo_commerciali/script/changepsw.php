<?php
session_start();
if (!isset($_POST["submit"])) {
    header("Location: ../index.php");
}
$db_host = "localhost";
$db_name = "negozi";
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

if (isset($_POST['vpass']) && isset($_POST["pass"]) && isset($_POST["pass1"])) {

    $_SESSION["vpass"] = $_POST["vpass"];

    #===============================================================================================
    $result = mysqli_query($connessione, "SELECT * FROM users WHERE username='" . $_SESSION["user"] . "' AND password= '" . $_SESSION["vpass"] . "'");
    if (mysqli_num_rows($result) == 0) {

        $_SESSION["success"] = false;
    } else {
        if ($_POST["pass"] == $_POST["pass1"]) {
            $ress = mysqli_query($connessione, "UPDATE users SET password='".$_POST["pass1"]."' where username='" . $_SESSION["user"] . "'");
            if ($ress) {
                $_SESSION["success"] = true;
            }else {
                $_SESSION["success"] = false;
            }
        }
    }
    header("location: ../pages/settings.php");
    #===============================================================================================
}
