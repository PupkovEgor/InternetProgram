<html>
<head> 
    <title> Добавление новой ведомости </title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<H2>Добавление ведомости:</H2>
<form action="save_new_vedom.php" metod="get">
Дата: <input name="vedom_data" type="date">
<br>Студент: <input name="stud_name" size="30" type="int">
<br>Предмет: <input name="predm_name" size="30" type="int">
<br>Оценка: <input name="ocenka" size="5" type="int">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку ведомостей </a>
</body>
</html>