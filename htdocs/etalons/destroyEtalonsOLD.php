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

	<div class="section section-lg pt-0">
		<div class="container">
			<!-- Title -->
			<div class="row">
				<div class="col text-center">
					<h1 class="h1 mt-5 mb-5">eTalona dzēšana</h1>
				</div>
			</div>
			<!-- End of title-->
			<div class="row justify-content-md-center">
				<div class="col-12 col-md-6 col-lg-5 mb-5 mb-lg-0">
					<div class="card bg-primary shadow-soft border-light p-4">
						<div class="card-body">
							<?php
							$mysql = new mysqli('localhost', 'root', '', 'etalons');
							function remove($sql, $id)
							{
								mysqli_query($sql, "DELETE FROM `etalons` WHERE `id` = '$id'");
								header("Refresh:0");
							}
							function retrieveID($id, $sql)
							{
								$query = "SELECT `id` FROM `etalons` WHERE `serialN` = '$id'";
								$result = mysqli_query($sql, $query);
								$row = mysqli_fetch_row($result);
								return $row[0];
							}
							if (isset($_POST['proceed2'])) {
								$removable = $_POST['entryId'];
								$id = retrieveID($removable, $mysql);
								remove($mysql, $id);
								echo "as it never been there";
								die();
							}
							var_dump($_POST);

							$serial = filter_var(trim($_POST['entry_id']), FILTER_SANITIZE_STRING);
							//echo nl2br("$login\n");
							$sql = "SELECT * FROM `etalons` WHERE `serialN` = '$serial'";

							$result = $mysql->query($sql);

							$row = $result->fetch_assoc();

							$serial = $row['serialN'];
							var_dump($serial);
							?>
							<form method="POST">

								<!-- Form -->
								<div class="form-group">
									<label>eTalona numurs</label>
									<div class="input-group mb-4">
										<input class="form-control" name="num" value="<?php echo $serial; ?>" type="text"
											aria-label="serial" disabled>
									</div>
								</div>


								<div class="form-group">
									<label>do you...</label><br>
									<label>do you acknowledge that you will be unable to restore your wonderful creation
										after it'll cease to exist?</label></br>
									<label>if so, press that button to terminate existing of it once and forever</label>
									<button type="submit" name="proceed"
										class="btn btn-block text-danger">Proceed</button><br>
									<a href="etalons.php" class="btn btn-block text-danger mr-2 mb-2" type="button">NO!</a>
									<input type="hidden" name="entryId" value="<?php echo $serial; ?>">
									<input type="hidden" name="proceed2" value="1">
									<!-- End of Form -->
							</form>
							<? ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php else:
	header('Location: /etalons/login.php');
?>
<?php endif; ?>
</body>

</html>