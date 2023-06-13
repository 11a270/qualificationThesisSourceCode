<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>E-TALONS</title>
    <!-- Open Graph data -->
<meta property="fb:app_id" content="214738555737136">
<meta property="og:title" content="Neumorphism UI by Themesberg" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://demo.themesberg.com/neumorphism-ui/" />
<meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/neumorphism-ui/neumorphism-thumbnail.jpg"/>
<meta property="og:description" content="Start developing neumorphic web applications and pages using Neumorphism UI. It features over 100 individual components and 5 example pages." />
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


  <div class="section section-lg pt-0">
    <div class="container">
        <!-- Title -->
        <div class="row">
            <div class="col text-center">
                <h1 class="h1 mt-5 mb-5">eTalons</h1>
                <h2 class="h1 mt-5 mb-5">Biļešu iegādes sistēma</h2>
            </div>
        </div>
        <!-- End of title-->
        <div class="row justify-content-md-around">
            <div class="col-12 col-md-10 col-lg-10 mb-5 mb-lg-0">
                <div class="card bg-primary shadow-soft border-light p-5">
                    <div class="card-header text-center pb-0">
                        <h2 class="h3">Sveicināti, <?=$_COOKIE['user']?>!</h2>
                        <h2 class="h4">Jums ir 
                        <?php
                        $mysql = new mysqli('localhost', 'root', '', 'etalons');
                        function retrieveUserID($username, $sql)
                        {
                          $query = "SELECT `userid` FROM `useraccount` WHERE `login` = '$username'";
                          $result = mysqli_query($sql, $query);
                          $row = mysqli_fetch_row($result);
                          return $row[0];
                        }
                        
						            $loggedUser = $_COOKIE['user'];
						            $uid = retrieveUserID($loggedUser, $mysql);

						            $result = $mysql->query("SELECT `serialN`, `holderFirstName`, `holderLastName`, `holderPersonal_ID` FROM `etalons` WHERE `userCardBelongsTo` = '$uid'");
                        $i = 0;
                        while ($row = $result->fetch_assoc()) {
                          $i++;
                        }
                        echo ($i);
                        $mysql->close();
                        ?> eTaloni</h2>
                        <h2 class="h4">Ko jūs vēlaties darīt?</h2>
                    </div>
                    <div class="card-body text-center">
                      <a href="etalons.php" class="btn btn-primary text-info mr-2 mb-2" type="button">
                        <span class="fas fa-list-ul"></span> Apskatīt manus eTalonus</a>
                      <a href="exit.php" class="btn btn-primary text-danger mr-2 mb-2" type="button">
                        <span class="fas fa-sign-out-alt"></span> Iziet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php else:
  header('Location: /etalons/login.php');
?>
<?php endif;?>

</body>

</html>
