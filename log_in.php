<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
  <title> Вхід </title>
  <meta name="viewport" content="width=device-width, initial_scale=1.0">   <!-- адаптивность к мобильным устройствам -->
  <link rel="stylesheet" href="css/based.css">
	<link rel="stylesheet" href="css/log_reg.css">
</head>
<body>
	<form action="php/log_in_.php" method="post">
		<span class="text"> Логін: </span><br>
		<input name="login" type="text"><br>
		<span class="text"> Пароль: </span><br>
		<input type="Password" name="password" id="Password" autocomplete="off"><br>
		<input type="submit" name="log_in" value="Увійти" style="font-size: 24px; font-weight: bold;">
	</form>

	<button onclick="window.location.href='reg.php'" class="reg"> Реєстрація </button>
</body>
</html>
