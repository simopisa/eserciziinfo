
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

if (isset($_SESSION["id"])) {
 

    #===============================================================================================
    $result = mysqli_query($connessione,"UPDATE negozi SET Idcommerciale=0 where id='" . $_SESSION["id"] . "'");

    if ($result) {
        $_SESSION["fatto"]=true;
    }else {
        $_SESSION["fatto"]=false;
    }
    header("location: ../pages/managment.php");
    #===============================================================================================
}
