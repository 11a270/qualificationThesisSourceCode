<?php
$mysql = new mysqli('localhost', 'root', '', 'etalons');
function checkTicketExists($etalonsSerial, $sql) {
    $query = "SELECT COUNT(*) FROM `etalons` WHERE `serialN` = '$etalonsSerial'";
    $result = mysqli_query($sql, $query);
    $row = mysqli_fetch_array($result);
    $count = $row[0];
    
    return $count > 0;
}
function addTicketToDB($etalonsSerial, /*$userID,*/ $sql) {
    $query = "INSERT INTO `etalons` (`serialN`, /*`userCardBelongsTo`*/) VALUES ('$etalonsSerial', /*$userID*/)";
    mysqli_query($sql, $query);
}

/*function retrieveUserID($username, $sql){
    $query = "SELECT `userid` FROM `useraccount` WHERE `login` = $username";
    $result = mysqli_query($sql, $query);
    echo $result;
    //echo $_COOKIE['user'];
    $row = mysqli_fetch_array($result);
    //echo $row;
    return $row['id'];
}*/
    if ($_COOKIE['user'] == ''){
        header('refresh:10;url=/etalons/login.html');
        echo "<h1>KĻŪDA!</h1>
        <a>Jums būs jāielogojas sistēmā vēlreiz.
        <br>Mēs pārvirzīsim jūs uz ieiešanas sistēmā lapu apmēram pēc 10 sekundēm.</br>
        </a>";
    } /*else {
        $loggedUser = $_COOKIE['user'];
        $uid = retrieveUserID($loggedUser, $mysql);
    }*/
    $entry = filter_var(trim($_POST['num']), FILTER_SANITIZE_STRING);

    if(mb_strlen($entry) != 15) {
        header('refresh:10;url=/etalons/newEtalons.html');
        echo "<h1>Dotais numurs nav derīgs.</h1>
        <a>Ņemiet vērā ka dzeltenajos eTalonos '01-' (pirmie trīs simboli) nav jāievada.
        <br>Mēs atgriezīsim jūs pie eTalonu pievienošanas apmēram pēc 10 sekundēm.</br></a>";
    }
    if(checkTicketExists($entry, $mysql) || mb_strlen($entry) != 15) {
        header('refresh:10;url=/etalons/newEtalons.html');
        echo "<h1>Tāds eTalons jau eksistē sistēmā.</h1>
        <a>Pārbaudiet vai jūs ievadat korekto numuru.
        <br>Mēs atgriezīsim jūs pie eTalonu pievienošanas apmēram pēc 10 sekundēm.</br>
        </a>";
    } else {
        addTicketToDB($entry, /*$uid,*/ $mysql);
        header('refresh:5;url=/etalons/newEtalons.html');
        echo "<h1>Jauns eTalons tika veiksmīgi pievienots!</h1>
        <a>Mēs atgriezīsim jūs uz iepriekšējo lapu apmēram pēc 5 sekundēm.</a>";
    }
    

$mysql->close();
?>