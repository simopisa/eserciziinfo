<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
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
        <script type="text/javascript">
            function abc() {
                alert("Success");
            }
        </script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                $("#draggable").draggable();
            });
            $(function() {
                $("#draggable1").draggable();
            });
        </script>
    </head>

    <body id="principale">


        <body class="bg-purple">

            <div class="stars">
                <div class="custom-navbar">

                    <div class="navbar-links">
                        <ul>

                            <li><a href="#" onclick="return inscliente();">INSERISCI CLIENTE</a></li>
                            <li><a href="#" onclick="return inscasa();">INSERISCI CASA</a></li>
                            <li><a href="#" onclick="return insauto();">INSERISCI AUTO</a></li>
                            <li><a href="logout.php" class="btn-request">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="central-body">

                    <div id="inscliente">
                        <form action="inseriscicliente.php" method="post">
                           
                          
                                <h1>Inserisci il cliente</h1>

                                <div class="contentform">
                                    <div id="sendmessage"> comando eseguito correttamente </div>


                                    <div class="leftcontact">
                                        <div class="form-group">
                                            <p>Surname<span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-male"></i></span>
                                            <input type="text" name="nom" id="nom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné." />
                                            <div class="validation"></div>
                                        </div>

                                        <div class="form-group">
                                            <p>Name <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-user"></i></span>
                                            <input type="text" name="prenom" id="prenom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Prénom' doit être renseigné." />
                                            <div class="validation"></div>
                                        </div>

                                        <div class="form-group">
                                            <p>E-mail <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                                            <input type="email" name="email" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire." />
                                            <div class="validation"></div>
                                        </div>

                                        <div class="form-group">
                                            <p>Company <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-home"></i></span>
                                            <input type="text" name="society" id="society" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Société' doit être renseigné." />
                                            <div class="validation"></div>
                                        </div>

                                        <div class="form-group">
                                            <p>Company Address <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-location-arrow"></i></span>
                                            <input type="text" name="adresse" id="adresse" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Adresse' doit être renseigné." />
                                            <div class="validation"></div>
                                        </div>

                                        <div class="form-group">
                                            <p>Postcode <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" name="postal" id="postal" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Code postal' doit être renseigné." />
                                            <div class="validation"></div>
                                        </div>



                                    </div>

                                    <div class="rightcontact">

                                        <div class="form-group">
                                            <p>City <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-building-o"></i></span>
                                            <input type="text" name="ville" id="ville" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Ville' doit être renseigné." />
                                            <div class="validation"></div>
                                        </div>

                                        <div class="form-group">
                                            <p>Phone number <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-phone"></i></span>
                                            <input type="text" name="phone" id="phone" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres" />
                                            <div class="validation"></div>
                                        </div>

                                        <div class="form-group">
                                            <p>Function <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-info"></i></span>
                                            <input type="text" name="fonction" id="fonction" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Fonction' doit être renseigné." />
                                            <div class="validation"></div>
                                        </div>

                                        <div class="form-group">
                                            <p>Subject <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-comment-o"></i></span>
                                            <input type="text" name="sujet" id="sujet" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Sujet' doit être renseigné." />
                                            <div class="validation"></div>
                                        </div>

                                        <div class="form-group">
                                            <p>Message <span>*</span></p>
                                            <span class="icon-case"><i class="fa fa-comments-o"></i></span>
                                            <textarea name="message" rows="14" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Message' doit être renseigné."></textarea>
                                            <div class="validation"></div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="bouton-contact">Send</button>

                            


                        </form>
                    </div>
                    <div id="insauto">


                    </div>
                    <div id="inscasa">


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