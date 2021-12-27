<html>
<head> 
    <title> Добавление новой ведомости </title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<H2>Добавление ведомости:</H2>
<form action="save_new_vedom.php" metod="get">
<?
include('check.php');
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$result1 = mysqli_query($mysqli, "SELECT id_stud, stud_name FROM student");
$result2 = mysqli_query($mysqli, "SELECT id_predm, predm_name FROM predm");

print "Дата: <input name='vedom_data' type='date'>";
print "<br>Студент: <select name='id_stud'>";

if ($result1) {
        while ($row = mysqli_fetch_array($result1)) {
            $id_stud = $row['id_stud'];
            $stud_name = $row['stud_name'];
            echo "<option value='$id_stud'>$stud_name</option>";
        }
    }
    echo "</select>";

print "<br>Предмет: <select name='id_predm'>";

if ($result2) {
        while ($row = mysqli_fetch_array($result2)) {
            $id_predm = $row['id_predm'];
            $predm_name = $row['predm_name'];
            echo "<option value='$id_predm'>$predm_name</option>";
        }
    }
    echo "</select>";
?>
<br>Оценка: <input name="ocenka" size="5" type="text">
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="tables.php"> Вернуться к списку ведомостей </a>
</body>
</html>