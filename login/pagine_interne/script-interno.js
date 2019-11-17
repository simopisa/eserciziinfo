cont = 0;

function funzione() {

    cont++;

    switch (cont) {
        case 1:
            document.getElementById("bottonee").innerHTML = "I SAID DON'T";
            break;
        case 2:
            document.getElementById("bottonee").innerHTML = "CAN YOU PLEASE STOP?";
            break;
        case 3:
            document.getElementById("bottonee").innerHTML = "STOP!";
            break;
        case 4:
            document.getElementById("bottonee").innerHTML = "I WILL GO AWAY";
            break;
        case 5:
            document.getElementById("bottonee").style.display = "none";
            setTimeout(function () {
                document.getElementById("bottonee").style.display = "block";
            }, 5000);
            document.getElementById("bottonee").innerHTML = "OH YOU STILL HERE :(";
            break;
        case 6:
            document.getElementById("bottonee").innerHTML = "OKAY, YOU WIN";
            break;
        case 7:
            document.getElementById("bottonee").innerHTML = "THIS IS THE SECRET";


            break;
        case 8:
            document.getElementById("bottonee").style.display = "none";
            setTimeout(function () {
                document.getElementById("404").style.display = "block";
            }, 2000);
            break;
        default:
            break;
    }

}