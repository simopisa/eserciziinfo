var a;
let arr=new Array();
function myfunction() {
  
    let stringa=document.getElementById("idstringain").value;
    let var1=caratteri(stringa);
    document.getElementById("a1").innerHTML=var1;
    let var2=vocali();
    document.getElementById("a2").innerHTML=var2;
    let var3=lettere();
    document.getElementById("a3").innerHTML=var3;
    let var5=stringa.toUpperCase();
    document.getElementById("a5").innerHTML=var5;
    
    
    
}
function caratteri(stringa){
    
    arr=stringa.split("");
    let x=arr.length;
    return x;

}
function vocali(){
    let cont=0;
    for (let i = 0; i< arr.length; i++) {
        if (arr[i]=="a" || arr[i]=="e" || arr[i]=="i" ||arr[i]=="o" || arr[i]=="u") {
            cont++;
        }
       
    }   
    return cont;
}
function lettere(){
    let cont=0;
   
    var espressione=new RegExp('^[a-z]+$','i');
    for (let i = 0; i< arr.length; i++) {
        if (!espressione.test(arr[i])) {
            cont++;
        }
       
    }
    var per=calcolaPerc(arr.length,cont)
    return per+"%";
}
function calcolaPerc(tot,num) {
    return ((num/tot) * 100).toFixed(0);
}
function inserscilettera(){
    a=prompt("inserisci una lettera:");
    let pos=arr.indexOf(a);
    let var4=pos+1;
    document.getElementById("a4").innerHTML=var4;
}