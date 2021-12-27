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
<th> Имя </th> <th> Номер зачётки </th> <th>Группа</th> <th>Номер телефона</th>
<th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($mysqli,"SELECT id_stud, stud_name, stud_no_zk, stud_group, stud_phone FROM student"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
echo "<tr>";
echo "<td>" . $row['stud_name'] . "</td>";
echo "<td>" . $row['stud_no_zk'] . "</td>";
echo "<td>" . $row['stud_group'] . "</td>";
echo "<td>" . $row['stud_phone'] . "</td>";
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
<th>Дата</th> <th> Студент </th> <th> Предмет </th> <th> Оценка </th>
<th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($mysqli,"SELECT 
                                zach_vedom.id_vedom, 
                                zach_vedom.vedom_data,
                                zach_vedom.ocenka, 

                                student.id_stud as id_stud, 
                                student.stud_name as stud_name, 

                                predm.id_predm as id_predm, 
                                predm.predm_name as predm_name 

                                FROM zach_vedom 
                                LEFT JOIN student ON zach_vedom.id_stud = student.id_stud 
                                LEFT JOIN predm ON zach_vedom.id_predm = predm.id_predm" 
                                );
                                
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
$data = date('d-m-Y', strtotime($row['vedom_data']));
echo "<tr>";
echo "<td>" . $data . "</td>";
echo "<td>" . $row['stud_name'] . "</td>";
echo "<td>" . $row['predm_name'] . "</td>";
echo "<td>" . $row['ocenka'] . "</td>";
echo "<td><a href='edit_vedom.php?id_vedom=" . $row['id_vedom'] . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete_vedom.php?id_vedom=" . $row['id_vedom'] . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
if ($_SESSION['type'] == 1) {
    $path = "menuOper.php";
} else $path = "menuAdmin.php";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего ведомостей: $num_rows </p>");
?>
<p> <a href="new_vedom.php"> Добавить ведомость </a>
<p> <a href="gen_pdf.php"> Создать PDF </a>
<p> <a href="gen_xls.php"> Создать XLS </a>
<? print "<p> <a href = '". $path . "'> Перейти в меню </a>"; ?>
<form action="exit.php" method="get">
<input type="submit" name="exit" value="Выйти">
</form>
</body> 
</html>