<?php
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$zapros1="DELETE FROM predm WHERE id_predm=" . $_GET['id_predm'];
$zapros2="DELETE FROM zach_vedom WHERE id_predm=" . $_GET['id_stud'];
mysqli_query($mysqli, $zapros1);
header("Location: index.php");
exit;
?>