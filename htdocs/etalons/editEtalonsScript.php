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
<?php
$serial = filter_var(trim($_POST["serialN"]), FILTER_SANITIZE_STRING);
$nameF = filter_var(trim($_POST["nameF"]), FILTER_SANITIZE_STRING);
$nameL = filter_var(trim($_POST["nameL"]), FILTER_SANITIZE_STRING);
$PC = filter_var(trim($_POST["PC"]), FILTER_SANITIZE_STRING);

var_dump($_POST);

$mysql = new mysqli('localhost', 'root', '', 'etalons');

$query = "UPDATE `etalons` SET `holderFirstName` = '$nameF', `holderLastName` = '$nameL', `holderPersonal_ID` = '$PC' WHERE `serialN` = '$serial'";

$mysql->query($query);
header('refresh:5;url=/etalons/etalons.php');
echo "<h1>Informācija par šo eTalonu tika veiksmīgi atjaunota!</h1><br>
<a>Mēs atgriezīsim jūs uz eTalonu sarakstu apmēram pēc 5 sekundēm.</a>";

$mysql->close();

?>