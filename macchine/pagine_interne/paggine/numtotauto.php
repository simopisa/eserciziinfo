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
            @import url("../styyle.css");
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../script-interno.js">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body id="principale" class="bg-purple">




        <div class="custom-navbar">

            <div class="navbar-links">
                <ul>
                    <li><a href="../user.php">BACK</a></li>
                    <li><a href="../logout.php" class="btn-request">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="central-body">
            <?php
           

            $result = mysqli_query($connessione, "SELECT * from auto");




            ?>





            <div class="contentform" style="height: 500px; overflow-y:scroll; ">
                <?php echo "<h1>il numero totale delle auto è ". mysqli_num_rows($result). "</h1>"?>

            </div>





        </div>






    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>