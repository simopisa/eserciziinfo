function controlla() {
    if(document.getElementById("evento").value=="") {
        alert("inserisci un evento");
        return false;
    }else if(document.getElementById("persone").value==""){
        alert("inserisci il numero persone");
        return false;
    }else{
        return true;
    }
}