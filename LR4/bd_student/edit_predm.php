<html>
<head>
<title> Редактирование данных о предмете </title>
</head>
<body>
<?php
include("check.php");
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$rows=mysqli_query($mysqli, "SELECT predm_name, prepod_name
FROM predm WHERE id_predm=".$_GET['id_predm']);

        while ($st = mysqli_fetch_array($rows)) {
        $id=$_GET['id_predm'];
        $predm_name = $st['predm_name'];
        $prepod_name = $st['prepod_name'];
        }

print "<form action='save_edit_predm.php' metod='get'>";
print "Название: <input name='predm_name' size='50' type='text' value='".$predm_name."'>";
print "<br>Факультет: <input name='prepod_name' size='30' type='text' value='".$prepod_name."'>";
print "<input type='hidden' name='id_predm' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"tables.php\"> Вернуться к списку пользователей </a>";
?>
</body>
</html>