<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
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

    $ress = mysqli_query($connessione, "SELECT userimg FROM users WHERE username='" . $_SESSION["user"] . "'");
    $value = mysqli_fetch_object($ress);
    $userimg = $value->userimg;


    function sql_to_html_table($sqlresult, $delim = "\n")
    {

        $htmltable =  "<table style=' border:1px solid blue; display:inline;'>" . $delim;
        $counter   = 0;

        while ($row = $sqlresult->fetch_assoc()) {
            if ($counter === 0) {
                // table header
                $htmltable .=   "<tr>"  . $delim;
                foreach ($row as $key => $value) {
                    $htmltable .=   "<th>" . $key . "</th>"  . $delim;
                }
                $htmltable .=   "</tr>"  . $delim;
                $counter = 22;
            }

            $htmltable .=   "<tr><form action='router.php' method='post'>"  . $delim;
            foreach ($row as $key => $value) {
                if (is_numeric($value)) {
                    $htmltable .=   "<td><input type='text' name='id' value="  .$value . " hidden></input></td>"  . $delim;
                }else{
                    $htmltable .=   "<td>"  .$value . "</td>"  . $delim;
                }

              
                
            }
            $htmltable .=   "<td> <input type='submit' value='info' name='info'></td>"   . $delim;
            $htmltable .=   "</form></tr>"   . $delim;
           
        }

        $htmltable .=   "</table>"   . $delim;

        return ($htmltable);
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- <link rel="stylesheet" href="../css/style.css"> -->
        <link rel="stylesheet" href="../css/dash-style.css">
        <script src="../js/script.js"></script>
          
    </head>

    <body>
        <nav class="menu" tabindex="0">
            <div class="smartphone-menu-trigger"></div>
            
            <header class="avatar">
                <img src="<?php echo $userimg ?>" />
                <h2><?php echo $_SESSION["user"] ?></h2>
               
            </header>
            <ul>
                <li tabindex="0" class="icon-users" onclick="window.location.href='controlpanel.php'"><span>Home</span></li>
                <li tabindex="0" class="icon-list selected" onclick="window.location.href='#'"><span>Elenco</span></li>
                <li tabindex="0" class="icon-new" onclick="window.location.href='nuovocommerciale.php'"><span>Nuovo commerciale</span></li>
                <li tabindex="0" class="icon-new" onclick="window.location.href='nuovonegozio.php'"><span>Nuovo PVR</span></li>
                <li tabindex="0" class="icon-search" onclick="window.location.href='cerca.php'"><span>Cerca</span></li>
            </ul>
        </nav>

        <main>
        <?php
            $result=mysqli_query($connessione, "SELECT user, ragsociale,idcommerciale from commerciali");
            echo sql_to_html_table($result);
            echo "<br>";
            $result=mysqli_query($connessione, "SELECT user, ragsociale,idnegozio from negozi");
            echo sql_to_html_table($result);
        ?>


        </main>
    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>