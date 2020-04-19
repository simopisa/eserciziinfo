<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php
        
        if (isset($_SESSION["success"])) {
            if ($_SESSION["success"] == true) {
                echo "<script>alert('password cambiata con successo');</script>";
            } else {
                echo "<script>alert('errore, controlla di aver inserito la vecchia password corretta o che le due nuove password combacino')</script>";
            }
            unset($_SESSION["success"]);
        }


        ?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/main-style.css">
        <script src="../js/script.js"></script>
    </head>

    <body>

        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
        <div class="stage">
            <div class="tile change" onclick="window.location.href='changepass.php'">
                <h1>Cambia password</h1>
            </div>
            <div class="tile elenco" onclick="window.location.href='managment.php'">
                <h1>ELenco</h1>
            </div>
            <div class="tile business" onclick="window.location.href='../script/logout.php'">
                <h1>logout</h1>
            </div>
        </div>



    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>