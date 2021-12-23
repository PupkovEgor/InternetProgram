<html>
<head>
<title> Редактирование данных о пользователе </title>
</head>
<body>
<?php
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$rows=mysqli_query($mysqli, "SELECT stud_name, stud_faculty, stud_group,
stud_no_zk, stud_phone FROM student WHERE id_stud=".$_GET['id_stud']);

        while ($st = mysqli_fetch_array($rows)) {
        $id=$_GET['id_stud'];
        $name = $st['stud_name'];
        $faculty = $st['stud_faculty'];
        $group = $st['stud_group'];
        $no_zk = $st['stud_no_zk'];
        $phone = $st['stud_phone'];
        }

print "<form action='save_edit_stud.php' metod='get'>";
print "Имя: <input name='name' size='50' type='text' value='".$name."'>";
print "<br>Факультет: <input name='faculty' size='20' type='text' value='".$faculty."'>";
print "<br>Группа: <input name='group' size='20' type='text' value='".$group."'>";
print "<br>Номер зачётки: <input name='no_zk' size='30' type='text' value='".$no_zk."'>";
print "<br>Телефон: <input name='phone' size='20' type='text' value='".$phone."'>";
print "<input type='hidden' name='id_stud' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку пользователей </a>";
?>
</body>
</html>