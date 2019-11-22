<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <style>
        @import url("css/main-style.css");
    </style>
</head>

<body>
    <!-- BUTTON SHOW/HIDE INSTRUCTION -->
  


    <div class="c-mobile-view">
        <!-- CONTROLLERS -->
        <input type="checkbox" id="u-mobile__button" name="u-mobile__button">
        <input type="checkbox" id="u-topbar__button" name="u-topbar__button">
        <input type="checkbox" id="u-cards-switcher__button" name="u-cards-switcher__button">
        <input type="checkbox" id="u-cards-hide__button" name="u-cards-hide__button">
        <!-- / controllers-->

        <!-- MOBILE VIEW CONTAINER -->
        <div class="c-mobile-view__inner">

            <!-- TOPBAR -->
            <div class="c-mobile__topbar">
                <label for="u-topbar__button" class="c-button c-topbar__button--menu fa fa-bars"> <img src="icons/menu.png" ></label>
                <label for="u-topbar__button" class="c-button c-topbar__button--close fa fa-times">  <img src="icons/cross.png" ></label>
                <ul>
                    <li><a href="" class="u-link__effect">Polveri</a></li>
                    <li><a href="" class="u-link__effect">Temperatura</a></li>
                    <li><a href="" class="u-link__effect">Umidità</a></li>
                </ul>
            </div>

            <!-- CARDS -->
            <div class="c-cards__inner">
                <div class="c-card c-card--back">
                    <div class="c-card__details">
                        <div class="c-card__details__top">
                            <h1>201-217 Central Park West</h1>
                            <p>New York, NY 10024, Stati Uniti</p>
                            <p>40.782093, -73.971731</p>
                        </div>
                        <div class="c-card__details__bottom">12<span>km</span></div>
                    </div>
                </div>
                <div class="c-card c-card--front">
                    <div class="c-card__details">
                        <div class="c-card__details__top">
                            <h1>284 5th Avenue</h1>
                            <p>New York, NY 10001, Stati Uniti</p>
                            <p>40.737330, -73.987470</p>
                        </div>
                        <div class="c-card__details__bottom">2.4<span>km</span></div>
                    </div>
                </div>
                

                <!-- ANIMATED PIN -->
                
            </div>
        </div>

        <!-- OVERLAY -->
       

        <!-- SWITCHER CARDS BUTTON -->
        <label for="u-cards-switcher__button" class="c-button c-switcher__button">
            <span class="c-switcher__button--cards fa fa-refresh"><img src="icons/refresh.png" height="16px" width="16px"></span>
        </label>

        <!-- HIDE CARDS BUTTON -->
        <label for="u-cards-hide__button" class="c-button c-show__button">
            <span class="c-show__button--cards fa fa-eye"><img src="icons/eye.png" height="16px" width="16px"></span>
        </label>
       

        
       

        
       
    </div>

</body>

</html>