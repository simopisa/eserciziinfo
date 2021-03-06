<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="js/script.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(function() {

            $(".input input").focus(function() {

                $(this).parent(".input").each(function() {
                    $("label", this).css({
                        "line-height": "18px",
                        "font-size": "18px",
                        "font-weight": "100",
                        "top": "0px"
                    })
                    $(".spin", this).css({
                        "width": "100%"
                    })
                });
            }).blur(function() {
                $(".spin").css({
                    "width": "0px"
                })
                if ($(this).val() == "") {
                    $(this).parent(".input").each(function() {
                        $("label", this).css({
                            "line-height": "60px",
                            "font-size": "24px",
                            "font-weight": "300",
                            "top": "10px"
                        })
                    });

                }
            });

            $(".button").click(function(e) {
                var pX = e.pageX,
                    pY = e.pageY,
                    oX = parseInt($(this).offset().left),
                    oY = parseInt($(this).offset().top);

                $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
                $('.x-' + oX + '.y-' + oY + '').animate({
                    "width": "500px",
                    "height": "500px",
                    "top": "-250px",
                    "left": "-250px",

                }, 600);
                $("button", this).addClass('active');
            })

            $(".alt-2").click(function() {
                if (!$(this).hasClass('material-button')) {
                    $(".shape").css({
                        "width": "100%",
                        "height": "100%",
                        "transform": "rotate(0deg)"
                    })

                    setTimeout(function() {
                        $(".overbox").css({
                            "overflow": "initial"
                        })
                    }, 600)

                    $(this).animate({
                        "width": "140px",
                        "height": "140px"
                    }, 500, function() {
                        $(".box").removeClass("back");

                        $(this).removeClass('active')
                    });

                    $(".overbox .title").fadeOut(300);
                    $(".overbox .input").fadeOut(300);
                    $(".overbox .button").fadeOut(300);

                    $(".alt-2").addClass('material-buton');
                }

            })

            $(".material-button").click(function() {

                if ($(this).hasClass('material-button')) {
                    setTimeout(function() {
                        $(".overbox").css({
                            "overflow": "hidden"
                        })
                        $(".box").addClass("back");
                    }, 200)
                    $(this).addClass('active').animate({
                        "width": "700px",
                        "height": "700px"
                    });

                    setTimeout(function() {
                        $(".shape").css({
                            "width": "50%",
                            "height": "50%",
                            "transform": "rotate(45deg)"
                        })

                        $(".overbox .title").fadeIn(300);
                        $(".overbox .input").fadeIn(300);
                        $(".overbox .button").fadeIn(300);
                    }, 700)

                    $(this).removeClass('material-button');

                }

                if ($(".alt-2").hasClass('material-buton')) {
                    $(".alt-2").removeClass('material-buton');
                    $(".alt-2").addClass('material-button');
                }

            });

        });
    </script>
</head>

<body>
    <div class="materialContainer">


        <div class="box">
            <form action="../script/changepsw.php" method="post">
                <div class="title">CAMBIA PASSWORD</div>

                <div class="input">
                    <label for="vpass">Vecchia password</label>
                    <input type="password" name="vpass" id="vpass" required>
                    <span class="spin"></span>
                </div>

                <div class="input">
                    <label for="pass">Nuova password</label>
                    <input type="password" name="pass" id="pass" required>
                    <span class="spin"></span>
                </div>
                <div class="input">
                    <label for="pass1">Ripeti nuova password</label>
                    <input type="password" name="pass1" id="pass1" required>
                    <span class="spin"></span>
                </div>

                <div class="button login">
                    <button type="submit" name="submit"><span>GO</span> <i class="fa fa-check"></i></button>
                    <button onclick="window.location.href='settings.php'"><span>BACK</span> <i class="fa fa-check"></i></button>
                </div>
            </form>


        </div>



    </div>
</body>

</html>
<?php
} else {
    header("location: ../index.php");
}
?>