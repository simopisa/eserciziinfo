<html>
    <head>
    <style>
        @import url("style.css");
    </style>
    
    </head>


</html>
<?php
$userN = $_POST['username'];
$passW = $_POST['password'];
$mail = $_POST['email'];
$tel = $_POST['telefono'];
$tot = "\n" . $userN . "|" . $passW . "|" . $mail . "|" . $tel;

$filename = "users.txt";
// $userlist = file('users.txt');
$bol=true;
foreach ($userlist as $user) {
    $user_details = explode('|', $user);
    if ($user_details[0] == $userN || $user_details[2] == $mail || $user_details[3] == $tel ) {
        echo "mail o user o telefono già utlizzato, riprova cliccando <a href='index.php'>qui</a><br>";
        $bol=false;
        
    }
}
if($bol){
    if (is_writable($filename)) {


        if (!$handle = fopen($filename, 'a')) {
            echo "Cannot open file ($filename)";
            exit;
        }
    
      
        if (fwrite($handle, $tot) === FALSE) {
            echo "Cannot write to file ($filename)";
            exit;
        }
    
        echo "registrato con successo, ora loggati <a href='index.php'>qui</a>";
    
        fclose($handle);
    } else {
        echo "The file $filename is not writable";
    }
}




?>

