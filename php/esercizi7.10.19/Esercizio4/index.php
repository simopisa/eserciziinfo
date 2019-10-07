<!DOCTYPE html>
<html lang="en">
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
        $somma=0;
        foreach ($array1 as $value) {
            if($value%2==0){
                $somma=$somma+$value;
            }
            echo "<script>console.log('" . $value . "');</script>";

        }
        echo "<h1 style='color:red;'>la somma è " ,$somma, "</h1>";
        
    ?>
</body>
</html>