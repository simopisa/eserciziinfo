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
    
      
        
        $docente=array("Pietro"=>"Informatica","Giuseppe"=>"Chimica","Mauro"=>"Cat","Anna"=>"Analisi");
        my_ksort($docente);
        echo "<p> array stampato per chiave</p>";
        foreach($docente as $key=>$value)
        {
        echo "Nome=" . $key . ", Ramo d'insegnamento=" . $value;
        echo "<br>";
        }
        unset($value);
     
        echo "<p> array stampato per valore</p>";
        my_sort($docente); 
        foreach ($docente as $key => $value) {
            echo "Nome=" . $key . ", Ramo d'insegnamento=" . $value."<br>";
        }

    function my_ksort(&$array1)
        {
        $keys=array_keys($array1);
        my_sort($keys);
        foreach($keys as $key)
            {
            $val=$array1[$key];
            unset($array1[$key]);
            $array1[$key]=$val;
            }
        }
    function my_sort(&$array){
        for($j = 0; $j < count($array); $j ++) {
            for($i = 0; $i < count($array)-1; $i ++){
        
                if($array[$i] > $array[$i+1]) {
                    $temp = $array[$i+1];
                    $array[$i+1]=$array[$i];
                    $array[$i]=$temp;
                }       
            }
        }
    }
    ?>
</body>
</html>
