x=0;
var tot;
var cont=new Array();

function funct1(){
    
    for (let i = 0 ;i< document.getElementById("numA");i++) {
        cont[i]=prompt("inserisci un numero");
        
    }
    for (let i = 0 ;i< document.getElementById("numA").value;i++) {
        cont[i]=prompt("inserisci un numero");
        if(cont[i]>document.getElementById("numB").value && cont[i] < document.getElementById("numC").value){
            
            x++;
        }
    } 
 }
    document.getElementById("risultato").value = x;
function form1(){
    for (let i = 0 ;i< document.getElementById("numA");i++) {
            cont[i]=prompt("inserisci un numero");
    }    
}  
   
