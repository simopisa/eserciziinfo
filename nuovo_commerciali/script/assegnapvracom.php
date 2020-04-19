<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
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

    
    
    
       $_SESSION["idcom"]=$_POST["id"];

        $result = mysqli_query($connessione, "UPDATE negozi SET idcommerciale='".$_SESSION["idcom"]."' where id='" . $_SESSION["id"] . "'");
        if ($result) {
           
            $_SESSION["assegnato"]=true;
        } else {
           $_SESSION["assegnato"]=false;
        }
        header("location: ../pages/managment.php");
    }
    
    ?>