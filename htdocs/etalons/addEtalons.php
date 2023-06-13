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
<?php if ($_COOKIE['user'] != ''): ?>
	<!--<form method="POST" action="newEtalons.php">
	<h1>eTalona reģistrācija</h1>
	<a>ievadiet eTalona unikālo 10 vai 15 ciparu garu ID numuru no tā aizmugures</a>
	<br><a href="/etalons/etalons.php">atpakaļ</a>
	<br><img src="assets/etalons1.png" height="150">
	<img src="assets/etalons2.png" height="150">
	<img src="assets/etalons3.jpg" height="150"></br>
	<a>Lūdzam ņemt vērā ka dzeltenajos eTalonos jāievada cipari pēc '01-'</a>
	<p>eTalona numurs<br><input type="text" name="num" size="43">
	<p>Turētāja vārds*<br><input type="text" name="nameF" size="43">
	<p>Turētāja uzvārds*<br><input type="text" name="nameL" size="43">
	<p>Turētāja personas kods*<br><input type="text" name="PC" size="43">
	<button type="submit" name="B1">Pievienot</button>
	</p>
</form>
<a>ar '*' atzīmēti lauki nav jāievada ja jūs esat eTalona turētājs</a>-->
	<div class="section section-lg pt-0">
		<div class="container">
			<!-- Title -->
			<div class="row">
				<div class="col text-center">
					<h1 class="h1 mt-5 mb-5">eTalona reģistrācija</h1>
				</div>
			</div>
			<!-- End of title-->
			<div class="row justify-content-md-center">
				<div class="col-12 col-md-6 col-lg-5 mb-5 mb-lg-0">
					<div class="card bg-primary shadow-soft border-light p-4">
						<div class="card-body">
							<a href="etalons.php" class="btn btn-primary text-danger mr-2 mb-2" type="button">
						<span class="fas fa-backspace"></span> Atpakaļ</a>

							<form method="post" action="newEtalons.php">
								<!-- Form -->
								<div class="form-group">
									<div class="input-group mb-4">
										<input class="form-control" name="num" placeholder="eTalona numurs" type="text"
											aria-label="serial" required>
									</div>
								</div>
								<!-- End of Form -->
								<!-- Button Modal -->
								<button type="button" class="btn btn-block btn-primary mb-4" data-toggle="modal"
									data-target="#modal-default">Palīdzība</button>
								<!-- Modal Content -->
								<div class="modal fade" id="modal-default" tabindex="-1" role="dialog"
									aria-labelledby="modal-default" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h2 class="h6 modal-title mb-0" id="modal-title-default">eTalona
													reģistrācija</h2>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">
												<p>Ievadiet eTalona unikālo 10 vai 15 ciparu garu ID numuru no tā
													aizmugures.</p>
												<br><img src="assets/etalons1.png" height="150">
												<img src="assets/etalons2.png" height="150">
												<img src="assets/etalons3.jpg" height="150"></br>
												<p>Lūdzam ņemt vērā ka dzeltenajos eTalonos jāievada cipari pēc '01-'
												</p>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary text-danger ml-auto"
													data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
								<!-- End of Modal Content -->

								<!-- Form -->
								<div class="form-group">
									<label>Zemāk esošie lauki nav jāievada ja jūs esat eTalona turētājs</label>
									<div class="input-group mb-4">
										<div class="input-group-prepend">
											<span class="input-group-text"><span class="fas fa-user"></span></span>
										</div>
										<input class="form-control" name="nameF" placeholder="Turētāja vārds"
											type="text" aria-label="login">
									</div>
								</div>
								<!-- End of Form -->
								<!-- Form -->
								<div class="form-group">
									<div class="input-group mb-4">
										<div class="input-group-prepend">
											<span class="input-group-text"><span class="fas fa-user"></span></span>
										</div>
										<input class="form-control" name="nameL" placeholder="Turētāja uzvārds"
											type="text" aria-label="login">
									</div>
								</div>
								<!-- End of Form -->
								<!-- Form -->
								<div class="form-group">
									<div class="input-group mb-4">
										<div class="input-group-prepend">
											<span class="input-group-text"><span class="fas fa-passport"></span></span>
										</div>
										<input class="form-control" name="PC" placeholder="Turētāja personas kods"
											type="text" aria-label="login">
									</div>
								</div>
								<button type="submit" class="btn btn-block btn-primary">Reģistrēt</button>
								<!-- End of Form -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Core -->
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendor/headroom.js/dist/headroom.min.js"></script>

<!-- Vendor JS -->
<script src="vendor/onscreen/dist/on-screen.umd.min.js"></script>
<script src="vendor/nouislider/distribute/nouislider.min.js"></script>
<script src="vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="vendor/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="vendor/jarallax/dist/jarallax.min.js"></script>
<script src="vendor/jquery.counterup/jquery.counterup.min.js"></script>
<script src="vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
<script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script src="vendor/prismjs/prism.js"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Neumorphism JS -->
<script src="assets/js/neumorphism.js"></script>
<?php else:
  header('Location: /etalons/login.php');
?>
<?php endif;?>
</body>

</html>