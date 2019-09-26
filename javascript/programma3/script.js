let arr=new Array();
const funzione=()=> {
    let a;
    let cont=0;
    do {
        a=prompt("inserisci un numero, premi e per uscire:");
        arr[cont]=a;
        cont++;
    } while (a!='e');
    arr[arr.length-1]=0;
    let b=prompt("inserisci il primo numero");
    let c=prompt("inserisci il secondo numero");
    let cont1=0;
    for (let i = 0; i < arr.length; i++) {
        if (arr[i]>=b && arr[i]<=c) {
            cont1++;
        }
        
    }
    alert(cont1);
}