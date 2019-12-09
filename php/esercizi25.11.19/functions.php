<?php
    if(isset($_GET['run'])) {
        session_destroy();
    }

    session_start();
    if(!isset($_SESSION["sessione"])){
        $array = array();
        
        $_SESSION["sessione"] = $array;
    }

    if (isset($_GET["submit"])) {
        $rtn=false;  
        
        //modifica
        foreach ($_SESSION["sessione"] as $key => $value) {
            if($_GET["evento"]==$key){
                $_SESSION["sessione"][$key] += $_GET["persone"];
                $rtn = true;
            }
        }
        
        //creazione
        if($rtn==false){
            $_SESSION["sessione"][$_GET["evento"]] = $_GET["persone"];
        }
        $persone=0;
        $max=$_SESSION["sessione"][$_GET["evento"]];
        $evento = $_GET["evento"];
        foreach ($_SESSION["sessione"] as $key => $value) {
            $persone+=$value;
            if($value>$max){
                $max=$value;
                $evento = $key;
            }

        }
        echo "<html>
        <head> <style>
        a{
            color:aliceblue;
        }
    </style></head>
        <body style='background-image: linear-gradient(90deg,   #5800b5, #4b005c); color:white; '>
        <p>Numero persone totali:".$persone."</p>
        <p>evento con più persone è:".$evento." ed ha ".$max." persone</p>
        <a href='index.php' style='color:white'>Torna</a>
        <br>  
        </body>
        </html>";
       
      
    }

    
?>