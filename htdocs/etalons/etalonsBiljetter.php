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
<?php if ($_COOKIE['user'] != ''): ?>
<body>
	<div class="section section-xl pt-0">
		<div class="container-xl">
			<!-- Title -->
			<div class="row">
				<div class="col text-center">
					<h1 class="h1 mt-5 mb-5">eTalonā <?php
						$serial = filter_var(trim($_POST['entry_id']), FILTER_SANITIZE_STRING);
						echo $serial;
						?> saraksts</h1>
					<a href="etalons.php" class="btn btn-primary text-danger mr-2 mb-2" type="button">
						<span class="fas fa-backspace"></span> Atpakaļ</a>
				</div>
			</div>
			<div class="row justify-content-md-center p-6 ">
				<table class="table shadow-soft rounded p-5">
					<thead>
						<tr>
							<th class="border-0" scope="col">Biļetes id</th>
							<th class="border-0" scope="col">Biļetes veids</th>
							<th class="border-0" scope="col">Pirkšanas datums</th>
							<th class="border-0" scope="col">Biļetes derīga līdz</th>
						</tr>
						<?php
						$mysql = new mysqli('localhost', 'root', '', 'etalons');
						function retrieveTicketName($biljett, $sql)
						{
							$query = "SELECT `visibleName` FROM `tickettype` WHERE `name` = '$biljett'";
							$result = mysqli_query($sql, $query);
							$row = mysqli_fetch_row($result);
							return $row[0];
						}
						function retrieveID($id, $sql)
						{
							$query = "SELECT `id` FROM `etalons` WHERE `serialN` = '$id'";
							$result = mysqli_query($sql, $query);
							$row = mysqli_fetch_row($result);
							return $row[0];
						}
						$id = retrieveID($serial, $mysql);
						$result = $mysql->query("SELECT `id`, `type`, `addedOn`, `expiresOn` FROM `ticket` WHERE `addedTo` = '$id'");
						

						while ($row = $result->fetch_assoc()) {
							$entryId = $row['id'];
							echo '<tr>
	<td>' . $row['id'] . '</td>
	<td>' . retrieveTicketName($row['type'], $mysql) . '</td>
	<td>' . $row['addedOn'] . '</td>
	<td>' . $row['expiresOn'] . '</td>
</tr>';
						}


						?>
						</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php else:
  header('Location: /etalons/login.php');
?>
<?php endif;?>
</body>

</html>