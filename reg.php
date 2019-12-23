<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title> Реєстрація </title>
  <meta name="viewport" content="width=device-width, initial_scale=1.0"> <!-- адаптивність до мобільних пристороїв -->
  <link rel="stylesheet" href="css/based.css">
</head>
<body>
  <form action="php/reg_.php" method="post">
   <p>Логін (пошта, номер телефону): <input type="text" name="login" /></p>
   <p>Ваше ім'я (буде відбражатися іншим юзерам): <input type="text" name="name" /></p>
   <p>Пароль: <input type="password" name="password" /></p>
   <p><input type="submit" /></p>
  </form>
</body>
</html>
