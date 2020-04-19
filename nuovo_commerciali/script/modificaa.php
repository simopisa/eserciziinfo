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

    
    
    
         $user= strtoupper($_POST["user"]);
        $ragsociale = strtoupper($_POST["ragsoc"]);
         $nome = strtoupper($_POST["nome"]);
         $cognome = strtoupper($_POST["cognome"]);
         $citta = strtoupper($_POST["citta"]);
         $indirizzo = strtoupper($_POST["indirizzo"]);
         $provincia = strtoupper($_POST["provincia"]);
         $email = strtoupper($_POST["mail"]);
         $telefono = strtoupper($_POST["telefono"]);
         $note = strtoupper($_POST["note"]);
       
        $result = mysqli_query($connessione, "UPDATE ".$_SESSION["tipo"]." SET User='".$_POST["user"]."', Ragsociale='".$_POST["ragsoc"]."' , Nome='".$_POST["nome"]."', Cognome='".$_POST["cognome"]."' , Indirizzo='".$_POST["indirizzo"]."', Citta='".$_POST["citta"]."', Provincia='".$_POST["provincia"]."', Telefono='".$_POST["telefono"]."', Email='".$_POST["mail"]."', Note='".$_POST["note"]."'where id='".$_SESSION["id"]."'");   
         if ($result) {
           
            $_SESSION["modbuonfine"]=true;
        } else {
           $_SESSION["modbuonfine"]=false;
        }
        header("location: ../pages/managment.php");
    }
   
    ?>