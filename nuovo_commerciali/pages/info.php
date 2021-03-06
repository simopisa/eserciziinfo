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
//FIXME: TABELLA CENTRATA

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/managment.css">
        <script src="../js/script.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    </head>

    <body>

        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

        <section>
            <nav id="app-nav" class="app-nav">
                <ul class="links-lvl1 app-nav-main-links links-with-text">
                    <li>
                        <a href="#" onclick="window.location.href='../pages/controlpanel.php'" class="logo"><i class="fa fa-home"></i></a>
                    </li>
                    <li><a href="managment.php" onclick="window.location.href='managment.php'" class="link-lvl1"><i class="fa fa-th-list "></i><span>Elenco</span></a></li>
                    <li><a href="newcomm.php" onclick="window.location.href='newcomm.php'" class="link-lvl1"><i class="fa fa-plus"></i><span>Nuovo commerciale</span></a></li>
                    <li><a href="newpvr.php"  onclick="window.location.href='newpvr.php'" class="link-lvl1"><i class="fa fa-plus"></i><span>Nuovo pvr</span></a></li>
                    <li><a href="search.php" onclick="window.location.href='search.php'" class="link-lvl1"><i class="fa fa-search"></i><span>Cerca</span></a></li>
                    <li><a href="" onclick="window.location.href='settings.php'" class="faded link-lvl1 anim-spin"><i class="fa fa-cog"></i><span>settings</span></a>
                        <a href="" onclick="window.location.href='../script/logout.php'" class="link-lvl1"><i class="fa fa-sign-out"></i><span>logout</span></a></li>
                </ul>
            </nav>

            <div class="app-content">
                <div class="container" id="container">
                    <div class="tabella">

                        <br><br><br><br>
                        
                        <table class="table-fill">
                <tr>
                    <th >User</th>
                    <th  class="text-left">Rag. Sociale</th>
                    <th  class="text-left">Nome</th>
                    <th  class="text-left">Cognome</th>
                    <th class="text-left">Indirizzo</th>
                    <th class="text-left">Citta</th>
                    <th class="text-left">Provincia</th>
                    <th class="text-left">Telefono</th>
                    <th class="text-left">Email</th>
                    <th class="text-left">Note</th>
                </tr>
                <tbody class="table-hover">
                <?php
                $tipo = $_SESSION["tipo"];
                $id=$_SESSION["id"]; 
                $query = mysqli_query($connessione, "SELECT * from " . $_SESSION["tipo"] . " where id='" . $_SESSION["id"] . "'");
                while($results = $query->fetch_assoc()){
                    echo "<tr>
                    <td  class='text-left'>" . $results['User'] . "</td>
                    <td class='text-left'>" . $results['Ragsociale'] . "</td>
                    <td class='text-left'>" . $results['Nome'] . "</td>
                    <td class='text-left'>" . $results['Cognome'] . "</td>
                    <td class='text-left'>" . $results['Indirizzo'] . "</td>
                    <td class='text-left'>" . $results['Citta'] . "</td>
                    <td class='text-left'>" . $results['Provincia'] . "</td>
                    <td class='text-left'>" . $results['Telefono'] . "</td>
                    <td class='text-left'>" . $results['Email'] . "</td>
                    <td class='text-left'>" . $results['Note'] . "</td>
                    </tr>";
                }
                ?>
            </table>
                    </div>
                </div>
            </div>
        </section>


    </body>
    <script>
        (function($) {

            $main_links = $('.app-nav-main-links').find('.link-lvl1');

            $.each($main_links, function(k, v) {
                $(v).on('click', function(e) {
                    e.preventDefault();
                    $main_links.removeClass('selected');
                    $(this).addClass('selected');
                });
            });

            $('.links-lvl2').find('a').on('click', function(e) {
                e.preventDefault();
                $(this).siblings().removeClass('selected');
                abbreviation = $(this).addClass('selected').data('abbr');
                $(this).parents('.trigger').children('.trigger-lvl2').addClass('selected');
            });

            $('.trigger-lvl3').on('click', function(e) {
                e.preventDefault(); // in case we're a link
                $(this).children('.btn-menu-minus').toggleClass('on');
                $(this).parents('.links-lvl3-wrapper').toggleClass('expand');
            });

        })(jQuery)
    </script>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>