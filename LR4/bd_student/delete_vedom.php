<?php
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$zapros="DELETE FROM zach_vedom WHERE id_vedom=" . $_GET['id_vedom'];
mysqli_query($mysqli, $zapros);
header("Location: index.php");
exit;
?>