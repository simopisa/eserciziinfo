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
        <link href='https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css' rel='stylesheet' type='text/css'>
        <link href='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/css/bootstrap-switch.css' rel='stylesheet' type='text/css'>
        <link href='https://davidstutz.github.io/bootstrap-multiselect/css/bootstrap-multiselect.css' rel='stylesheet' type='text/css'>
        <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js' type='text/javascript'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js' type='text/javascript'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js' type='text/javascript'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.8/js/bootstrap-switch.min.js' type='text/javascript'></script>
        <script src='https://davidstutz.github.io/bootstrap-multiselect/js/bootstrap-multiselect.js' type='text/javascript'></script>


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
            <?php
            $query = mysqli_query($connessione, "SELECT * from ".$_SESSION["tipo"]." where id='".$_SESSION["id"]."'");
            while ($results = $query->fetch_assoc()) {


            ?>
                <div class="app-content">
                    <div class="container" id="container">


                        <div>
                            <div>

                                <div class='panel-body'>
                                    <form class='form-horizontal' role='form' method="post" action="../script/modificaa.php" onsubmit="return controllo();">

                                        <div class='form-group'>
                                            <label class='control-label col-md-2 col-md-offset-2' for='id_title'>Name</label>
                                            <div class='col-md-8'>

                                                <div class='col-md-3 indent-small'>
                                                    <div class='form-group internal'>
                                                        <input class='form-control' id='id_first_name' placeholder='Nome' type='text' name="nome" value="<?php echo $results["Nome"]?>" required>
                                                    </div>
                                                </div>
                                                <div class='col-md-3 indent-small'>
                                                    <div class='form-group internal'>
                                                        <input class='form-control' id='id_last_name' placeholder='Cognome' type='text' name="cognome" value="<?php echo $results["Cognome"]?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label class='control-label col-md-2 col-md-offset-2' for='id_title'>City</label>
                                            <div class='col-md-8'>

                                                <div class='col-md-3 indent-small'>
                                                    <div class='form-group internal'>
                                                        <input class='form-control' id='id_first_name' placeholder='Indirizzo' type='text' name="indirizzo" value="<?php echo $results["Indirizzo"]?>">
                                                    </div>
                                                </div>
                                                <div class='col-md-3 indent-small'>
                                                    <div class='form-group internal'>
                                                        <input class='form-control' id='id_last_name' placeholder='Città' type='text' name="citta" value="<?php echo $results["Citta"]?>" required>
                                                    </div>
                                                </div>
                                                <div class='col-md-3 indent-small'>
                                                    <div class='form-group internal'>
                                                        <input class='form-control' id='id_last_name' placeholder='Provincia' type='text' name="provincia" value="<?php echo $results["Provincia"]?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class='form-group'>
                                            <label class='control-label col-md-2 col-md-offset-2' for='id_email'>Contact</label>
                                            <div class='col-md-6'>
                                                <div class='form-group'>
                                                    <div class='col-md-11'>
                                                        <input class='form-control' id='id_email' placeholder='E-mail' type="email" name="mail" value="<?php echo $results["Email"]?>">
                                                    </div>
                                                </div>
                                                <div class='form-group internal'>
                                                    <div class='col-md-11'>
                                                        <input class='form-control' id='id_phone' placeholder='Telefono: (xxx) - xxx xxxx' type='text' name="telefono" value="<?php echo $results["Telefono"]?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <label class='control-label col-md-2 col-md-offset-2' for='id_checkin'>User</label>
                                            <div class='col-md-8'>
                                                <div class='col-md-3'>
                                                    <div class='form-group internal input-group'>
                                                        <input class='form-control datepicker' id='id_checkin' name="user" value="<?php echo $results["User"]?>">
                                                        <span class='input-group-addon'>
                                                            <i class='fa fa-user'></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label class='control-label col-md-2' for='id_checkout'>Ragione sociale</label>
                                                <div class='col-md-3'>
                                                    <div class='form-group internal input-group'>
                                                        <input class='form-control datepicker' id='id_checkout' name="ragsoc" value="<?php echo $results["Ragsociale"]?>">
                                                        <span class='input-group-addon'>
                                                            <i class='fa fa-home'></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class='form-group'>
                                            <label class='control-label col-md-2 col-md-offset-2' for='id_comments'>Note</label>
                                            <div class='col-md-6'>
                                                <textarea class='form-control' id='id_comments' placeholder='Note aggiuntive' rows='3' name="note" ><?php echo $results["Note"]?></textarea>
                                            </div>
                                        </div>
                                        <div class='form-group'>
                                            <div class='col-md-offset-4 col-md-3'>
                                                <button class='btn-lg btn-primary' type='submit'>Salva cambiamenti</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            <?php } ?>
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

        $(document).ready(function() {
            $('.multiselect').multiselect();
            $('.datepicker').datepicker();
        });
    </script>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>