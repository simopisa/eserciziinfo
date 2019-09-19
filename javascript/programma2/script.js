var tot=0;
function togli() {
    if (tot==0) {
        alert("non puoi togliere soldi, siamo a zero");
    }else{
    tot=tot-2;
    }
    document.getElementById("tot").innerHTML=tot;
}
function aggiungi() {
    
    tot=tot+2;
    
    document.getElementById("tot").innerHTML=tot;
}