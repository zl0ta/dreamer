<?php
  session_start();
  $UID = $_SESSION['username'];
  $link = mysqli_connect("localhost", "zl0ta", "ins3cwetr4st", "zl0ta_");

  //перевірка під'єднання до БД
  if (!$link) {
    echo "Помилка: неможливо встановити з'єднання з MySQL." . PHP_EOL;
    echo "Код помилки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст помилки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
  }

    //відправляємо запит до БД
  $link->query("SET NAMES 'utf8'");

  /*якщо була натиснута 1-а кнопка*/
  if (isset($_POST["ok1"])) {
    $stmt = mysqli_stmt_init($link);
    if (mysqli_stmt_prepare($stmt, "UPDATE `u_data` SET `login` = ? WHERE `login`= ?")) {
      mysqli_stmt_bind_param($stmt, "ss", $login, $UID);
      $login = $_POST['login'];
      if (mysqli_stmt_execute($stmt)) {
        $target_file = "img/".$UID.".jpg";
        if (file_exists($target_file)) {
          $newname = "img/".$login.".jpg";
          rename($target_file, $newname);
        }
        unset($target_file);
        unset($target_dir);
        $_SESSION['username'] = $login;
        echo "Логін успішно змінено!";
        echo "<script>window.location.href='/settings.php';</script>";
      }
      mysqli_stmt_close($stmt);
    }
  }

  /*якщо була натиснута 2-а кнопка*/
  if (isset($_POST["ok2"])) {
    $stmt = mysqli_stmt_init($link);
    if (mysqli_stmt_prepare($stmt, "UPDATE `u_data` SET `name` = ? WHERE `login`= ?")) {
      mysqli_stmt_bind_param($stmt, "ss", $name, $UID);
      $name = $_POST['name'];
      if (mysqli_stmt_execute($stmt)) {
        echo "Ім'я успішно змінено!";
        echo "<script>window.location.href='/settings.php';</script>";
      }
      mysqli_stmt_close($stmt);
    }
  }

  /*якщо була натиснута 3-я кнопка*/
  if (isset($_POST["ok3"])) {
    $stmt = mysqli_stmt_init($link);
    if (mysqli_stmt_prepare($stmt, "UPDATE `u_data` SET `password` = ? WHERE `login`= ?")) {
      mysqli_stmt_bind_param($stmt, "ss", $password, $UID);
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      if (mysqli_stmt_execute($stmt)) {
        echo "Пароль успішно змінено!";
        echo "<script>window.location.href='/settings.php';</script>";
      }
      mysqli_stmt_close($stmt);
    }
  }

  $link->close();
?>
