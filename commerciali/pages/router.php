<?php
session_start();
if (isset($_POST["info"])) {
    $_SESSION["id"]=$_POST["id"];
    header("location: info.php");
}


?>