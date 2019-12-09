<html>

<head>
    <script src="script.js"></script>
    <title>Es1</title>
    <style>
        a{
            color:aliceblue;
        }
    </style>
</head>

<body  style='background-image: linear-gradient(90deg,   #5800b5, #4b005c); color:white; '>
    <?php
    session_start(); ?>
    <form action="functions.php" method="GET" onsubmit="return controlla();">
        Inserire il nome evento
        <input type="text" name="evento" id="evento">
        <br><br>
        Numero persone prenotazione
        <input type="number" name="persone" id="persone">
        <br><br>
        <input type="submit" value="invia" name="submit">
    </form>
    <a href='?run'>end session</a><br>
    <a href="recap.php">recap</a>
    <?php
    if (isset($_GET['run'])) {
        session_destroy();
    }
    // <?php
  

    

    ?>
</body>

</html>