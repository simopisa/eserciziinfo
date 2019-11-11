<?php
    $numero1=$_POST["numero1"];
    $numero2=$_POST["numero2"];
    $numero3=$_POST["numero3"];
    $delta=pow($numero2,2)-4*$numero1*$numero3;
    
    if ($delta<0) {
        echo "impossibile";
    }else{
        $radice1=(-$numero2+sqrt($delta))/2*$numero1;
        $radice2=(-$numero2-sqrt($delta))/2*$numero1;
        echo "x1=".$radice1." x2=".$radice2;
    }
    
   
    

?>