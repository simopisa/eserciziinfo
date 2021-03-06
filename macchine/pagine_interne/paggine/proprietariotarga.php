

<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {

    $db_host = "localhost";
    $db_name = "macchine";
    $dbuser = "root";
    $dbpass = "";
    $connessione = mysqli_connect($db_host, $dbuser, $dbpass);
    if (!$connessione) {
        die("connessione fallita: ");
    }
    #===============================================================================================
    mysqli_select_db($connessione, $db_name) or die("impossibile selezionare database");

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Welcome</title>
        <style>
            @import url("../styyle.css");
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../script-interno.js">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body id="principale" class="bg-purple">




        <div class="custom-navbar">

            <div class="navbar-links">
                <ul>
                    <li><a href="../user.php">BACK</a></li>
                    <li><a href="../logout.php" class="btn-request">Logout</a></li>
                </ul>
            </div>
        </div>
        <form method="post" id="form">
            <select name="targa" data-rule="required" class="dentro">
                <?php
                $result = mysqli_query($connessione, "SELECT targa FROM auto");
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value=" . $row['targa'] . ">" . $row['targa'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="submit" class="btn-request">
        </form>
        <div class="central-body">
            <?php
            function sql_to_html_table($result, $delim = "\n")
            {

                $htmltable =  "<table>" . $delim;
                $counter   = 0;

                while ($row = $result->fetch_assoc()) {
                    if ($counter === 0) {
                        // table header
                        $htmltable .=   "<tr>"  . $delim;
                        foreach ($row as $key => $value) {
                            $htmltable .=   "<th>" . $key . "</th>"  . $delim;
                        }
                        $htmltable .=   "</tr>"  . $delim;
                        $counter = 22;
                    }

                    $htmltable .=   "<tr>"  . $delim;
                    foreach ($row as $key => $value) {
                        $htmltable .=   "<td>" . $value . "</td>"  . $delim;
                    }
                    $htmltable .=   "</tr>"   . $delim;
                }

                $htmltable .=   "</table>"   . $delim;

                return ($htmltable);
            }
           
            



            ?>





                <div class="contentform">
                    <?php 
                    
                    if (isset($_POST["targa"])) {
                        $result = mysqli_query($connessione, "SELECT nome,cognome, indirizzo,citta FROM auto, proprietario where   auto.targa ='" . $_POST["targa"] . "' AND proprietario.IDproprietario=auto.IDproprietario");
               
                        echo sql_to_html_table($result,  $delim = "\n"); 
        
                    }
                   
                    ?>
                    
                </div>
               




        </div>





      
    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>