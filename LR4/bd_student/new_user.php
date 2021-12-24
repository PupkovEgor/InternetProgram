<html>
<head> 
    <title> Добавление нового пользователя </title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<H2>Добавление пользователя:</H2>
<form action="save_new_user.php" metod="get">
Логин: <input name="username" size="20" type="text">
<br>Пароль: <input name="password" size="20" type="password">
<br>Тип: <input name="type" size="1" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="user.php"> Вернуться к списку пользователей </a>
</body>
</html>