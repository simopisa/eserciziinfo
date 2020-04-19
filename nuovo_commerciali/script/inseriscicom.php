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
        $result = mysqli_query($connessione, "INSERT INTO commerciali VALUES(null, '$user','$ragsociale','$cognome','$nome','$indirizzo', '$citta','$provincia','$telefono','$email','$note' )");
        if ($result) {
           
            $_SESSION["buonfine"]=true;
        } else {
           $_SESSION["buonfine"]=false;
        }
        header("location: ../pages/managment.php");
    }
    
    ?>