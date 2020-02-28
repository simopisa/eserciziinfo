function inscliente(){
    document.getElementById("inscliente").style.display="block";
    document.getElementById("insauto").style.display="none";
    document.getElementById("inscasa").style.display="none";
    document.getElementById("ricquery").style.display="none";
}
function inscasa(){
    document.getElementById("inscliente").style.display="none";
    document.getElementById("insauto").style.display="none";
    document.getElementById("inscasa").style.display="block";
    document.getElementById("ricquery").style.display="none";
}
function insauto(){
    document.getElementById("inscliente").style.display="none";
    document.getElementById("insauto").style.display="block";
    document.getElementById("inscasa").style.display="none";
    document.getElementById("ricquery").style.display="none";
}
function ricquery(){
    document.getElementById("inscliente").style.display="none";
    document.getElementById("insauto").style.display="none";
    document.getElementById("inscasa").style.display="none";
    document.getElementById("ricquery").style.display="block";
}
