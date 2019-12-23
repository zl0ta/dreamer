<?php
  	session_start();
    $UID = $_SESSION['username'];
    if (!isset($UID)) header("Location: log_in.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title> Мій профіль </title>
  <meta name="viewport" content="width=device-width, initial_scale=1.0">   <!--  адаптивность к мобильным устройствам -->
  <link rel="stylesheet" href="css/based.css">
</head>
<body>
  <?php echo file_get_contents("menu.php"); ?>

  <!-- Фото профілю користувача -->
  <img width = "20%" src="img/<?php echo $UID; ?>.jpg" onerror="this.src='img/default.png';">
</body>
</html>
