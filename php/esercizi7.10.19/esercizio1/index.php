<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>esercizio1</title>
    <style>
    table {border: 1px solid gray; border-collapse: collapse;}
    tr, td {border: 1px solid gray; border-collapse: collapse; padding: 5px; text-align: center;}
    table.stile td {height: 20px; width: 20px;}
    </style>
</head>
<body>
    <?php
    
    echo '<table class="stile">';
    for ($i=0; $i<10; $i++) {
        echo '<tr>';
        for ($j=1; $j<=10; $j++) {
            
            if (($i*10+$j)!=2 &&($i*10+$j)!=3 && ($i*10+$j)!=5 && ($i*10+$j)!=7 ) {
                
                if (($i*10+$j)%2==0 ||($i*10+$j)%3==0 || ($i*10+$j)%5==0 || ($i*10+$j)%7==0) {
                    echo '<td>' . "X" . '</td>';

                }else {
                    echo '<td>' . ($i*10+$j) . '</td>';
                }
            }else {
                echo '<td>' . ($i*10+$j) . '</td>';
            }
            
        }
    
        echo '</tr>';
    }
    echo '</table>';
  

    ?>
</body>
</html>