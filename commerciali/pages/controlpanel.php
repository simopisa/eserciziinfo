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

    #===============================================================================================

    $ress = mysqli_query($connessione, "SELECT userimg FROM users WHERE username='" . $_SESSION["user"] . "'");
    $value = mysqli_fetch_object($ress);
    $userimg = $value->userimg;
   




?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/script.js"></script>

        <style>
            .user-icon-cam {
                width: 100px;
                height: 100px;
                position: relative;
                border-radius: 50%;
                background-size: cover;
                background-image: url(<?php echo $userimg ?>);
            }
        </style>
    </head>

    <body class="login">
        <div class="blurred-box-control">

            <div class="user-login-box">
                <span class="user-icon-cam"></span>

                <div class="user-name">Welcome <?php echo $_SESSION["user"] ?></div>
                <button class="user-contol gest" onclick="window.location.href='../pages/elenco.php'">Gestione commerciali e PVR</button><br><br>
                <button class="user-contol">Piano visite</button><br><br>
                <!-- il bottone sotto fa esattamente ciò che pensi, per ogni utente è possibile cambiare immagine del profilo -->
                <button class="user-contol" onclick="window.location.href='../script/changeimg.php'">Cambia immagine</button><br><br>

                <button class="user-contol" onclick="window.location.href='../script/logout.php'">Logout</button>
            </div>

        </div>
    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>