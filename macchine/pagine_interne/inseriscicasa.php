<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
    $_SESSION["inseritocliente"] = true;
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
    $nomecasa = strtoupper($_POST["nomecasa"]);
    $sede = strtoupper($_POST["sede"]);
    $nazione = strtoupper($_POST["nazione"]);
    // $ressult = mysqli_query($connessione, "SELECT * FROM proprietario WHERE nome='$nome' AND cognome='$cognome' AND indirizzo='$indirizzo' AND città='$citta'");
    // if (mysqli_num_rows($ressult)) {
        $result = mysqli_query($connessione, "INSERT INTO casa VALUES('$nomecasa','$sede','$nazione' )");

        if ($result) {

            $_SESSION["insertiscorrect"] = true;
        } else {

            $_SESSION["insertiscorrect"] = false;
        }
    // }else{
    //     $_SESSION["alreadyexist"]=true;
    // }

   
    header("Location: user.php");
    #===============================================================================================








} else {
    header("location: ../index.php");
}
