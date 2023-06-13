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
<div class="section section-lg pt-0">
	<div class="container">
		<!-- Title -->
		<div class="row">
			<div class="col text-center">
				<h1 class="h1 mt-5 mb-5">eTalona rediģēšana</h1>
			</div>
		</div>
		<!-- End of title-->
		<div class="row justify-content-md-center">
			<div class="col-12 col-md-6 col-lg-5 mb-5 mb-lg-0">
				<div class="card bg-primary shadow-soft border-light p-4">
					<div class="card-body">
						<a href="etalons.php" class="btn btn-primary text-danger mr-2 mb-2" type="button">
							<span class="fas fa-backspace"></span> Atpakaļ</a>
						<?php
						$mysql = new mysqli('localhost', 'root', '', 'etalons');
						$serial = filter_var(trim($_POST['entry_id']), FILTER_SANITIZE_STRING);
						//echo nl2br("$login\n");
						$sql = "SELECT * FROM `etalons` WHERE `serialN` = '$serial'";

						$result = $mysql->query($sql);

						if ($result->num_rows > 0) {

							$row = $result->fetch_assoc();

							$serial = $row['serialN'];
							$nameF = $row['holderFirstName'];
							$nameL = $row['holderLastName'];
							$PC = $row['holderPersonal_ID'];

							echo "<form method=\"post\" action=\"editEtalonsScript.php\">
							<input type=\"hidden\" name=\"serialN\" value=\"\' . $serial . \'\">
								<!-- Form -->
								<div class=\"form-group\">
								<label>eTalona numurs</label>
									<div class=\"input-group mb-4\">
										<input class=\"form-control\" name=\"num\" value\"$serial\"
										placeholder=\"$serial\" type=\"text\" aria-label=\"serial\" disabled>
									</div>
								</div>
								<!-- End of Form -->
								<!-- Form -->
								<div class=\"form-group\">
									<label>Zemāk esošie lauki nav jāievada ja jūs esat eTalona turētājs</label>
									<label>Turētāja vārds</label>
									<div class=\"input-group mb-4\">
										<div class=\"input-group-prepend\">
											<span class=\"input-group-text\"><span class=\"fas fa-user\"></span></span>
										</div>
										<input class=\"form-control\" name=\"nameF\" placeholder=\"$nameF\"
										value\"$nameF\" type=\"text\" aria-label=\"login\">
									</div>
								</div>
								<!-- End of Form -->
								<!-- Form -->
								<div class=\"form-group\">
								<label>Turētāja uzvārds</label>
									<div class=\"input-group mb-4\">
										<div class=\"input-group-prepend\">
											<span class=\"input-group-text\"><span class=\"fas fa-user\"></span></span>
										</div>
										<input class=\"form-control\" name=\"nameL\" placeholder=\"$nameL\"
										value\"$nameL\" type=\"text\" aria-label=\"login\">
									</div>
								</div>
								<!-- End of Form -->
								<!-- Form -->
								<div class=\"form-group\">
								<label>Turētāja personas kods</label>
									<div class=\"input-group mb-4\">
										<div class=\"input-group-prepend\">
											<span class=\"input-group-text\"><span class=\"fas fa-passport\"></span></span>
										</div>
										<input class=\"form-control\" name=\"PC\" placeholder=\"$PC\"
										value\"$PC\" type=\"text\" aria-label=\"login\">
									</div>
								</div>
								<button type=\"submit\" class=\"btn btn-block btn-primary\">Reģistrēt izmaiņas</button>
								<!-- End of Form -->";

						} else {
							echo "Not Found";
						}
						$mysql->close();

						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>