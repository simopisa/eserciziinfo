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
    header("location: pagine_interne/user.php");
    setcookie("username", $userN);
    setcookie("password", $passW);
    setcookie("verifica",true);
} else {
    echo "password errata, riprova <br><a href='index.php'>riprova</a>";
    
}
?>