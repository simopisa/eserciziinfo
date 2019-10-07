<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
    <style>
    .stile{
    background-color:yellow; 
    height:50px; width:50px; 
    text-align:center;}
    </style>
</head>
<body>
<table>
    <?php
          $array1 = array();
          for ($i=0; $i < 20 ; $i++) { 
              $array1[$i]=rand(0,100);
              
              echo "<script>console.log('" . $array1[$i] . "');</script>";
          }
          $reverse = array_reverse($array1);

          
          foreach ($reverse as $value) {
              echo "<td class='stile'> $value  </td>";
          }
    ?>
</table>
</body>
</html>