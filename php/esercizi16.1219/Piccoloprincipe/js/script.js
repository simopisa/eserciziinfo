$(document).ready(function () {

    var frasi = ["È una follia odiare tutte le rose perché una spina ti ha punto, abbandonare tutti i sogni perché uno di loro non si è realizzato, rinunciare a tutti i tentativi perché uno è fallito. È una follia condannare tutte le amicizie perché una ti ha tradito, non credere in nessun amore solo perché uno di loro è stato infedele, buttate via tutte le possibilità di essere felici solo perché qualcosa non è andato per il verso giusto. Ci sarà sempre un'altra opportunità, un'altra amicizia, un altro amore, una nuova forza. Per ogni fine c'è un nuovo inizio.",
        "Si devono pur sopportare dei bruchi se si vogliono vedere le farfalle... Dicono siano così belle!",
        "Se tu vuoi bene ad un fiore che sta in una stella, è dolce, la notte, guardare il cielo. Tutte le stelle sono fiorite.",
        "Amare non è guardarsi a vicenda, ma guardare nella stessa direzione!",
        "Gli uomini coltivano 5000 rose nello stesso giardino... e non trovano quello che cercano... e tuttavia quello che cercano potrebbe essere trovato in una sola rosa o in un po' d'acqua. Ma gli occhi sono ciechi. Bisogna cercare col cuore!",
        "Tutti i grandi sono stati piccoli, ma pochi di essi se ne ricordano.",
    ];

    var random = Math.floor(Math.random() * Math.floor(frasi.length));
    console.log("TCL: generafrasi -> random", random)
    var frase = frasi[random];
    console.log("TCL: generafrasi -> frase", frase)
    document.getElementById("frasi").innerHTML = frase;


});
function controlla(){
    if (document.getElementById("username").value!="") {
        if (document.getElementById("psw").value!="") {
            if (document.getElementById("psw").value.length>=5) {
                rtn=true;
            } else {
                rtn=false;
                document.getElementById("psw").style.border="1px solid red";
            }
        }else{
            rtn=false;
            document.getElementById("psw").style.border="1px solid red";
        }
    }else{
        rtn=false;
        document.getElementById("username").style.border="1px solid red";
    }
    return rtn;
}