<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
   
    <title>Document</title>
</head>
<body>
    <?php
    $array1 = array(2,4,1,3);
    sort($array1);
    foreach ($array1 as $value) {
        echo $value;
    }

    ?>
</body>
</html>