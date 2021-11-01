<title>Пупков Егор Андреевич</title>

<?php

echo ('Создал массив:'.'<br>');
$cust = array("cnum" => 2001, "cname" => "Hoffman",
             "city" => "London", "snum" => 1001 );
echo "<pre>";
print_r($cust);
echo "</pre>";

echo('Добавил элемент "rating":'.'<br>');
$cust["rating"] = 100;
echo "<pre>";
print_r($cust);
echo "</pre>";

echo('Отсортировал по значениям:'.'<br>');
asort($cust);
echo "<pre>";
print_r($cust);
echo "</pre>";

echo('Остортировал по ключам:'.'<br>');
ksort($cust);
echo "<pre>";
print_r($cust);
echo "</pre>";

echo('Отсортировал с помощью sort():'.'<br>');
sort($cust);
echo "<pre>";
print_r($cust);
echo "</pre>";


?>