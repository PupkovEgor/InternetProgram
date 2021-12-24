<html>
<head> 
    <title> Добавление новой ведомости </title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<H2>Добавление ведомости:</H2>
<form action="save_new_vedom.php" metod="get">
Дата: <input name="vedom_data" type="date">
<br>Студент: <input name="id_stud" size="30" type="text">
<br>Предмет: <input name="id_predm" size="30" type="text">
<br>Оценка: <input name="ocenka" size="5" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="tables.php"> Вернуться к списку ведомостей </a>
</body>
</html>