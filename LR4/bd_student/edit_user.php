<html>
<head>
<title> Редактирование данных о пользователе </title>
</head>
<body>
<?php
include("check.php");
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$rows=mysqli_query($mysqli, "SELECT username, password, type
FROM users WHERE id=".$_SESSION['id']);

if ($_SESSION['type'] == 2) {
while ($st = mysqli_fetch_array($rows)) {
    $id=$_GET['id'];
    $username = $st['username'];
    $password = $st['password'];
    $type= $st['type'];
}

print "<form action='save_edit_user.php' metod='get'>";
print "Логин: <input name='username' size='10' type='text' value='".$username."'>";
print "<br>Пароль: <input name='password' size='10' type='password' value=''>";
print "<br>Тип: <input name='type' size='1' type='text' value='".$type."'>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"user.php\"> Вернуться к списку пользователей </a>";
} else {
    echo "У вас недостаточно прав!";
    echo "<p><a href=\"tables.php\"> Вернуться таблицам </a>";
}
?>
</body>
</html>