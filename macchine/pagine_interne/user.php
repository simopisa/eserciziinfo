<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true && $_SESSION["admin"]==true && isset($_SESSION["admin"])) {

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
            @import url("styyle.css");
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="script-interno.js">
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>

    <body id="principale">


        <body class="bg-purple">

            <div class="stars">
                <div class="custom-navbar">

                    <div class="navbar-links">
                        <ul>
                            <li><a href="#">Welcome <?php echo $_SESSION["user"] ?></a></li>
                            <li><a href="#" onclick="return ricquery();">RICERCA QUERY</a></li>
                            <li><a href="#" onclick="return inscliente();">INSERISCI CLIENTE</a></li>
                            <li><a href="#" onclick="return inscasa();">INSERISCI CASA</a></li>
                            <li><a href="#" onclick="return insauto();">INSERISCI AUTO</a></li>
                            <li><a href="logout.php" class="btn-request">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="central-body">

                    <div id="inscliente" style="display: none">
                        <form action="inseriscicliente.php" method="post">
                            <h1>Inserisci il cliente</h1>
                            <div class="contentform">

                                <div class="leftcontact">
                                    <div class="form-group">
                                        <p>Cognome<span>*</span></p>
                                        <span class="icon-case"><i class="fa  fa-user"></i></span>
                                        <input type="text" name="cognome" id="cognome" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>

                                    <div class="form-group">
                                        <p>Città <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-building"></i></span>
                                        <input type="text" name="city" id="city" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>
                                </div>

                                <div class="rightcontact">
                                    <div class="form-group">
                                        <p>Nome <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-user"></i></span>
                                        <input type="text" name="nome" id="nome" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group">
                                        <p>Indirizzo <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-address-card"></i></span>
                                        <input type="text" name="address" id="address" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="bouton-contact">Send</button>
                        </form>

                    </div>
                    <?php
                    if (isset($_SESSION["insertiscorrect"])) {
                        if ($_SESSION["insertiscorrect"] == true) {
                            echo  '<div id="sendmessage"> comando eseguito correttamente </div>';
                            echo ' <script>
                                setTimeout(function scompari(){
                                    document.getElementById("sendmessage").style.display="none";
                                }, 1000);
            
                                scompari();
                                </script>';
                        } else {
                            echo  '<div id="sendmessage"> comando non eseguito correttamente </div>';
                            echo ' <script>
                            setTimeout(function scompari(){
                                document.getElementById("sendmessage").style.display="none";
                            }, 1000);
        
                            scompari();
                            </script>';
                        }
                    }


                    ?>

                    <!--  ======================================================================================================================================================== -->
                    <div id="insauto" style="display: none">
                        <form action="inserisciauto.php" method="post">


                            <h1>Inserisci l'auto</h1>

                            <div class="contentform">


                                <div class="leftcontact">
                                    <div class="form-group">
                                        <p>Targa<span>*</span></p>
                                        <span class="icon-case"><i class="fa  fa-id-card"></i></span>
                                        <input type="text" name="targa" id="targa" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>

                                    <div class="form-group">
                                        <p>Cilindrata <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-cc"></i></span>
                                        <input type="number" name="cilindrata" id="cilindrata" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>

                                    <div class="form-group">
                                        <p>Prezzo <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-eur"></i></span>
                                        <input type="number" name="prezzo" id="prezzo" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group">
                                        <p>Alimentazione <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-car"></i></span>

                                        <select name="alimentazione" data-rule="required">
                                            <option value="DIESEL">diesel</option>
                                            <option value="BENIZINA">benzina</option>
                                        </select>
                                        <div class="validation"></div>
                                    </div>




                                </div>

                                <div class="rightcontact">
                                    <div class="form-group">
                                        <p>Modello <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-car"></i></span>
                                        <input type="text" name="modello" id="modello" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group">
                                        <p>Colore <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-image"></i></span>
                                        <input type="text" name="colore" id="colore" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>

                                    <div class="form-group">
                                        <p>Nome casa <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-home"></i></span>

                                        <select name="nomecasa" data-rule="required">
                                            <?php
                                            $result = mysqli_query($connessione, "SELECT nome_casa FROM casa");
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $row['nome_casa'] . ">" . $row['nome_casa'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group">
                                        <p>Proprietario <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-user"></i></span>
                                        <select name="idp" data-rule="required">
                                            <?php
                                            $result = mysqli_query($connessione, "SELECT * FROM proprietario");
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $row['IDproprietario'] . ">" . $row['nome'] . " " . $row["cognome"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <div class="validation"></div>
                                    </div>


                                </div>
                            </div>
                            <button type="submit" class="bouton-contact">Send</button>
                        </form>

                    </div>
                    <!--  ======================================================================================================================================================== -->
                    <div id="inscasa" style="display: none">
                        <form action="inseriscicasa.php" method="post">


                            <h1>Inserisci la casa</h1>

                            <div class="contentform">



                                <div class="leftcontact">
                                    <div class="form-group">
                                        <p>Nome casa<span>*</span></p>
                                        <span class="icon-case"><i class="fa  fa-home"></i></span>
                                        <input type="text" name="nomecasa" id="nomecasa" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>

                                    <div class="form-group">
                                        <p>Nazione <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-globe"></i></span>
                                        <input type="text" name="nazione" id="nazione" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>
                                </div>

                                <div class="rightcontact">
                                    <div class="form-group">
                                        <p>Sede <span>*</span></p>
                                        <span class="icon-case"><i class="fa fa-building"></i></span>
                                        <input type="text" name="sede" id="sede" data-rule="required" />
                                        <div class="validation"></div>
                                    </div>
                                    <!-- 
                                        <div class="form-group">
                                            <p>Phone number <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-phone"></i></span>
                                            <input type="text" name="phone" id="phone" data-rule="maxlen:10"é. Minimum 10 chiffres" />
                                            <div class="validation"></div>
                                        </div> -->






                                </div>
                            </div>
                            <button type="submit" class="bouton-contact">Send</button>




                        </form>
                    </div>
                    <!-- =0================================================================================================================================================== -->
                    <div id="ricquery">
                        <form>
                            <h1>Ricerca query</h1>
                            <div class="contentform">

                                <div class="leftcontact">
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/lettere.php'">Utenti con lettera e nel cognome</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Auto di una casa</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autofiatmagmille.php'">Auto fiat con prezzo maggiore di 10000</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/proprietariotarga.php'">Proprietario di una determinata auto con targa</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/tarmodmar.php'">Informazioni auto</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Case che non hanno venduto auto</button>
                                    </div>
                                </div>

                                <div class="rightcontact">
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/lettere.php'">Auto prodotte a torino</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Numero totale auto</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Prezzo max, min e media</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Somma prezzi auto fiat</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Numero auto di case automobilstiche</button>
                                    </div>
                                    <div class="form-group">
                                        <button class="query" onclick="window.location.href = 'paggine/autoefiles.php'">Spese proprietario</button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="bouton-contact" disabled></button>
                        </form>

                    </div>
                </div>
            </div>


            </div>

        </body>
    </body>

    </html>
<?php
} else {
    header("location: ../index.php");
}
?>