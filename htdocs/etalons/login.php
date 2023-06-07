<!DOCTYPE html>
<?php
if (isset($_COOKIE['user'])) {
    header('Location: /etalons/index.php');
}
?>
<html class="no-js" lang="en">

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

    <script>

        // Function to check Whether both passwords
        // is same or not.
        function checkPassword(form) {
            password = form.password.value;
            password2 = form.password2.value;
            // If Not same return False.    
            if (password != password2) {
                alert("\nPassword did not match: Please try again...")
                return false;
            }
        }
        function checkRouxls() {
            document.getElementById("rouxls1").required = true;
            document.getElementById("rouxls2").required = true;
        }
    </script>

</head>

<body>

    <!--	<form method="POST" action="login.php">
        <h1>LOG IN TO E-TALONS</h1>
        <p>Login<br>
        <input type="text" name="login" size="43"><br>Password<br>
        <input type="password" name="password" size="43"><br>
        <button type="submit" name="B1">Log in</button>
      </p>
        <a href="reg.html">Reģistrācija</a>
</form>
-->
    <div class="section section-lg pt-0">
        <div class="container">
            <!-- Title -->
            <div class="row">
                <div class="col text-center">
                    <h1 class="h1 mt-5 mb-5">eTalons</h1>
                </div>
            </div>
            <!-- End of title-->
            <div class="row justify-content-md-around">
                <div class="col-12 col-md-6 col-lg-5 mb-5 mb-lg-0">
                    <div class="card bg-primary shadow-soft border-light p-4">
                        <div class="card-header text-center pb-0">
                            <h2 class="h4">Ieiet</h2>

                        </div>
                        <div class="card-body">
                            <form method="post" action="auth.php" class="mt-4">
                                <!-- Form -->
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fas fa-user"></span></span>
                                        </div>
                                        <input class="form-control" name="login" placeholder="Lietotājvārds" type="text"
                                            aria-label="login" required>
                                    </div>
                                </div>
                                <!-- End of Form -->
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span
                                                        class="fas fa-unlock-alt"></span></span>
                                            </div>
                                            <input class="form-control" name="password" placeholder="Parole"
                                                type="password" aria-label="Password" required>
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                </div>
                                <button type="submit" name="loginbtn" class="btn btn-block btn-primary">Ieiet</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 mb-5 mb-lg-0">
                    <div class="card bg-primary shadow-soft border-light p-4">
                        <div class="card-header text-center pb-0">
                            <h2 class="mb-0 h5">Reģistrēties</h2>
                            <?php
                            if (array_key_exists('login', $_POST)) {
                                $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$login\n");
                            }
                            if (array_key_exists('login', $_POST)) {
                                $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$email\n");
                            }
                            if (array_key_exists('password', $_POST)) {
                                $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$password\n");
                            }
                            if (array_key_exists('password2', $_POST)) {
                                $password2 = filter_var(trim($_POST['password2']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$password2\n");
                            }
                            if (array_key_exists('userFirstName', $_POST)) {
                                $firstName = filter_var(trim($_POST['userFirstName']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$userFirstName\n");
                            }
                            if (array_key_exists('userLastName', $_POST)) {
                                $lastName = filter_var(trim($_POST['userLastName']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$userLastName\n");
                            }
                            if (array_key_exists('userPersonalIDNumber', $_POST)) {
                                $pid = filter_var(trim($_POST['userPersonalIDNumber']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$userPersonalIDNumber\n");
                            }
                            if (array_key_exists('mobilePhoneNum', $_POST)) {
                                $mobile = filter_var(trim($_POST['mobilePhoneNum']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$mobilePhoneNum\n");
                            }
                            if (array_key_exists('landlinePhoneNum', $_POST)) {
                                $landline = filter_var(trim($_POST['landlinePhoneNum']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$landlinePhoneNum\n");
                            }
                            if (array_key_exists('rouxls1', $_POST)) {
                                $rouxls1 = filter_var(trim($_POST['rouxls1']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$rouxls1\n");
                            }
                            if (array_key_exists('rouxls2', $_POST)) {
                                $rouxls2 = filter_var(trim($_POST['rouxls2']), FILTER_SANITIZE_STRING);
                                //echo nl2br("$rouxls2\n");
                            }

                            if (array_key_exists('regbtn', $_POST)) {
                                if (mb_strlen($login) < 1 || mb_strlen($password) < 1 || mb_strlen($email) < 1) {
                                    echo "ERROR: You have to provide all of creditentials in order to register";
                                    exit();
                                } elseif ($password != $password2) {
                                    echo "ERROR: Passwords must match";
                                    exit();
                            //     } elseif ($rouxls1 != 'Yes' || $rouxls2 != 'Yes') {
                            //         echo "Lai registretos japiekrist datu glabāšanas un apstrādes un lietosanas noteikumiem";
                                } else {

                                    $password = md5($password . "ghjsfkld2345");

                                    $mysql = new mysqli('localhost', 'root', '', 'etalons');
                                    $mysql->query("INSERT INTO `useraccount` (`login`, `email`, `password`, `userFirstName`, `userLastName`, `userPersonalIDNumber`, `mobilePhoneNum`, `landlinePhoneNum`)
                                                                VALUES('$login', '$email', '$password', '$firstName', '$lastName', '$pid', '$mobile', '$landline')");
                                    $mysql->close();
                                    echo '<h3>User registered successfuly</h3>';
                                }
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <form method="post" onSubmit="return checkPassword(this)">
                                <!-- Form -->
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fas fa-user"></span></span>
                                        </div>
                                        <input class="form-control" name="login" placeholder="Lietotājvārds" type="text"
                                            aria-label="login" required>
                                    </div>
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><span class="fas fa-envelope"></span></span>
                                        </div>
                                        <input class="form-control" name="email" placeholder="ePasts" type="text"
                                            aria-label="email adress" required>
                                    </div>
                                </div>
                                <!-- End of Form -->
                                <div class="form-group">
                                    <!-- Form -->
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span
                                                        class="fas fa-unlock-alt"></span></span>
                                            </div>
                                            <input class="form-control" name="password" placeholder="Parole"
                                                type="password" aria-label="Password" required>
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <!-- Form -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span
                                                        class="fas fa-unlock-alt"></span></span>
                                            </div>
                                            <input class="form-control" name="password2" placeholder="Atkārtot paroli"
                                                type="password" aria-label="Password" required>
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <!-- Form -->
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-user"></span></span>
                                            </div>
                                            <input class="form-control" name="userFirstName" placeholder="Vārds"
                                                type="text" aria-label="name">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <!-- Form -->
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-user"></span></span>
                                            </div>
                                            <input class="form-control" name="userLastName" placeholder="Uzvārds"
                                                type="text" aria-label="login">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <!-- Form -->
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span
                                                        class="fas fa-passport"></span></span>
                                            </div>
                                            <input class="form-control" name="userPersonalIDNumber"
                                                placeholder="Personas kods" type="text" aria-label="login">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <!-- Form -->
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span
                                                        class="fas fa-mobile-alt"></span></span>
                                            </div>
                                            <input class="form-control" name="mobilePhoneNum"
                                                placeholder="Mobilā tālr. numurs" type="text" aria-label="login">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <!-- Form -->
                                    <div class="form-group">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="fas fa-phone"></span></span>
                                            </div>
                                            <input class="form-control" name="landlinePhoneNum"
                                                placeholder="Stacionārā/2.Mobilā tālr. numurs" type="text"
                                                aria-label="login">
                                        </div>
                                    </div>
                                    <!-- End of Form -->
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" name="rouxls1" type="checkbox" value=""
                                            id="rouxls1">
                                        <label class="form-check-label" for="rouxls1" required>
                                            Piekrītu lietošanas noteikumiem
                                        </label>
                                    </div>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" name="rouxls2" type="checkbox" value=""
                                            id="rouxls2">
                                        <label class="form-check-label" for="rouxls2" required>
                                            Piekrītu datu glabāšanas un apstrādes noteikumiem
                                        </label>
                                    </div>
                                </div>
                                <button name="regbtn" type="submit"
                                    class="btn btn-block btn-primary">Reģistrēties</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>