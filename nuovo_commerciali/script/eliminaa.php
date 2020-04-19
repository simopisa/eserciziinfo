
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
    if ($_SESSION["tipo"]=="commerciali") {
        $query = mysqli_query($connessione,"SELECT * FROM negozi where idcommerciale='" . $_SESSION["id"] . "'");
        while ($results = $query->fetch_assoc()) {
            $result = mysqli_query($connessione,"UPDATE negozi SET idcommerciale=0 where id='" . $results["Id"] . "'");
        }
    }
  
    #===============================================================================================
    $result = mysqli_query($connessione,"DELETE FROM ".$_SESSION["tipo"]." where id='" . $_SESSION["id"] . "'");

    if ($result) {
        $_SESSION["eliminato"]=true;
    }else {
        $_SESSION["eliminato"]=false;
    }
    header("location: ../pages/managment.php");
    #===============================================================================================
}
