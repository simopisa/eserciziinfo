<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
if (($_FILES['my_file']['name']!="")){
// Where the file is going to be stored
 $target_dir = "../img/";
 $file = $_FILES['my_file']['name'];
 $path = pathinfo($file);
 $filename = $path['filename'];
 $ext = $path['extension'];
 $temp_name = $_FILES['my_file']['tmp_name'];
 $path_filename_ext = $target_dir.$filename.".".$ext;
 

 move_uploaded_file($temp_name,$path_filename_ext);
 echo "Congratulations! File Uploaded Successfully.";
 $_SESSION["immagine"]=$path_filename_ext;

 } 
 

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

$ress = mysqli_query($connessione, "UPDATE users SET userimg='".$_SESSION["immagine"]."'WHERE username='" . $_SESSION["user"] . "'");
$value = mysqli_fetch_object($ress);
$userimg = $value->userimg;
header("location: changeimg.php");
} else {
    header("location: ../index.php");
}
?>