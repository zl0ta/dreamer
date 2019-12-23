<?php
  if (isset($_SESSION)) {
    session_destroy(); // restart
  }
  session_start();
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

  //алгоритм реєстрації нового користувача з перевіркою 1) на наявність введеного логіна в базі, 2) заповнеість всіх полів
  $stmt = mysqli_stmt_init($link);
  if (mysqli_stmt_prepare($stmt, 'INSERT INTO `u_data` (`login`, `name`, `password`, `reg_date`) VALUES (?, ?, ?, UNIX_TIMESTAMP())')) {
    mysqli_stmt_bind_param($stmt, "sss", $login, $name, $password);

    $login = $_POST['login'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (empty($_POST['password']) || empty ($name) || empty($login)) {
       die("Ви не заповнили всі поля! Повторіть спробу.");
    }

    if (mysqli_stmt_execute($stmt)) {
        echo "Ви успішно зареєструвалися!";
        $_SESSION['username'] = $login;
        $UID = $_SESSION['username'];
        //uploading default avka
        echo "<script>window.location.href=\"/index.php\";</script>";
    }
    mysqli_stmt_close($stmt);
  }

  $link->close();
?>
