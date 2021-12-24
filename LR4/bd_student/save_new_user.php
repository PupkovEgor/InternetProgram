<?php
include("check.php");
// Подключение к базе данных:
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8'); // Тип кодировки
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
// Строка запроса на добавление записи в таблицу:
$sql_add = "INSERT INTO users SET username='" . $_GET['username'] 
."', password='". md5($_GET['password']) ."', type='" .$_GET['type']."'";

if ($_SESSION['type'] == 2){
    mysqli_query($mysqli, $sql_add); // Выполнение запроса
    if (mysqli_affected_rows($mysqli)>0) // если нет ошибок при выполнении запроса
        { print "<p>Пользователь добавлен в базу данных.";
        print "<p><a href=\"user.php\"> Вернуться к списку пользователей </a>"; }
else { print "Ошибка сохранения. <a href=\"user.php\"> Вернуться к списку студентов </a>"; }
} else 
    echo ("У вас недостаточно прав!");

?>