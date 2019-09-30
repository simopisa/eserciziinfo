function funzione(name){
    
    if(name == "cap"){
        if(modulo.cap.value.length <5){
            alert("Il CAP inserito deve essere di 5 caratteri");
        }
        for(var i=0;i<cap.length;i++){
            if(cap[i]){                                  
                alert("Il CAP inserito deve essere di 5 caratteri numerici");
            }
        }
    }
    
    if(name == "cognomenome"){
        if(!isNaN(parseFloat(modulo.cognomenome.value) && isFinite(modulo.cognomenome.value))){
            alert("Il nome o cognome contengono numeri");
        }
    }
    
    if(name == "modulo"){
        if(modulo.cognomenome.value == ""){
            alert("Il campo nome e cognome è vuoto");
        }
        
        if(modulo.genere.value == ""){
            alert("Selezionare un sesso");
        }
        
        if(modulo.ateneo.value == "vuoto"){
            alert("Selezionare un ateneo");
        }
        
        if(modulo.professione.checked == true){
            if(modulo.descrizione.value == ""){
                alert("Il campo Studente/lavoratore, se selezionato, comprende anche una descrizione")
            }
            
        }
    }
}


