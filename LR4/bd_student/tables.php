<html>
<head> 
    <title> Сведения о студентах</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
include("check.php");
 $mysqli = new mysqli("localhost", "root");
 mysqli_connect("localhost", "root") or die ("Невозможно подключиться к серверу"); // установление соединения с сервером
 mysqli_query($mysqli, 'SET NAMES utf-8'); // тип кодировки
 // подключение к базе данных:
 mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
?>
<h2>Студенты:</h2>
<table border="1">
<tr>  
    <!-- вывод «шапки» таблицы -->
<th> Имя </th> <th> Номер зачётки </th> <th>Группа</th>
<th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($mysqli,"SELECT id_stud, stud_name, stud_no_zk, stud_group FROM student"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
echo "<tr>";
echo "<td>" . $row['stud_name'] . "</td>";
echo "<td>" . $row['stud_no_zk'] . "</td>";
echo "<td>" . $row['stud_group'] . "</td>";
echo "<td><a href='edit_stud.php?id_stud=" . $row['id_stud'] . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete_stud.php?id_stud=" . $row['id_stud'] . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего пользователей: $num_rows </p>");
?>
<p> <a href="new_stud.php"> Добавить студента </a>

<h2>Предметы:</h2>
<table border="1">
<tr>  
<!-- вывод «шапки» таблицы -->
<th> Предмет </th> <th> Преподаватель </th>
<th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($mysqli,"SELECT id_predm, predm_name, prepod_name FROM predm"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
echo "<tr>";
echo "<td>" . $row['predm_name'] . "</td>";
echo "<td>" . $row['prepod_name'] . "</td>";
echo "<td><a href='edit_predm.php?id_predm=" . $row['id_predm'] . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete_predm.php?id_predm=" . $row['id_predm'] . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего предметов: $num_rows </p>");
?>
<p> <a href="new_predm.php"> Добавить предмет </a>

<h2>Зачётные ведомости:</h2>
<table border="1">
<tr>  
    <!-- вывод «шапки» таблицы -->
<th> ИД студента </th> <th> ИД предмета </th> <th> Оценка </th>
<th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($mysqli,"SELECT id_vedom, id_stud, id_predm, ocenka FROM zach_vedom"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
echo "<tr>";
echo "<td>" . $row['id_stud'] . "</td>";
echo "<td>" . $row['id_predm'] . "</td>";
echo "<td>" . $row['ocenka'] . "</td>";
echo "<td><a href='edit_vedom.php?id_vedom=" . $row['id_vedom'] . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete_vedom.php?id_vedom=" . $row['id_vedom'] . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего ведомостей: $num_rows </p>");
?>
<p> <a href="new_vedom.php"> Добавить ведомость </a>
<p> <a href="gen_pdf.php"> Создать PDF </a>
<p> <a href="gen_xls.php"> Создать XLS </a>
<form action="exit.php" method="get">
<input type="submit" name="exit" value="Выйти">
</form>
</body> 
</html>