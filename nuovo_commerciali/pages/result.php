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
    if (isset($_SESSION["assegnato"])) {
        if ($_SESSION["assegnato"] == true) {
            echo "<script>alert('pvr assegnato al commerciale selezionato');</script>";
        } else {
            echo "<script>alert('pvr non assegnato al commerciale selezionato, controlla che sia tutto corretto')</script>";
        }
        unset($_SESSION["assegnato"]);
    }
    if (isset($_SESSION["fatto"])) {
        if ($_SESSION["fatto"] == true) {
            echo "<script>alert('pvr inoltrato correttamente');</script>";
        } else {
            echo "<script>alert('pvr non inoltrato correttamente, controlla che sia tutto corretto')</script>";
        }
        unset($_SESSION["fatto"]);
    }
    if (isset($_SESSION["modbuonfine"])) {
        if ($_SESSION["modbuonfine"] == true) {
            echo "<script>alert('modifica avvenuta con successo');</script>";
        } else {
            echo "<script>alert('qualcosa è andato storto nella modifica')</script>";
        }
        unset($_SESSION["modbuonfine"]);
    }
    if (isset($_SESSION["eliminato"])) {
        if ($_SESSION["eliminato"] == true) {
            echo "<script>alert('elemento eliminato con successo');</script>";
        } else {
            echo "<script>alert('qualcosa è andato storto nella eliminazione dell'elemento')</script>";
        }
        unset($_SESSION["eliminato"]);
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
                                <th class="text-left">Rag. sociale</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tbody class="table-hover">
                                <?php
                                if (isset($_POST["submit"])) {
                                    $_SESSION["radio"]=$_POST["radio"];
                                    $_SESSION["search"]=$_POST["search"];
                                    if ($_SESSION["radio"]=="all") {
                                        $query = mysqli_query($connessione, "SELECT user,ragsociale,id from commerciali where User like '%".$_SESSION["search"]."%' OR Cognome like '%".$_SESSION["search"]."%' OR citta like '%".$_SESSION["search"]."%' OR Provincia like '%".$_SESSION["search"]."%' OR Ragsociale like '%".$_SESSION["search"]."%' OR Telefono like '%".$_SESSION["search"]."%' OR Email like '%".$_SESSION["search"]."%'");
                                    }elseif ($_SESSION["radio"]=="user") {
                                        $query = mysqli_query($connessione, "SELECT user,ragsociale,id from commerciali where User like '%".$_SESSION["search"]."%'");
                                   
                                    }elseif ($_SESSION["radio"]=="citta") {
                                        $query = mysqli_query($connessione, "SELECT user,ragsociale,id from commerciali where Citta like '%".$_SESSION["search"]."%'");
                                   
                                    }elseif ($_SESSION["radio"]=="provincia") {
                                        $query = mysqli_query($connessione, "SELECT user,ragsociale,id from commerciali where Provincia like '%".$_SESSION["search"]."%'");
                                   
                                    }elseif ($_SESSION["radio"]=="cognome") {
                                        $query = mysqli_query($connessione, "SELECT user,ragsociale,id from commerciali where Cognome like '%".$_SESSION["search"]."%'");
                                   
                                    }
                                  
                                    while ($results = $query->fetch_assoc()) {
                                       
                                            echo "<tr>
              <form action='../script/router.php' method='post'>
              <td  class='text-left' ><i class=\"fa fa-user\"></i></td>
              <td class='text-left' >" . $results['user'] . "</td>
              <td class='text-left' >" . $results['ragsociale'] . "</td>
              <td class='text-left' hidden> <input type='hidden' name='id' value='" . $results['id'] . "'></td>
              <td class='text-left' hidden> <input type='hidden' name='tipo' value='commerciali'></td>
              <td  class='text-left' style=\"text-align: center; width:auto\"><input type=\"submit\" value=\"Info\" name=\"info\" class=\"button-invia info\"></td>
              <td  class='text-left' style=\"text-align: center; width:auto\"><input type=\"submit\" value=\"Nuovo PVR\" name=\"nuovo_PVR\" class=\"button-invia nuovo\"></td>
              <td  class='text-left' style=\"text-align: center; width:auto\"><input type=\"hidden\"></td>
              <td  class='text-left' style=\"text-align: center; width:min-content\"><input type=\"submit\" value=\"Elenco PVR\" name=\"elenco_PVR\" class=\"button-invia info\"></td>
              <td class='text-left'  style=\"text-align: center; width:auto\"><input type=\"hidden\"></td>
              <td  class='text-left' style=\"text-align: center; width:auto\"><input type=\"submit\" value=\"Modifica\" name=\"modifica\" class=\"button-invia nuovo\"></td>
              <td  class='text-left' style=\"text-align: center; width:auto\"><input type=\"submit\" value=\"Elimina\" name=\"elimina\" class=\"button-invia info\"></td>
              </form>
                </tr>";
                                        
                                    }

                                    if ($_SESSION["radio"]=="all") {
                                        $query = mysqli_query($connessione, "SELECT user,ragsociale,id from negozi where User like '%".$_SESSION["search"]."%' OR Cognome like '%".$_SESSION["search"]."%' OR citta like '%".$_SESSION["search"]."%' OR Provincia like '%".$_SESSION["search"]."%' OR Ragsociale like '%".$_SESSION["search"]."%' OR Telefono like '%".$_SESSION["search"]."%' OR Email like '%".$_SESSION["search"]."%'");
                                    }elseif ($_SESSION["radio"]=="user") {
                                        $query = mysqli_query($connessione, "SELECT user,ragsociale,id from negozi where Ragsociale like '%".$_SESSION["search"]."%'");
                                   
                                    }elseif ($_SESSION["radio"]=="citta") {
                                        $query = mysqli_query($connessione, "SELECT user,ragsociale,id from negozi where Citta like '%".$_SESSION["search"]."%'");
                                   
                                    }elseif ($_SESSION["radio"]=="provincia") {
                                        $query = mysqli_query($connessione, "SELECT user,ragsociale,id from negozi where Provincia like '%".$_SESSION["search"]."%'");
                                   
                                    }elseif ($_SESSION["radio"]=="cognome") {
                                        $query = mysqli_query($connessione, "SELECT user,ragsociale,id from negozi where Cognome like '%".$_SESSION["search"]."%'");
                                   
                                    }
                                    while ($results = $query->fetch_assoc()) {
                                        
                                            echo "<tr>
                                            <form action='../script/router.php' method='post'>
                                            <td class='text-left' ><i class='fa fa-home'></i></td>
                                            <td class='text-left' >" . $results['user'] . "</td>
                                            <td class='text-left' >" . $results['ragsociale'] . "</td>
                                            <td class='text-left' hidden> <input type='hidden' name='id' value='" . $results['id'] . "'></td>
                                            <td class='text-left' hidden> <input type='hidden' name='tipo' value='negozi'></td>
                                            <td class='text-left'  style=\"text-align: center; width:auto\"><input type=\"submit\" value=\"Info\" name=\"info\" class=\"button-invia  info\"></td>
                                            <td class='text-left'  style=\"text-align: center; width:auto\"><input type=\"hidden\"></td>
                                            <td class='text-left'  style=\"text-align: center; width:auto\"><input type=\"submit\" value=\"Assegna\" name=\"Assegna\" class=\"button-invia nuovo\"></td>
                                            <td  class='text-left' style=\"text-align: center; width:min-content\"><input type=\"hidden\"></td>
                                            <td  class='text-left' style=\"text-align: center; width:auto\"><input type=\"submit\" value=\"Inoltra\" name=\"Inoltra\" class=\"button-invia info\"></td>
                                            <td class='text-left'  style=\"text-align: center; width:auto\"><input type=\"submit\" value=\"Modifica\" name=\"modifica\" class=\"button-invia nuovo\"></td>
                                            <td  class='text-left' style=\"text-align: center; width:auto\"><input type=\"submit\" value=\"Elimina\" name=\"elimina\" class=\"button-invia info\"></td>
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