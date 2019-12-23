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

  $query = "SELECT login, name, reg_date FROM u_data WHERE 1";
  $result = $link->query($query);
  $count = $result->num_rows; //mysqli_num_rows($result);

  if ($count > 0) {
      // output data of each row

      while($count > 0 ) {
      //while($row = $result->fetch_assoc()) {
          $count = $count-1;
          $row = $result->fetch_assoc();
          $filename = "img/".$row["login"].".jpg";
          if (file_exists($filename)) {
            echo "<tr padding:0 15px;><td >"."<img width = \"50\" height = \"50\" src=\"".$filename."\">"."</td><td>".$row["name"]."</td><td>".date('m/d/Y', $row["reg_date"])."</td></tr>";
          } else {
            echo "<tr padding:0 15px;><td >"."<img width = \"50\" height = \"50\" src=\"/img/default.png\">.</td><td>".$row["name"]."</td><td>".date('m/d/Y', $row["reg_date"])."</td></tr>";
          }
      }
  } else {
      echo "0 results";
  };
  $link->close();

?>
