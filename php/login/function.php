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
        $company = $user_details[3];
        break;
    }
}

if ($success) {
    echo "<br> benvenuto $userN ti sei loggato. <br>";
} else {
    echo "<script>alert('username o password errarara, riprova');</script>";
    header("Location: index.html");
}
?>