<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    //echo nl2br("$login\n");
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    //echo nl2br("$email\n");
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    //echo nl2br("$password\n");
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

    $password = md5($password."ghjsfkld2345");

    $mysql = new mysqli('localhost', 'root', 'root', 'etalons');
    $mysql->query("INSERT INTO `useraccount` (`login`, `email`, `password`, `userFirstName`, `userLastName`, `userPersonalIDNumber`, `mobilePhoneNum`, `landlinePhoneNum`)
                                       VALUES('$login', '$email', '$password', '$firstName', '$lastName', '$pid', '$mobile', '$landline')");
    $mysql->close();

    header('Location: /etalons/login.html')
?>