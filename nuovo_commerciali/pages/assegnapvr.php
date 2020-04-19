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
    if (isset($_SESSION["buonfine"])) {
        if ($_SESSION["buonfine"] == true) {
            echo "<script>alert('comando andato a buon fine');</script>";
        } else {
            echo "<script>alert('comando non andato a buon fine')</script>";
        }
        unset($_SESSION["buonfine"]);
    }
    #===============================================================================================


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
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert2@7.0.9/dist/sweetalert2.all.js"></script>

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
                    <li><a href="newpvr.php" onclick="window.location.href='newpvr.php'" class="link-lvl1"><i class="fa fa-plus"></i><span>Nuovo pvr</span></a></li>
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
                                <th class="text-left">Tipo</th>
                                <th class="text-left">User</th>
                                <th></th>

                            </tr>
                            <tbody class="table-hover">
                                <?php
                                $query = mysqli_query($connessione, "SELECT user,ragsociale,id from commerciali");
                                while ($results = $query->fetch_assoc()) {
                                    if ($results['id']!=0) {
                                        echo "<tr>
                                        <form action='../script/assegnapvracom.php' method='post'>
                                        <td  class='text-left' ><i class=\"fa fa-user\"></i></td>
                                        <td class='text-left' >" . $results['user'] . "</td>
                                        <td class='text-left' hidden> <input type='hidden' name='id' value='" . $results['id'] . "'></td>
                                        <td class='text-left' hidden> <input type='hidden' name='tipo' value='commerciali'></td>
                                        <td  class='text-left' style=\"text-align: center; width:auto\"><input type=\"submit\" value=\"Assegna\" name=\"assegna\" class=\"button-invia info\"></td>
                                      </form>
                                          </tr>";
                                    }
                                      
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