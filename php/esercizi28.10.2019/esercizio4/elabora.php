<?php
    $pal=$_POST["pal"];
    if (strrev($pal) == $pal){   
        echo "palindroma";
    } 
    else{ 
        echo "non palindroma";
    } 



?>