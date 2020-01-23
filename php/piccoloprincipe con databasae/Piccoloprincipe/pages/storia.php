<?php
session_start();
if (isset($_SESSION["sessione"]) && $_SESSION["sessione"] == true) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Il piccolo principe</title>

  <style>
    @import url("../css/main-style.css");
  </style>
</head>

<body>
  <script>
    function createstar(type, quantity) {
      for (let i = 0; i < quantity; i++) {
        var star = document.createElement("div");
        star.classList.add('star', 'type-' + type);
        star.style.left = randomnumber(1, 99) + "%";
        star.style.bottom = randomnumber(1, 99) + "%";
        star.style.animationDuration = randomnumber(50, 100) + "s";

        document.body.appendChild(star);
      }

      function randomnumber(min, max) {
        return Math.floor(Math.random() * max) + min;
      }


    }
    createstar(1, 100);
    createstar(2, 85);
    createstar(3, 70);
  </script>
  <div class="container" id="container" name="container">
    <br><br>
    <div class="header">
      <h1>Il piccolo principe</h1>
    </div>
    <br><br>
   
        <br>
        <br>
        <div class="menu">
        <button onclick="window.location.href='../index.php'" id="submit">Home</button>
            <button onclick="window.location.href='#'" id="submit">Storia</button>
        </div>
        <br><br>
    <div class="wrapper">
      <div class="storia" id="storia">
          <h3>
            STORIA
          </h3>
          <p>
          Il piccolo principe (Le Petit Prince) è l'opera più conosciuta di Antoine de Saint-Exupéry. Pubblicato il 6 aprile 1943 da Reynal & Hitchcock in inglese, e qualche giorno dopo in francese, è un racconto molto poetico che, nella forma di un'opera letteraria per ragazzi, affronta temi come il senso della vita e il significato dell'amore e dell'amicizia. Ciascun capitolo del libro racconta di un diverso incontro che il protagonista fa con diversi personaggi e su diversi pianeti e ognuno di questi bizzarri personaggi lascia il piccolo principe stupito e sconcertato dalla stranezza delle "persone adulte". Ad ogni modo, ognuno di questi incontri può essere identificato come un'allegoria o uno stereotipo della società moderna e contemporanea. È fra le opere letterarie più celebri del XX secolo e tra le più vendute della storia: è stato tradotto in più di 220 lingue e dialetti e stampato in oltre 134 milioni di copie in tutto il mondo. Le lingue più conosciute dei cinque continenti sono ovviamente state le prime a vederlo tradotto ma successivamente, si è arrivati a tradurlo nelle lingue più disparate: dalla lingua corsa, al bretone, al milanese, al friulano o "marilenghe" (lingua neolatina del Friuli), dall'aragonese in Spagna all'esperanto e il guarani. Nel 2005 è stato tradotto in toba, una lingua del nord dell'Argentina, con il nome di So Shiyaxauolec Nta'a e sembra essere il primo libro ad avere una traduzione nella suddetta lingua dopo il Nuovo Testamento.
In un certo senso, costituisce una sorta di educazione sentimentale. L'opera, sia nella sua versione originaria che nelle varie traduzioni, è illustrata da una decina di acquerelli dello stesso Saint-Exupéry, disegni[1] semplici e un po' naïf che sono celebri quanto il racconto.
Gli stessi disegni sono stati utilizzati per creare le copertine del libro. Ad oggi ne sono state stampate ben 657.789 differenti[senza fonte] rielaborazioni.
Il racconto è dedicato al bambino che fu Léon Werth, amico dell'autore, il quale qualche mese più tardi scrisse d'essersi pentito e che avrebbe dovuto dedicarlo alla moglie Consuelo Suncín (1902-1979)[senza fonte]. L'autore lo scrisse negli Stati Uniti, mentre abitava nella "Bevin House" di Asharoken, Long Island, NY.

          </p>
          <h3>
              TRAMA
          </h3>
          <p>
          Un pilota di aerei, precipitato nel deserto del Sahara, incontra un bambino, che gli chiese "Mi disegni una pecora?". Stupito per la situazione in cui si trova, il pilota non capisce il perché di questa ed altre richieste strane del bambino. Questo, poco per volta, dice di essere il principe di un lontano asteroide, sul quale abita solo lui, tre vulcani di cui uno inattivo e una piccola rosa, molto vanitosa, che lui cura e ama.
Il piccolo principe racconta che, nel vagare per lo spazio, ha conosciuto diversi personaggi strani, che gli hanno insegnato qualche cosa. La cura per la sua rosa lo ha fatto soffrire molto, perché spesso questa si è mostrata scorbutica. Ora però che è lontano, il piccolo principe scopre piano piano che le ha voluto bene, e che anche lei gliene voleva. Purtroppo però non si capivano. Il piccolo principe, proveniente dall'asteroide B612, aveva bisogno della pecora per farle divorare gli arbusti di baobab prima che crescessero e soffocassero il suo pianeta.
Visitando ciascun pianeta dall'asteroide 325 al 330 il piccolo principe se ne va con l'idea che i grandi siano ben strani, e con un piccolo insegnamento per sé:
un vecchio re solitario, che si crede onnipotente, cerca di farlo suo ministro, dando ordini solo in modo da essere sempre ascoltato;
un vanitoso chiede solo di essere ammirato e applaudito, senza ragione;
un ubriacone beve per dimenticare la vergogna di bere;
un uomo d'affari che passa i giorni a contare le stelle, credendo che siano sue.
un lampionaio deve accendere e spegnere il lampione del suo pianeta ogni minuto, perché il pianeta gira a quella velocità; per quest'uomo il piccolo Principe prova un po' di ammirazione perché è l'unico che non pensa solo a se stesso;
un geografo sta seduto alla sua scrivania ma non ha idea di come sia fatto il suo pianeta, perché non dispone di esploratori da mandare ad analizzare il terreno e riportare i dati.
Questi consiglia al piccolo principe di visitare la Terra, sulla quale finalmente il nostro protagonista giunge, con grande stupore per le dimensioni e per la quantità di persone. Il suo primo incontro, nel deserto, avviene con un serpente, simbolo della morte, che però è vista in senso positivo, come l'inizio di un viaggio. Proseguendo con il suo viaggio, egli incontra un piccolo fiore, delle alte cime, ed infine un giardino pieno di rose fiorite. La sua rosa aveva raccontato al piccolo principe di essere l'unica di quella specie in tutto l'universo, e quindi egli rimane molto deluso da questa scoperta. Ma non fa in tempo a pensarci molto, che compare una piccola volpe, che gli chiede di essere addomesticata e di essere sua amica. La volpe parla a lungo con il principe dell'amicizia.
Il principe incontra poi un indaffarato controllore, che non sa giustificare la ragione per cui la gente va avanti e indietro sempre di fretta; l'ultimo interessante incontro è con un venditore di pillole che calmano la sete, facendo risparmiare un sacco di tempo. Dopo aver ascoltato tutto il racconto del piccolo principe, il pilota non è riuscito a riparare l'aereo e ha terminato la scorta d'acqua . Allora vanno alla ricerca di un pozzo.
Dopo una giornata di cammino, i due si fermano stanchi su una duna ad ammirare il deserto nella notte. Con in braccio il bambino addormentato, il pilota cammina tutta la notte, e finalmente all'alba scopre il pozzo. "Un po' d'acqua può far bene anche al cuore" commenta il piccolo principe, e bevono entrambi con gioia. Il pilota torna al lavoro al suo apparecchio, e la sera seguente ritrova il piccolo principe ad attenderlo su un muretto accanto al pozzo, mentre parla con il serpente che aveva incontrato. Il piccolo principe tornava lì, dopo un anno dall'arrivo sulla terra, per tornare al suo pianeta.
Il fanciullo così, forse, ritorna dal suo fiore, con la pecora, la scatola e la museruola. Lascia in regalo al pilota il suo sorriso, il suo messaggio, e un mare di stelle da guardare, offrendogli anche l'immagine confortante che lassù, da qualche parte, il piccolo principe si prenderà cura della sua rosa.

          </p>
      </div>
      <br>
      
      <br>
      <br>

     
    </div>
  </div>



  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  


</body>

</html>


<?php
}else{
    header("location: ../index.php");
}
?>