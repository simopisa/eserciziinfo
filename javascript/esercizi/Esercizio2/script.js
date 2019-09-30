var cont=0;
function Add(){
    cont=cont+2;

    document.getElementById("tot").value=cont;
}
function Togli() {
    
    if(cont==0){
        alert("il credito è uguale a zero non puoi togliere altro");
    }else{
        cont = cont-2;
    }
    document.getElementById("tot").value=cont;
}