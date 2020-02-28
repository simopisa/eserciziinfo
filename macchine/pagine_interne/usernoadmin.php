<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {

    $db_host = "localhost";
    $db_name = "macchine";
    $dbuser = "root";
    $dbpass = "";
    $connessione = mysqli_connect($db_host, $dbuser, $dbpass);
    if (!$connessione) {
        die("connessione fallita: ");
    }
    #===============================================================================================
    mysqli_select_db($connessione, $db_name) or die("impossibile selezionare database");

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Welcome</title>
        <style>
            @import url("styyle.css");
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="script-interno.js">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body id="principale">


        <body class="bg-purple">

            <div class="stars">
                <div class="custom-navbar">

                    <div class="navbar-links">
                        <ul>
                            <li><a href="#">Welcome <?php echo $_SESSION["user"] ?></a></li>
                            <li><a href="#" onclick="return ricquery();">RICERCA QUERY</a></li>
                            <li><a href="logout.php" class="btn-request">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="central-body">

                    <!-- =0================================================================================================================================================== -->
                    <div id="ricquery">
                        <form>
                            <h1>Ricerca query</h1>
                            <div class="contentform">

                                <div class="leftcontact">
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/lettere.php'">Utenti con lettera e nel cognome</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Auto di una casa</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Auto fiat con prezzo maggiore di 10000</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Proprietario di una determinata auto con targa</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Informazioni auto</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Case che non hanno venduto auto</button>
                                    </div>
                                </div>

                                <div class="rightcontact">
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/lettere.php'">Auto prodotte a torino</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Numero totale auto</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Prezzo max, min e media</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Somma prezzi auto fiat</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Numero auto di case automobilstiche</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Spese proprietario</button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="bouton-contact" disabled></button>
                        </form>

                    </div>
                </div>
            </div>


            </div>

        </body>
    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>