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
					<h1 class="h1 mt-5 mb-5">Jūsu eTalonu saraksts</h1>
					<a href="addEtalons.php" class="btn btn-primary text-success mr-2 mb-2" type="button">
						<span class="fas fa-plus-circle"></span> Pievienot jaunu eTalonu</a>
					<a href="index.php" class="btn btn-primary text-danger mr-2 mb-2" type="button">
						<span class="fas fa-backspace"></span> Atpakaļ</a>
				</div>
			</div>
			<div class="row justify-content-md-center p-6 ">
				<table class="table shadow-soft rounded p-5">
					<thead>
						<tr>
							<th class="border-0" scope="col">id</th>
							<th class="border-0" scope="col">Turētāja vārds</th>
							<th class="border-0" scope="col">Turētāja uzvārds</th>
							<th class="border-0" scope="col">Turētāja personas kods</th>
							<th class="border-0" scope="col">Darbības</th>
						</tr>
						<?php
						session_start();
						$mysql = new mysqli('localhost', 'root', '', 'etalons');
						function retrieveUserID($username, $sql)
						{
							$query = "SELECT `userid` FROM `useraccount` WHERE `login` = '$username'";
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
						function edit()
						{
							echo "no edit... yet";
						}
						function top()
						{

						}
						function block()
						{
							echo "CONGRATS!!! YOU'VE BLOCKED THAT eTalons!!!";
						}
						function remove($sql, $id)
						{

							mysqli_query($sql, "DELETE FROM `etalons` WHERE `serialN` = '$id'");
							header("Refresh:0");
						}
						$loggedUser = $_COOKIE['user'];
						$uid = retrieveUserID($loggedUser, $mysql);

						$result = $mysql->query("SELECT `serialN`, `holderFirstName`, `holderLastName`, `holderPersonal_ID` FROM `etalons` WHERE `userCardBelongsTo` = '$uid'");
						if (array_key_exists('tablebtnEDIT', $_POST)) {
							edit();
						} else if (array_key_exists('tablebtnBLOCK', $_POST)) {
							if ($_SESSION['flag'] != 1) {
								if ($_SESSION['flag'] != 0) {
									$_SESSION['flag'] = 0;
								}
								echo "<a>click one more time to block it (not working yet)</a>";
								$_SESSION['flag'] = $_SESSION['flag'] + 1;
							} elseif ($_SESSION['flag'] == 1) {
								block();
								$_SESSION['flag'] = 0;
							}
						} else if (array_key_exists('tablebtnREMOVE', $_POST)) {
							if ($_SESSION['flag'] == 0) {
								echo "<a>do you...</a><br>
									  <a>do you acknowledge that you will be unable to restore your wonderful creation after it'll cease to exist?</a></br>
									  <a>if so, press that button to terminate existing of it once and forever</a>";
								$_SESSION['flag']++;
							} elseif ($_SESSION['flag'] == 1) {
								$removable = $_POST['entry_id'];
								
								
								remove($mysql, retrieveID($removable, $mysql));
								$_SESSION['flag'] = 0;
								echo "as it never been there";
							}
							// $query = $mysql->query("SELECT `id` FROM `etalons`");
							// $serialN = $query->fetch_assoc();
							// mysqli_query($mysql, "DELETE FROM `etalons` WHERE `serialN` = '$serialN'");
							// echo "as it never been there";
						}


						while ($row = $result->fetch_assoc()) {
							$entryId = $row['serialN'];
							echo '<tr>
	<td>' . $row['serialN'] . '</td>
	<td>' . $row['holderFirstName'] . '</td>
	<td>' . $row['holderLastName'] . '</td>
	<td>' . $row['holderPersonal_ID'] . '</td>
	<td>
	<form action=\'etalonsBiljetter.php\' method=\'post\' style="display: inline;">
		<input type="hidden" name="entry_id" value="' . $row['serialN'] . '">
		<input type="submit" name="tablebtnEDIT" class="btn btn-primary text-secondary mr-2 mb-2" value="Apskatīt saturu" />
	</form>
	<form action=\'editEtalons.php\' method=\'post\' style="display: inline;">
		<input type="hidden" name="entry_id" value="' . $row['serialN'] . '">
		<input type="submit" name="tablebtnEDIT" class="btn btn-primary text-success mr-2 mb-2" value="Rediģēt" />
	</form>
	<form method="post" action=\'biljett.php\' style="display: inline;">
		<input type="submit" name="tablebtnTOP" class="btn btn-primary text-success mr-2 mb-2" value="Papildināt" />
		<input type="hidden" name="entry_id" value="' . $row['serialN'] . '">
	</form>
	<form method="post" action=\'destroyEtalons.php\' style="display: inline;">
		<input type="submit" name="tablebtnREMOVE" class="btn btn-primary text-danger mr-2 mb-2" value="Dzēst" />
		<input type="hidden" name="entry_id" value="' . $row['serialN'] . '">
	</form>
	</td>
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