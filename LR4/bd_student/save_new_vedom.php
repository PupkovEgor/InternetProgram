<?php
include("check.php");
// Подключение к базе данных:
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8'); // Тип кодировки
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
// Строка запроса на добавление записи в таблицу:
$sql_add = "INSERT INTO zach_vedom SET vedom_data='" . $_GET['vedom_data']
."', id_stud='".$_GET['id_stud']."', id_predm='" 
.$_GET['id_predm']."', ocenka='".$_GET['ocenka']."'";
mysqli_query($mysqli, $sql_add); // Выполнение запроса
if (mysqli_affected_rows($mysqli)>0) // если нет ошибок при выполнении запроса
{ print "<p>Ведомость добавлена в базу данных.";
print "<p><a href=\"tables.php\"> Вернуться к списку ведомостей </a>"; }
else { print "Ошибка сохранения. <a href=\"tables.php\"> Вернуться к списку ведомостей </a>"; }
?>