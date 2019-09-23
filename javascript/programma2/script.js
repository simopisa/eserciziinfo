var tot=0;
const togli= () => {
    if (tot==0) {
        alert("non puoi togliere soldi, siamo a zero");
    }else{
    tot=tot-2;
    }
    document.getElementById("tot").innerHTML=tot;
}
const aggiungi = () => {
    
    tot=tot+2;
    
    document.getElementById("tot").innerHTML=tot;
}
