<html>
<head> 
    <title>Сведения о пользователях</title>
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
<h2>Пользователи:</h2>
<table border="1">
<tr>  
<th> Логин </th> <th> Тип </th>
<th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($mysqli,"SELECT id, username, password, type FROM users"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
echo "<tr>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['type'] . "</td>";
echo "<td><a href='edit_user.php?id=" . $row['id'] . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
echo "<td><a href='delete_user.php?id=" . $row['id'] . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего пользователей: $num_rows </p>");
?>
<p> <a href="new_user.php"> Добавить пользователя </a>

<form action="exit.php" method="get">
<input type="submit" name="exit" value="Выйти">
</form>
</body>
</html>