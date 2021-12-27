<html>
<head>
<title> Редактирование данных о ведомости </title>
</head>
<body>
<?php
include("check.php");
$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost","root","") or die ("Невозможно подключиться к серверу");
mysqli_query($mysqli, 'SET NAMES utf-8');
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
$id_vedom = $_GET['id_vedom'];
$rows=mysqli_query($mysqli, "SELECT 
                                        zach_vedom.id_vedom, 
                                        zach_vedom.vedom_data,
                                        zach_vedom.ocenka, 

                                        student.id_stud as id_stud, 
                                        student.stud_name as stud_name, 

                                        predm.id_predm as id_predm, 
                                        predm.predm_name as predm_name 

                                        FROM zach_vedom 
                                        LEFT JOIN student ON zach_vedom.id_stud = student.id_stud 
                                        LEFT JOIN predm ON zach_vedom.id_predm = predm.id_predm 
                                        WHERE id_vedom='$id_vedom'");

        while ($st = mysqli_fetch_array($rows)) {
        $id_vedom=$_GET['id_vedom'];
        $vedom_data = $st['vedom_data'];
        $id_stud = $st['id_stud'];
        $id_predm = $st['id_predm'];
        $ocenka = $st['ocenka'];
        $stud_name = $st['stud_name'];
        $predm_name = $st['predm_name'];
        }

$result1 = mysqli_query($mysqli, "SELECT id_stud, stud_name FROM student");
$result2 = mysqli_query($mysqli, "SELECT id_predm, predm_name FROM predm");

print "<form action='save_edit_vedom.php' metod='get'>";
print "Дата: <input name='vedom_data' size='20' type='date' value='".$vedom_data."'>";
print "<br>Студент: <select name='id_stud'>";
print "<option selected value='$id_stud'>$stud_name</option>";
        if ($result1) {
                while ($row = mysqli_fetch_array($result1)) {
                $id = $row['id_stud'];
                $name = $row['stud_name'];
                if ($id != $id_stud and $name != $stud_name) 
                echo "<option value='$id'>$name</option>";
                }
        }
        echo "</select>";
print "<br>Предмет: <select name='id_predm'>";
print "<option selected value='$id_predm'>$predm_name</option>";
        if ($result2) {
                while ($row = mysqli_fetch_array($result2)) {
                $id = $row['id_predm'];
                $name = $row['predm_name'];
                if  ($id != $id_predm and $name != $predm_name)
                echo "<option value='$id'>$name</option>";
                }
        }
        echo "</select>";
print "<br>Оценка: <input name='ocenka' size='5' type='text' value='".$ocenka."'>";
print "<input type='hidden' name='id_vedom' value='".$id_vedom."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"tables.php\"> Вернуться к списку ведомостей </a>";
?>
</body>
</html>