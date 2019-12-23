<!DOCTYPE html>
<head>
  <title>Інші користувачі</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial_scale=1.0">   <!--  адаптивность к мобильным устройствам-->
  <link rel="stylesheet" href="css/based.css">
</head>
<body>

  <?php echo file_get_contents("menu.php"); ?>

  <!--<hr color="#c40024" width="100%" height="5px"></hr>-->
  <div class="table_1">
    <h2>Користувачі</h2>

    <table cellpadding="15"cellspacing="0">
    <tr>
    <th>Аватар</th>
    <th>Ім'я користувача</th>
    <th>Дата реєстрації</th>
    </tr>
    <?php require 'php/others_.php';?>
</table>
  </div>

</body>
</html>
