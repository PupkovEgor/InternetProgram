<html> <body>
<?php
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$zapros="UPDATE zach_vedom SET vedom_data='".$_GET['vedom_data']. "',
id_stud='".$_GET['id_stud']."', id_predm='" .$_GET['id_predm']."',
ocenka='".$_GET['ocenka']."'
WHERE id_vedom=" .$_GET['id_vedom'];
mysqli_query($mysqli, $zapros);
if (mysqli_affected_rows($mysqli)>0) {
echo 'Все сохранено. <a href="index.php"> Вернуться к списку ведомостей </a>'; }
else { echo 'Ошибка сохранения. <a href="index.php"> Вернуться к списку ведомостей</a> '; }
?>
</body> </html>