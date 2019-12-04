<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gideon</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/script-main.js"></script>
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <style>
        @import url("css/style.css");
        @import url("css/style-happy.css");
    </style>
</head>

<body onclick="startDictation()">
    <div class="wrapper">
        <form id="labnol" method="post" action="#">
            <div class="speech">
                <input type="text" name="q" id="transcript" placeholder="Speak">

                <div id="felix" class="felix inactive" >
                    <div class="eyes">
                        <div class="eye left" id="left"></div>
                        <div class="eye right" id="right"></div>
                    </div>
                </div>

            </div>
        </form>

        <input type="text" name="output" id="output">
    </div>



    <!--     
            // $dizionario = file('dizionario.txt');
            // print_r($dizionario);
            // $success = false;
            // // foreach ($dizionario as $valore) {
            // //     $user_details = explode(';', $valore);
            // //     print_r($user_details);
            // //     } -->



    <script>
        nome = "Simo"
        var openwind;
        Sentimenti=["Mi spiace ti vedo solo come un amico", "la mia anima appartiene solo a Dio mi spiace", "Mi spiace ma essendo una intelligenza artificiale non ho sentimenti", "anche io ma solo perchè sei ricco.","io no"];
        Mood_out = ["sto bene grazie, anche se è stata una giornata davvero stancante", "abbastanza bene dai, tutto sommato è stata una bella giornata", "si tira avanti, sempre la solita routine", "non mi posso lamentare ", "Oggi è davvero una giornata fantastica, mettiamoci al lavoro", "in realtà non mi sento benissimo oggi"];
        Saluti_out = ["Buongiorno ", "Buonasera ", "Ciao ", "Ma chi si rivede! ", "Buondì ", "Ehilà "];
        Cosastofacendo=["l'hh", "sto praticando dell'auto erotismo al momento"];
        var testo = "<?php echo $_POST["q"] ?>";
        console.log(testo);
        if (testo.includes("Ciao") || testo.includes("Buongiorno") || testo.includes("Buonasera") || testo.includes("Buonpomeriggio") || testo.includes("Ehilà") || testo.includes("Buondì")) {

            var r = Math.floor(Math.random() * Saluti_out.length);
            say(Saluti_out[r] + nome);

        } else if (testo.includes("spotify") || testo.includes("Spotify") || testo.includes("musica") || testo.includes("Musica")) {

            say("come desìderi " + nome + ". Ho aperto spotify");
            openwind=window.open("http://open.spotify.com");

        } else if (testo.includes("come stai") || testo.includes("tutto bene") || testo.includes("stai bene") || testo.includes("Come stai") || testo.includes("Tutto bene") || testo.includes("Stai bene") || testo.includes("Come va") || testo.includes("come va")) {

            var r = Math.floor(Math.random() * Mood_out.length);
            say(Mood_out[r]);

        } else if (testo.includes("override codice comando") || testo.includes("Override codice comando") || testo.includes("Override codice commando") || testo.includes("override codice commando") ) {

            say("Override accettato");
            testo1 = testo.split(" ");
            comando = testo1[testo1.length - 1];
            if (comando == "sh10") {
                say("cosa desìderi cercare?");
                var qee = "";
                setTimeout(function() {
                    qee = prompt("cosa desìderi cercare?");
                    openwind=window.open('https://www.shodan.io/search?query=' + qee);
                }, 5000);

                say("Protocollo sh10 accettato, ecco i risultati");


            } else if (comando == "zx45") {
                document.getElementById("felix").style.border = "3px solid red";
                document.getElementById("left").style.background = "red";
                document.getElementById("right").style.background = "red";
                say("Protocollo zx45 accettato. Questa azione comporta dei rischi, è mio dovere informarla.");
                say("sequenza di override in corso");
                setTimeout(function() {
                    while (true) {
                        console.log("Mi dispiace ora sei un po' fottuto", true)
                        window.open();

                     }
                }, 10000);

            } else {
                say("codice override sconosciuto, comando non autorizzato");
            }

        } else if (testo.includes("Che ore sono") || testo.includes("Che ora è") || testo.includes("che ore sono") || testo.includes("che ora è") || testo.includes("che ora si") || testo.includes("Che ora si")) {

            let data = new Date();
            let hh = data.getHours();
            let mm = data.getMinutes();
            let ss = data.getSeconds();
            let ora = "sono le " + hh + " e " + mm + " minuti";
            say(ora);

        } else if (testo.includes("che giorno è oggi") || testo.includes("Che giorno è oggi") || testo.includes("Qual è la data di oggi") || testo.includes("qual è la data di oggi")) {

            let data = new Date();
            let gg, mm, aaaa;
            gg = data.getDate() + "/";
            mm = data.getMonth() + 1 + "/";
            aaaa = data.getFullYear();
            say("Oggi è il " + gg + mm + aaaa);
        } else if (testo.includes("google") || testo.includes("Google")) {

            testo1 = testo.split(" ");
            indexdig = testo1.indexOf("Google");
            newarr = Array();
            let cont = 0;
            for (let i = indexdig + 1; i <= testo1.length; i++) {
                newarr[cont] = testo1[i];
                cont++;

            }
            stringacercare = newarr.join(" ");
            console.log("TCL: stringacercare", stringacercare)
            say("Lo faccio subito! ");
            openwind=window.open("http://www.google.it/search?q=" + stringacercare);
            say("ecco cos'ho trovato cercando a " + stringacercare + " su google");
        } else if (testo == "Chi sei" || testo == "cosa sei" || testo == "chi sei" || testo == "Cosa sei") {

            say("Sono una intelligenza artificiale creata per aiutarti in tutto ciò di cui hai bisogno");
        } else if(testo.includes("ti amo") || testo.includes("Ti amo")){
            var r = Math.floor(Math.random() * Sentimenti.length);
            say(Sentimenti[r]);
           
        }else if(testo.includes("Cosa stai facendo") || testo.includes("cosa stai facendo")){
            var r = Math.floor(Math.random() * Cosastofacendo.length);
            say(Cosastofacendo[r]);
           
        }else{
            say("Mi spiace non ho capito, puoi ripetere?");
        }


        function say(m) {
            document.getElementById("output").value = m;
            var msg = new SpeechSynthesisUtterance();
            var voices = window.speechSynthesis.getVoices();
            msg.voice = voices[11];
            msg.voiceURI = "it-IT";
            msg.volume = 1;
            msg.rate = 1;
            msg.pitch = 0.8;
            msg.text = m;
            msg.lang = 'it-IT';
            speechSynthesis.speak(msg);

        }
    </script>

</body>

</html>