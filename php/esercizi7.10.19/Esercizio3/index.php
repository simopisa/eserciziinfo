<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    $array1 = array();
    for ($i=0; $i < 20 ; $i++) { 
        $array1[$i]=rand(0,100);
    }
    $contpari=0;
    $contadispari=0;
    foreach ($array1 as $value) {
        if ($value%2==0) {
            $contpari++;
        }else {
            $contadispari++;
        }
    }
    echo "<h1>i numeri pari sono ", $contpari,"</h1><br>";
    echo "<h1>i numeri dispari sono ", $contadispari,"</h1>";
    ?>

</body>
</html>