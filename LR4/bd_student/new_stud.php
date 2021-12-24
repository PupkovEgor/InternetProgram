<html>
<head> 
    <title> Добавление нового студента </title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<H2>Добавление студента:</H2>
<form action="save_new_stud.php" metod="get">
ФИО: <input name="name" size="50" type="text">
<br>Факультет: <input name="faculty" size="20" type="text">
<br>Группа: <input name="group" size="20" type="text">
<br>Номер зачётки: <input name="no_zk" size="30" type="text">
<br>Телефон: <input name="phone" size="30" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="tables.php"> Вернуться к списку пользователей </a>
</body>
</html>