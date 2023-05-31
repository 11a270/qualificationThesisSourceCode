<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>E-TALONS</title>
    <link rel="stylesheet" href="assets/styles.css">

  </head>

<body>
<?php if ($_COOKIE['user'] != ''): ?>

  <h1>Biļešu iegādes sistēma</h1>
  <h2>Sveicināti, <?=$_COOKIE['user']?>!</h2>
  <h2>Ko jūs vēlaties darīt? Vai <a href="exit.php">IZIET</a> no sistēmas.</h2>
  <a href="newEtalons.html">Apskatīt manus eTalonus</a>

<?php else:
  header('Location: /etalons/login.html');
?>
<?php endif;?>

</body>

</html>
