<?php
$userN = $_POST['username'];
$passW = $_POST['password'];
$userlist = file('users.txt');

$email = "";
$company = "";

$success = false;
foreach ($userlist as $user) {
    $user_details = explode('|', $user);
    if ($user_details[0] == $userN && $user_details[1] == $passW) {
        $success = true;
        $email = $user_details[2];
        $tel = $user_details[3];
        
        
    }
}

if ($success) {
    echo "<br> benvenuto $userN ti sei loggato. La tua mail è : $email. Il tuo numero di telefono è: $tel<br>";
    setcookie("username", $userN);
    setcookie("password", $passW);
} else {
    echo "password errata, riprova <br><a href='index.html'>riprova</a>";
    
}
?>