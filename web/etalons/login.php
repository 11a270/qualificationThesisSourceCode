<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    //echo $login;
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    //echo $password;

    if(mb_strlen($login) < 1 || mb_strlen($password) < 1) {
        echo "ERROR: You must provide all of creditentials in order to log in";
        exit();
    }

    $password = md5($password."ghjsfkld2345");

    $mysql = new mysqli('localhost', 'root', 'root', 'etalons');
    $result = $mysql->query("SELECT * FROM `useraccount` WHERE `login` = '$login' AND `password` = '$password'");
    $user = $result->fetch_assoc();
    if(count($user) == 0) {
        $mysql->close();
        echo "USER FOUNDN'T!!!";
        exit();
    }

    setcookie('user', $user['login'], time() + 3600, "/");

    //prints all of the creditentials from db
    //print_r($user);
    //exit();

    $mysql->close();

    header('Location: /etalons/index.php')
?>