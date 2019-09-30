var tot=0;
var stringa;
var posizione;

function numeriCaratteri(){
    
    //prima casella
    stringa = document.getElementById("ricerca").value;
    document.getElementById("numCarat").value = stringa.length;
    //seconda casella
    for(var i=0;i<stringa.length;i++){
        if(stringa[i]=="a"||stringa[i]=="e"||stringa[i]=="i"||stringa[i]=="o"||stringa[i]=="u"){
            tot++;
        }
    }
    document.getElementById("numVocal").value = tot;
    //terza casella
    var a = stringa ;
    document.getElementById("nonAlfa").value = (a.replace(/[a-z]/gi, '').length*100 / stringa.length);
    //quarta casella
    posizione = document.getElementById("posizione").value;
    
    document.getElementById("posCarat").value = stringa[posizione-1];
    //quinta casella
    document.getElementById("lettMaiusc").value =stringa.toUpperCase();
}
