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
        <!-- <link rel="stylesheet" href="../css/style.css"> -->
        <link rel="stylesheet" href="../css/dash-style.css">
        <script src="../js/script.js"></script>

    </head>

    <body>
        <nav class="menu" tabindex="0">
            <div class="smartphone-menu-trigger"></div>
            <header class="avatar">
                <img src="<?php echo $userimg ?>" />
                <h2><?php echo $_SESSION["user"] ?></h2>
            </header>
            <ul>
                <li tabindex="0" class="icon-users" onclick="window.location.href='controlpanel.php'"><span>Home</span></li>
                <li tabindex="0" class="icon-list" onclick="window.location.href='elenco.php'"><span>Elenco</span></li>
                <li tabindex="0" class="icon-new " onclick="window.location.href='nuovocommerciale.php'"><span>Nuovo commerciale</span></li>
                <li tabindex="0" class="icon-new selected" onclick="window.location.href='#'"><span>Nuovo PVR</span></li>
                <li tabindex="0" class="icon-search" onclick="window.location.href='cerca.php'"><span>Cerca</span></li>
            </ul>
        </nav>

        <main style="overflow: hidden">
        <div class="blurred-box-1">
        <form action="../script/inseriscineg.php" method="post"    >
            <div class="user-login-box">
                <span class="user-name">Nuovo negozio</span>
                <br><br>
                <input class="user-password" type="text" name="user" placeholder="user" id="user"/><br><br>
                <input class="user-password" type="text" name="ragsoc" placeholder="rag. sociale" id="ragsoc"/><br> <br>
                <input class="user-password" type="text" name="cognome" placeholder="cognome" id="cognome"/><br><br>
                <input class="user-password" type="text" name="nome" placeholder="nome" id="nome"/><br><br>
                <input class="user-password" type="text" name="indirizzo" placeholder="indirizzo" id="indirizzo"/><br><br>
                <input class="user-password" type="text" name="citta" placeholder="città" id="citta"/><br><br>
                <input class="user-password" type="text" name="provincia" placeholder="provincia" id="provincia"/><br><br>
                <input class="user-password" type="text" name="telefono" placeholder="telefono" id="telefono"/><br><br>
                <input class="user-password" type="mail" name="email" placeholder="e-mail" id="email"/><br><br>
                <input class="user-password" type="text" name="note" placeholder="note" id="note"/><br><br>
                <input type="submit" value="login" class="user-submit" name="submit">
            </div>
        </form>
    </div>
        </main>
    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>