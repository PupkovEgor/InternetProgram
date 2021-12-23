<?php
// Подключение к базе данных:
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8'); // Тип кодировки
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
// Строка запроса на добавление записи в таблицу:
$sql_add = "INSERT INTO predm SET predm_name='" . $_GET['predm_name'] 
."', prepod_name='".$_GET['prepod_name']. "'";
mysqli_query($mysqli, $sql_add); // Выполнение запроса
if (mysqli_affected_rows($mysqli)>0) // если нет ошибок при выполнении запроса
{ print "<p>Предмет добавлен в базу данных.";
print "<p><a href=\"index.php\"> Вернуться к списку предметов </a>"; }
else { print "Ошибка сохранения. <a href=\"index.php\"> Вернуться к списку предметов </a>"; }
?>