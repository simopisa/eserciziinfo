<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        a{
            color:aliceblue;
        }
    </style>
</head>

<body  style='background-image: linear-gradient(90deg,   #5800b5, #4b005c); color:white; '>
    <?php
    session_start();
    $controllo=false;
    if (isset($_SESSION["sessione"])) {
        foreach ($_SESSION["sessione"] as $key => $value) {
            echo "<br> nome evento: " . $key . " numero iscritti: " . $value . "<br>";
        }
    }else {
        echo "<script type='text/javascript'>alert('sessione conclusa, nulla da recappare');</script>";
       $controllo=true;
       
    }

 
    ?>
    <a href="index.php">home</a>
</body>

</html>