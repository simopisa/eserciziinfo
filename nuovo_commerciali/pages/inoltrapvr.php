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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">

    function confirmDelete() {
        if (confirm('Sei sicuro di voler inoltrare il pvr?')) {
            //Make ajax call
            window.location.href="../script/inoltra.php";


        }else{
            window.location.href="managment.php";
        }
    }


    confirmDelete();
</script>
</head>
<body>
    
</body>
</html>
<?php
} else {
    header("location: ../index.php");
}
?>
