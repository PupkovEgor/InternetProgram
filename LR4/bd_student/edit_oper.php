<html>
<head>
<title> Редактирование данных </title>
</head>
<body>
<?php
include("check.php");
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$rows=mysqli_query($mysqli, "SELECT username, password
FROM users WHERE id=".$_SESSION['id']);

while ($st = mysqli_fetch_array($rows)) {
    $id=$_GET['id'];
    $username = $st['username'];
    $password = $st['password'];
}

print "<form action='save_edit_oper.php' metod='get'>";
print "Логин: <input name='username' size='10' type='text' value='".$username."'>";
print "<br>Пароль: <input name='password' size='10' type='password' value=''>";
print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"menuOper.php\"> Вернуться к списку пользователей </a>";
?>
</body>
</html>