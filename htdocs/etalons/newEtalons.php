<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>E-TALONS</title>
	<!-- Open Graph data -->
	<meta property="fb:app_id" content="214738555737136">
	<meta property="og:title" content="Neumorphism UI by Themesberg" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="https://demo.themesberg.com/neumorphism-ui/" />
	<meta property="og:image"
		content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/neumorphism-ui/neumorphism-thumbnail.jpg" />
	<meta property="og:description"
		content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages." />
	<meta property="og:site_name" content="Themesberg" />

	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="120x120" href="./assets/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="./assets/img/favicon/site.webmanifest">
	<link rel="mask-icon" href="./assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">

	<!-- Fontawesome -->
	<link type="text/css" href="./vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

	<!-- Pixel CSS -->
	<link type="text/css" href="./css/neumorphism.css" rel="stylesheet">
</head>

<body>
<div id="outer" class="container d-flex align-items-center justify-content-center" style="height: 250px;">
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
        echo "<h1>Tāds eTalons jau eksistē sistēmā.</h1><br>
        <a>Pārbaudiet vai jūs ievadat korekto numuru.
        <br>Mēs atgriezīsim jūs pie eTalonu pievienošanas apmēram pēc 10 sekundēm.</br></a>";
        $mysql->close();
        die();
    } else {  
        $query = "INSERT INTO `etalons` (`serialN`, `holderFirstName`, `holderLastName`, `holderPersonal_ID`,  `userCardBelongsTo`) VALUES ('$entry', '$nameF', '$nameL', '$PC', '$uid')";
        mysqli_query($mysql, $query);
        header('refresh:5;url=/etalons/etalons.php');
        echo "<h1>Jauns eTalons tika veiksmīgi pievienots!</h1><br>
        <a>Mēs atgriezīsim jūs uz iepriekšējo lapu apmēram pēc 5 sekundēm.</a>";
        $mysql->close();
        die();
        }
} else {
    header('refresh:10;url=/etalons/addEtalons.php');
    echo "<h1>Dotais numurs nav derīgs.</h1><br>
    <a>Ņemiet vērā ka dzeltenajos eTalonos '01-' (pirmie trīs simboli) nav jāievada.
    <br>Mēs atgriezīsim jūs pie eTalonu pievienošanas apmēram pēc 10 sekundēm.</br></a>";
    $mysql->close();
    die();
}
}
?>
    </div>
</body>