<html><title>Пупков Егор Андреевич</title></html>
<?
    if ($_POST["num1"] > $_POST["num2"]) {
        echo ("Наибольшим числом является " . $_POST["num1"]);
    } else if ($_POST["num1"] < $_POST["num2"]) {
        echo ("Наибольшим числом является " . $_POST["num2"]);
    } else {
        echo ("Числа равны");
    }
?>