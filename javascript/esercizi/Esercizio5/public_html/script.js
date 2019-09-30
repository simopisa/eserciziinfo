function controlla(name){
    
    if(name == "nome"){
        if(modulo.nome.value == ""){
            alert("Il campo nome è vuoto");
        }
        if(!isNaN(parseFloat(modulo.nome.value) && isFinite(modulo.nome.value))){
            alert("Il nome contiene numeri");
        }
    }
    
    if(name == "cognome"){
        if(modulo.cognome.value == ""){
            alert("Il campo cognome è vuoto");
        }
        if(!isNaN(parseFloat(modulo.cognome.value) && isFinite(modulo.cognome.value))){
            alert("Il cognome contiene numeri");
        }
    }
    
    if(name == "giorni"){
        if(modulo.giorni.value == ""){
            alert("Il campo giorni è vuoto");
        }      
    }
    
    
    if(name == "luogoprelievo"){
        if(modulo.luogoprelievo.value == ""){
            alert("Il campo luogo prelievo è vuoto");
        }
        if(!isNaN(parseFloat(modulo.luogoprelievo.value) && isFinite(modulo.luogoprelievo.value))){
            alert("Il campo luogo prelievo contiene numeri");
        }
    }
    
    if(name == "luogorilascio"){
        if(modulo.luogorilascio.value == ""){
            alert("Il campo luogo rilascio è vuoto");
        }
        if(!isNaN(parseFloat(modulo.luogorilascio.value) && isFinite(modulo.luogorilascio.value))){
            alert("Il campo luogo rilascio contiene numeri");
        }
    }
    
    
    if(name == "auto"){
        if(modulo.auto.value == ""){
            alert("Auto non selezionata");
        }
    }
    
    if(name == "carburante"){
        if(modulo.carburante.checked ==  false){
            alert("Carburante non selezionato");
        }
    }
    
    
    if(name == "tipologianoleggio"){
        if(modulo.tipologianoleggio.value == ""){
            alert("Tipologia noleggio non selezionata");
        }
    }
    
    if(name == "tipologiapagamento"){
        if(modulo.tipologiapagamento.value == ""){
            alert("Tipologia pagamento non selezionato");
        }
    }
   
}

function funzione(){
    
    modulo.cliente.value = modulo.nome.value+" "+modulo.cognome.value;
    
    if(modulo.tipologianoleggio.value == "kmlimitati" ){
        if(modulo.auto.value =="audia4"){
            modulo.importo.value= modulo.giorni.value*80;
        }
        
        if(modulo.auto.value =="mercedesclassec"){
            modulo.importo.value= modulo.giorni.value*75;
        }
        
        if(modulo.auto.value =="mercedesclasseb"){
            modulo.importo.value= modulo.giorni.value*55;
        }
        
        if(modulo.auto.value =="auditt"){
            modulo.importo.value= modulo.giorni.value*125;
        }
        
        if(modulo.auto.value =="fiatgrandepunto"){
            modulo.importo.value= modulo.giorni.value*40;
        }
        
        if(modulo.auto.value =="fiatpanda"){
            modulo.importo.value= modulo.giorni.value*35;
        }
        
        if(modulo.auto.value =="peugeot206"){
            modulo.importo.value= modulo.giorni.value*50;
        }
    }
    
    if(modulo.tipologianoleggio.value == "kmillimitati" ){
        if(modulo.auto.value =="audia4"){
            modulo.importo.value= modulo.giorni.value*125;
        }
        
        if(modulo.auto.value =="mercedesclassec"){
            modulo.importo.value= modulo.giorni.value*115;
        }
        
        if(modulo.auto.value =="mercedesclasseb"){
            modulo.importo.value= modulo.giorni.value*80;
        }
        
        if(modulo.auto.value =="auditt"){
            modulo.importo.value= modulo.giorni.value*165;
        }
        
        if(modulo.auto.value =="fiatgrandepunto"){
            modulo.importo.value= modulo.giorni.value*60;
        }
        
        if(modulo.auto.value =="fiatpanda"){
            modulo.importo.value= modulo.giorni.value*45;
        }
        
        if(modulo.auto.value =="peugeot206"){
            modulo.importo.value= modulo.giorni.value*60;
        }
    }
    
    if(modulo.carburante.value == "benzina"){
        modulo.scontoeco.value = 0;
    }
    
    if(modulo.carburante.value == "diesel"){
        modulo.scontoeco.value = 0;
    }
    
    if(modulo.carburante.value == "metano"){
        modulo.scontoeco.value = -((modulo.importo.value/100)*10);
    }
    
   if(modulo.carburante.value == "gpl"){
        modulo.scontoeco.value = -((modulo.importo.value/100)*10);
    }
    
    if((modulo.auto.value == "audia4" || modulo.auto.value == "mercedesclassec" || modulo.auto.value== "mercedesclasseb" ||  modulo.auto.value == "auditt") && modulo.tipologianoleggio.value == "kmillimitati" && modulo.giorni.value >= 6){
        if(modulo.giorni.value == 6){
            modulo.scontopromo6.value= -(modulo.importo.value / modulo.giorni.value);
        }
        if(modulo.giorni.value == 12){
            modulo.scontopromo6.value= -(modulo.importo.value / modulo.giorni.value)*2;
        }
        if(modulo.giorni.value == 18){
            modulo.scontopromo6.value= -(modulo.importo.value / modulo.giorni.value)*3;
        }
        if(modulo.giorni.value == 24){
            modulo.scontopromo6.value= -(modulo.importo.value / modulo.giorni.value)*4;
        }
    }
    
    if(modulo.tipologiapagamento.value == "cartacredito"){
        modulo.spese.value= ((modulo.importo.value/100)*4);
        modulo.cauzione.value= 0 ;
    }
    
    if(modulo.tipologiapagamento.value == "bonificoconcauzione"){
        modulo.spese.value= ((modulo.importo.value/100)*1) ;
        modulo.cauzione.value= ((modulo.importo.value/modulo.giorni.value)*4) ;
    }
    
    if(modulo.tipologiapagamento.value == "bancomatconcauzione"){
        modulo.spese.value= ((modulo.importo.value/100)*3);
        modulo.cauzione.value= ((modulo.importo.value/modulo.giorni.value)*2) ;
    }
    
    
    
    if(modulo.luogoprelievo.value != modulo.luogorilascio.value){
        modulo.totale.value= modulo.importo.value + modulo.scontoeco.value+ modulo.scontopromo6.value+modulo.spese.value+modulo.cauzione.value+50;
    }
    else{
        
        modulo.totale.value= modulo.importo.value + modulo.scontoeco.value+ modulo.scontopromo6.value+modulo.spese.value+modulo.cauzione.value;
    }
}
