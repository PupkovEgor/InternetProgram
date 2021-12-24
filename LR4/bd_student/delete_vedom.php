<html>
<body> 
<form>
<?php
include ("check.php");
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$zapros="DELETE FROM zach_vedom WHERE id_stud=" . $_GET['id_stud'];
if ($_SESSION['type'] == 2){
    $result = mysqli_query($mysqli, $zapros);
    header("Location: tables.php");
} else 
    echo ("У вас недостаточно прав!");

?>
<p> <a href="tables.php"> Вернуться к списку предметов </a>
</form>
</body>
</html>