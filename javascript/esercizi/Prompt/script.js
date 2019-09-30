var array;
var num;
var a;
var b;
var c;
var lunghezza;


function funzione(){
    lunghezza = prompt("inserisci lunghezza");

    array = new Array(lunghezza);

    for(i=0;i<lunghezza;i++){
        array[i]=prompt("Inserisci il "+(i+1)+"valore del array");
    }
    b = prompt("inserisci a");
    c = prompt("inserisci b");

    for(i=0;i<lunghezza;i++){
        if(array[i]>= b && array[i] <= c){
            num++;
        }
    }
    alert("ci sono"+num+"elementi nel array compreso tra "+b+"e"+c+" .");
}