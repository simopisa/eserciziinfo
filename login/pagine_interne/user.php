<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <style>
        @import url("../style.css");
    </style>
</head>
<body>
   <?php 
    if (!$_COOKIE['verifica']) {
       header("location: ../index.php");
    }
    echo "<h1> Welcome in " . $_COOKIE["username"]."</h1>";
    echo "<h2> Your mail is " . $_COOKIE["email"]." and your phone number: ".$_COOKIE["telefono"]."</h2>";
    echo "<h2><a href='../index.php'>esci</a></h2>";

   ?>

</body>
</html>