<!DOCTYPE html>
    <?php
    session_start();
    $UID = $_SESSION['username'];
    ?>
<html>
<head>
  <meta charset="utf-8" />
  <title> Налаштування </title>
  <meta name="viewport" content="width=device-width, initial_scale=1.0">   <!--  адаптивность к мобильным устройствам-->
  <link rel="stylesheet" href="css/settings.css">
  <link rel="stylesheet" href="css/based.css">
</head>
<body>
  <?php echo file_get_contents("menu.php"); ?>
  <h3> Активний користувач:  <?php echo $UID; ?>
  <br>
  <img width = "20%" src="img/<?php echo $UID; ?>.jpg" onerror="this.src='img/default.png'">

  </h3>
  <form class="par-sett" action="php/settings_.php" method="post">
    <table>
        <tr>
          <td>Логін:</td>
          <td><input type="text" name="login"></td>
          <td><input type="submit" name="ok1" value="Змінити"></td>
        </tr>
        <tr>
          <td>Ім'я користувача:</td>
          <td><input type="text" name="name"></td>
          <td><input type="submit" name="ok2" value="Змінити"></td>
        </tr>
        <tr>
          <td>Пароль:</td>
          <td><input type="password" name="password"></td>
          <td><input type="submit" name="ok3" value="Змінити"></td>
        </tr>
    </table>
  </form>

  <form action="php/img_upload_.php" method="post" enctype="multipart/form-data">
    Завантажте фото профілю:
    <input type="file" name="avka" id="avka">
    <input type="submit" value="Завантажити" name="submit">
  </form>
</body>
</html>
