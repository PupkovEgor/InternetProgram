<html> <body>
<?php
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$zapros="UPDATE student SET stud_name='".$_GET['name']. "',
stud_faculty='".$_GET['faculty']."', stud_group='" .$_GET['group']."',
stud_no_zk='".$_GET['no_zk']. "', stud_phone='".$_GET['phone']."'
WHERE id_stud=" .$_GET['id_stud'];
mysqli_query($mysqli, $zapros);
if (mysqli_affected_rows($mysqli)>0) {
echo 'Все сохранено. <a href="index.php"> Вернуться к списку пользователей </a>'; }
else { echo 'Ошибка сохранения. <a href="index.php"> Вернуться к списку пользователей</a> '; }
?>
</body> </html>