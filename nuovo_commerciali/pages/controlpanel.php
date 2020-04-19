<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main-style.css">
    <script src="../js/script.js"></script>
</head>
<body>

<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"/>
<div class="stage">
  <div class="tile profiles" onclick="window.location.href='../pages/managment.php'" >
    <h1>Gestione commerciali e pvr</h1>
  </div>
  <div class="tile teams">
    <h1>piano visite</h1>
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