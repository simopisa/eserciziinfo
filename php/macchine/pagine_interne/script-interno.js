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
            document.getElementById("bottonee").innerHTML = "THE TRUTH IS THAT...";
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
function destroy() {
    
    document.getElementById("bottonee").innerHTML = "WHAT DID YOU DO\n WE ALL GONNA DIE";
    setTimeout(() => {
        document.getElementById("black").style.animation="animateThis 10s";
        document.getElementById("black").style.animation="fill-mode: forwards";
        setTimeout(() => {
            document.getElementById("principale").style.display="none";
        }, 10000);
    }, 1000);
}