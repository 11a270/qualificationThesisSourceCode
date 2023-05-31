<?php
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    //echo $name;
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    //echo $email;
    $msg = filter_var(trim($_POST['msg']), FILTER_SANITIZE_STRING);
    //echo $msg;
    
    $mysql = new mysqli('localhost', 'root', 'root', 'etalons');
    $mysql->query("insert into `msg` (`name`, `email`, `text`) values('$name', '$email', '$msg')");
    $mysql->close;

    header('Location: /contact.html')
?>