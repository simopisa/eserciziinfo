<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
         
         $alunni=array(
                array("cognome" => "pisoni", "nome" => "simone","classe" => "5inB"),
                array("cognome" => "carducci", "nome" => "giacomo","classe" => "4inA"),
                array("cognome" => "1", "nome" => "1","classe" => "4inA"),
                array("cognome" => "2", "nome" => "2","classe" => "5inB"),
                array("cognome" => "3", "nome" => "3","classe" => "6inA"),
                array("cognome" => "4", "nome" => "4","classe" => "5inB"),
                array("cognome" => "5", "nome" => "5","classe" => "6"),
                array("cognome" => "6", "nome" => "6","classe" => "9"),
                array("cognome" => "7", "nome" => "7","classe" => "2"),
                array("cognome" => "8", "nome" => "8","classe" => "5"),
                array("cognome" => "9", "nome" => "9","classe" => "4"),
         );
            
         foreach ($alunni as $value) {
             foreach ($value as $key => $value1) {
                 if (strcmp($value1["classe"],"5inB")==0) {
                     echo $value1;
                 }
                
             }
         }


    ?>
</body>
</html>