<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
//echo nl2br("$login\n");
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
//echo nl2br("$email\n");
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
//echo nl2br("$password\n");
$password2 = filter_var(trim($_POST['password2']), FILTER_SANITIZE_STRING);
//echo nl2br("$password2\n");
$firstName = filter_var(trim($_POST['userFirstName']), FILTER_SANITIZE_STRING);
//echo nl2br("$userFirstName\n");
$lastName = filter_var(trim($_POST['userLastName']), FILTER_SANITIZE_STRING);
//echo nl2br("$userLastName\n");
$pid = filter_var(trim($_POST['userPersonalIDNumber']), FILTER_SANITIZE_STRING);
//echo nl2br("$userPersonalIDNumber\n");
$mobile = filter_var(trim($_POST['mobilePhoneNum']), FILTER_SANITIZE_STRING);
//echo nl2br("$mobilePhoneNum\n");
$landline = filter_var(trim($_POST['landlinePhoneNum']), FILTER_SANITIZE_STRING);
//echo nl2br("$landlinePhoneNum\n");

if (mb_strlen($login) < 1 || mb_strlen($password) < 1 || mb_strlen($email) < 1) {
    echo "ERROR: You have to provide all of creditentials in order to log in";
    exit();
} elseif ($password != $password2) {
    echo "ERROR: Passwords must match";
    exit();
}

$password = md5($password . "ghjsfkld2345");

$mysql = new mysqli('localhost', 'root', '', 'etalons');
$mysql->query("INSERT INTO `useraccount` (`login`, `email`, `password`, `userFirstName`, `userLastName`, `userPersonalIDNumber`, `mobilePhoneNum`, `landlinePhoneNum`)
                                                                VALUES('$login', '$email', '$password', '$firstName', '$lastName', '$pid', '$mobile', '$landline')");
$mysql->close();
echo "User registered successfuly";
?>