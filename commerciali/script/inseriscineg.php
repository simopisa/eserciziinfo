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
    $user=$_POST["user"];
    $ragsoc=$_POST["ragsoc"];
    $cognome=$_POST["cognome"];
    $nome=$_POST["nome"];
    $indirizzo=$_POST["indirizzo"];
    $citta=$_POST["citta"];
    $provincia=$_POST["provincia"];
    $telefono=$_POST["telefono"];
    $mail=$_POST["email"];
    $note=$_POST["note"];
        
    $result = mysqli_query($connessione, "INSERT INTO 'negozi' ('Idcommerciale', 'User', 'Ragsociale', 'Cognome', 'Nome', 'Indirizzo', 'Citta', 'Provincia', 'Telefono', 'Email',  'Note')  VALUES (null, '$user', '$ragsoc', '$cognome',
     '$nome', '$indirizzo', '$citta', '$provincia', '$telefono', '$mail','$note')");

     if ($result) {
         echo "bravo";
     }

    



?>