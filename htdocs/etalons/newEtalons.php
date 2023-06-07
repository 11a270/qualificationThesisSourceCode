<?php
$mysql = new mysqli('localhost', 'root', '', 'etalons');
function checkTicketExists($etalonsSerial, $sql) {
    $query = "SELECT COUNT(*) FROM `etalons` WHERE `serialN` = '$etalonsSerial'";
    $result = mysqli_query($sql, $query);
    $row = mysqli_fetch_array($result);
    $count = $row[0];
    
    return $count > 0;
}
function retrieveUserID($username, $sql){
    $query = "SELECT `userid` FROM `useraccount` WHERE `login` = '$username'";
    $result = mysqli_query($sql, $query);
    $row = mysqli_fetch_row($result);
    return $row[0];
}
if ($_COOKIE['user'] == ''){
    header('refresh:10;url=/etalons/login.html');
    echo "<h1>KĻŪDA!</h1>
    <a>Jums būs jāielogojas sistēmā vēlreiz.
    <br>Mēs pārvirzīsim jūs uz ieiešanas sistēmā lapu apmēram pēc 10 sekundēm.</br>
    </a>";
    die();
} else {
$loggedUser = $_COOKIE['user'];
$uid = retrieveUserID($loggedUser, $mysql);
$entry = filter_var(trim($_POST['num']), FILTER_SANITIZE_STRING);
$nameF = filter_var(trim($_POST['nameF']), FILTER_SANITIZE_STRING);
$nameL = filter_var(trim($_POST['nameL']), FILTER_SANITIZE_STRING);
$PC = filter_var(trim($_POST['PC']), FILTER_SANITIZE_STRING);

if(mb_strlen($entry) == 10 || mb_strlen($entry) == 15) {
    if(checkTicketExists($entry, $mysql)) {
        header('refresh:10;url=/etalons/addEtalons.php');
        echo "<h1>Tāds eTalons jau eksistē sistēmā.</h1>
        <a>Pārbaudiet vai jūs ievadat korekto numuru.
        <br>Mēs atgriezīsim jūs pie eTalonu pievienošanas apmēram pēc 10 sekundēm.</br></a>";
        $mysql->close();
        die();
    } else {  
        $query = "INSERT INTO `etalons` (`serialN`, `holderFirstName`, `holderLastName`, `holderPersonal_ID`,  `userCardBelongsTo`) VALUES ('$entry', '$nameF', '$nameL', '$PC', '$uid')";
        mysqli_query($mysql, $query);
        header('refresh:5;url=/etalons/etalons.php');
        echo "<h1>Jauns eTalons tika veiksmīgi pievienots!</h1>
        <a>Mēs atgriezīsim jūs uz iepriekšējo lapu apmēram pēc 5 sekundēm.</a>";
        $mysql->close();
        die();
        }
} else {
    header('refresh:10;url=/etalons/addEtalons.php');
    echo "<h1>Dotais numurs nav derīgs.</h1>
    <a>Ņemiet vērā ka dzeltenajos eTalonos '01-' (pirmie trīs simboli) nav jāievada.
    <br>Mēs atgriezīsim jūs pie eTalonu pievienošanas apmēram pēc 10 sekundēm.</br></a>";
    $mysql->close();
    die();
}
}
?>