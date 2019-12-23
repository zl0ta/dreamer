<?php
  session_start();
  session_unset();
  session_destroy();
  session_start();
  unset($_SESSION['username']);

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

  if (isset($_POST['login']) && isset($_POST['password'])) { //якщо введені всі дані, то
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query= "SELECT password FROM `u_data` WHERE login='$login'"; //з БД обираємо пароль користувача, логін якого співпадає з уведеним
    $result = mysqli_query($link, $query) OR die(mysqli_error($link));
    $count = mysqli_num_rows($result); //рахуємо кількість таких користувачів. Це 0 або 1. 0 - таких логінів не знайдено, 1 - є такий логін
                                       //(більше не може бути, то мне можна зареєструвати два користувача з однаковим логіном)
    //echo "$count<br>";
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $str = json_encode($row); echo "$str";

    if ($count==1) {
      $pass_hash = $row[0]['password'];
      if (password_verify($password, $pass_hash)) {
        $_SESSION['username'] = $login;
        $UID = $_SESSION['username'];
        echo "<script>window.location.href='/index.php';</script>";
      }
    }  else {
        die("Такого користувача не існує");
      }
  }
  $link->close();
?>
