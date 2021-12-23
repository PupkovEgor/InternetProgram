<html> <body>
<?php
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "users") or die("Нет такой таблицы!");
$zapros="UPDATE user SET user_name='".$_GET['name']. "',
 user_login='".$_GET['login']."', user_password='" .$_GET['password']."',
  user_e_mail='".$_GET['e_mail']. "', user_info='".$_GET['info']."' WHERE id_user=" .$_GET['id_user'];
mysqli_query($mysqli, $zapros);
if (mysqli_affected_rows($mysqli)>0) {
echo 'Все сохранено. <a href="index.php"> Вернуться к списку пользователей </a>'; }
else { echo 'Ошибка сохранения. <a href="index.php"> Вернуться к списку пользователей</a> '; }
?>
</body> </html>