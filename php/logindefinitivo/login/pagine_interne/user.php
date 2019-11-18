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

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#draggable").draggable();
        });
        
    </script>
</head>

<body>
    <?php
    if (!$_COOKIE['verifica']) {
        header("location: ../index.php");
    }
    // echo "<h1> Welcome in " . $_COOKIE["username"] . "</h1>";
    // echo "<h2> Your mail is " . $_COOKIE["email"] . " and your phone number: " . $_COOKIE["telefono"] . "</h2>";
    // echo "<h2><a href='../index.php'>esci</a></h2>";

    ?>


    <body class="bg-purple">

        <div class="stars">
            <div class="custom-navbar">

                <div class="navbar-links">
                    <ul>
                        <li><a href="#"><?php echo "Mail: " . $_COOKIE["email"]; ?></a></li>
                        <li><a href="#"><?php echo "Phone: " . $_COOKIE["telefono"]; ?></a></li>
                        <li><a href="#"><?php echo "Welcome " . $_COOKIE["username"]; ?></a></li>
                        <li><a href="../index.php" class="btn-request">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="central-body">
                <img class="image-404" src="icone/404.svg" width="300px" style="display:none; margin-left:40%" id="404">
                <a href="#" class="btn-go-home" onclick="return funzione();" id="bottonee">DON'T CLICK ME</a>
            </div>
            <div class="objects">
                <img class="object_rocket" src="icone/rocket.svg" width="40px">
                <div class="earth-moon">
                    <img class="object_earth" src="icone/earth.svg" width="100px">
                    <img class="object_moon" src="icone/moon.svg" width="80px">
                    <img class="object_jupiter" src="icone/jupiter.png" width="80px">

                </div>
                <div class="box_astronaut" draggable="true" id="draggable">
                    <img class="object_astronaut" src="icone/astronautt.png" width="140px">
                </div>
            </div>
            <div class="glowing_stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                

            </div>

        </div>

    </body>
</body>

</html>