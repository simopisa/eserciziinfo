<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
        @import url("../style.css");
    </style>
    <script src="../script.js"></script>
    </head>

    <body>
        
    </body>

    </html>





<?php
} else {
    header("location: ../index.php");
}


?>