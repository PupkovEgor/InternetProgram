<html> <body>
<?php
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$zapros="UPDATE predm SET predm_name='".$_GET['predm_name']. "',
prepod_name='".$_GET['prepod_name']."'
WHERE id_predm=" .$_GET['id_predm'];
mysqli_query($mysqli, $zapros);
if (mysqli_affected_rows($mysqli)>0) {
echo 'Все сохранено. <a href="index.php"> Вернуться к списку предметов </a>'; }
else { echo 'Ошибка сохранения. <a href="index.php"> Вернуться к списку предметов</a> '; }
?>
</body> </html>