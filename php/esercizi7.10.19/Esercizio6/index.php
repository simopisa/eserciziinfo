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
            
            echo "<script>console.log('" . $array1[$i] . "');</script>";
        }
        $pari = array();
        $dispari = array();
        $contpari=0;
        $contdispari=0;

        for ($i=0; $i < 20; $i++) { 
            if($array1[$i]%2==0){
                $pari[$contpari]=$array1[$i];
                $contpari++;

            }else{
                $dispari[$contdispari]=$array1[$i];
                $contdispari++;
            }


        }
        foreach ($pari as $value) {
            echo "<h4>+".$value."+</h4>";
            
        }
        echo "<br>";
        foreach ($dispari as $value) {
            echo "<h4> -".$value."-</h4>";
            

        }


    ?>
    
</body>
</html>