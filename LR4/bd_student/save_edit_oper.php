<html> <body>
<?php
include("check.php");
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$zapros="UPDATE users SET username='".$_GET['username']. "',
password='".md5($_GET['password'])."'WHERE id=" .$_SESSION['id'];
mysqli_query($mysqli, $zapros);
if (mysqli_affected_rows($mysqli)>0) {
echo 'Все сохранено. <a href="menuOper.php"> Вернуться к меню </a>'; }
else { echo 'Ошибка сохранения. <a href=menuOper.php"> Вернуться к меню</a> '; }
?>
</body> </html>