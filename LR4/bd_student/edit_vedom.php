<html>
<head>
<title> Редактирование данных о ведомости </title>
</head>
<body>
<?php
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$rows=mysqli_query($mysqli, "SELECT id_stud, id_predm, vedom_data,
ocenka FROM zach_vedom WHERE id_vedom=".$_GET['id_vedom']);

        while ($st = mysqli_fetch_array($rows)) {
        $id_vedom=$_GET['id_vedom'];
        $vedom_data = $st['vedom_data'];
        $id_stud = $st['id_stud'];
        $id_predm = $st['id_predm'];
        $ocenka = $st['ocenka'];
        }

print "<form action='save_edit_vedom.php' metod='get'>";
print "Дата: <input name='vedom_data' size='20' type='date' value='".$vedom_data."'>";
print "<br>Студент: <input name='id_stud' size='5' type='text' value='".$id_stud."'>";
print "<br>Предмет: <input name='id_predm' size='5' type='text' value='".$id_predm."'>";
print "<br>Оценка: <input name='ocenka' size='5' type='text' value='".$ocenka."'>";
print "<input type='hidden' name='id_vedom' value='".$id_vedom."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку ведомостей </a>";
?>
</body>
</html>