<?php
// Подключение к базе данных:
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8'); // Тип кодировки
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
// Строка запроса на добавление записи в таблицу:
$sql_add = "INSERT INTO student SET stud_name='" . $_GET['name'] 
."', stud_faculty='".$_GET['faculty']."', stud_group='" 
.$_GET['group']."', stud_no_zk='".$_GET['no_zk']. "',
 stud_phone='".$_GET['phone']. "'";
mysqli_query($mysqli, $sql_add); // Выполнение запроса
if (mysqli_affected_rows($mysqli)>0) // если нет ошибок при выполнении запроса
{ print "<p>Студент добавлен в базу данных.";
print "<p><a href=\"index.php\"> Вернуться к списку студентов </a>"; }
else { print "Ошибка сохранения. <a href=\"index.php\"> Вернуться к списку студентов </a>"; }
?>