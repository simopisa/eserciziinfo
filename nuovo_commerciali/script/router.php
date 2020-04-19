<?php
session_start();
$_SESSION["id"]=$_POST["id"];
$_SESSION["tipo"]=$_POST["tipo"];
if (isset($_POST["info"])) {
    header("location: ../pages/info.php");
}elseif (isset($_POST["nuovo_PVR"])) {
    header("location: ../pages/newpvrdacom.php");
}elseif (isset($_POST["elenco_PVR"])) {
    header("location: ../pages/elencopvrcom.php");
}elseif (isset($_POST["Assegna"])) {
    header("location: ../pages/assegnapvr.php");
}elseif (isset($_POST["Inoltra"])) {
    header("location: ../pages/inoltrapvr.php");
}elseif (isset($_POST["modifica"])) {
    header("location: ../pages/modifica.php");
}elseif (isset($_POST["elimina"])) {
    header("location: ../pages/elimina.php");
}
