<html>
<head> 
    <title> Добавление нового предмета </title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<H2>Добавление предмета:</H2>
<form action="save_new_predm.php" metod="get">
<?
include("check.php");
?>
Название: <input name="predm_name" size="30" type="text">
<br>Преподаватель: <input name="prepod_name" size="30" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="tables.php"> Вернуться к списку предметов </a>
</body>
</html>