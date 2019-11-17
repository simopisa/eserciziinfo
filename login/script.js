function verifica(){
    if (document.getElementById("username").value=="") {
        alert("inserisci nome utente");
        return false;
    } else {
        if (document.getElementById("password").value=="") {
            alert("inserisci la password");
            return false;
        } else {
        
            return true;
        }
    }

}
function verifica1(){
    if (document.getElementById("username1").value=="" || document.getElementById("username1").value.includes("|")) {
        alert("nome utente obbligatorio, carattere | non valido");
        return false;
    } else {
        if (document.getElementById("password1").value=="" || document.getElementById("password1").value.includes("|")) {
            alert("password obbligatoria, carattere | non valido");
            return false;
        } else {
           if (document.getElementById("telefono").value=="" || document.getElementById("telefono").value.includes("|")) {
            alert("numero di telefono obbligatorio, carattere | non valido");
               return false;
           } else {
               if (document.getElementById("email").value=="" || document.getElementById("email").value.includes("|")) {
                alert("email obbligatoria, carattere | non valido");
                return false;
               } else {
                   return true;
               }
           }
        }
    }
}
function registrati() {
    document.getElementById("card").style.transform="rotateY(-180deg)";
    document.getElementById("footer").style.background="linear-gradient(90deg, #ff2a78,#f100ae)";
    document.getElementById("footer").innerHTML="*By signing up you agree to the ridiculously long terms that you didn't bother to read";
}
function login(){
    document.getElementById("card").style.transform="rotateY(0deg)";
    document.getElementById("footer").style.background="linear-gradient(90deg, #0086ff,#0066ff)";
    document.getElementById("footer").innerHTML="*By signing in you agree to the ridiculously long terms that you didn't bother to read";
}