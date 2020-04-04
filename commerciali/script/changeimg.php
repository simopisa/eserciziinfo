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
        <div class="blurred-box">

            <div class="user-login-box">
                <span class="user-icon-cam"></span>
                <form name="form" method="post" action="upload.php" enctype="multipart/form-data">
                    <input type="file" name="my_file" class="user-contol" id="file"/><br /><br/>
                    
                    <input type="submit" name="submit" value="Upload" class="user-contol"/><br><br>
                </form>
                <button class="user-contol" onclick="window.location.href='../pages/controlpanel.php'">Home</button>
                
            </div>

        </div>
    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>