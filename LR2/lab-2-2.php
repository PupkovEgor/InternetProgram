<title>Пупков Егор Андреевич</title>

<?php

$N = rand(3, 20);
$mas = array($N);

echo ('Массив из '. $N . ' элементов, заполненный случайными числами: ');
for ($i=0; $i<=$N-1; $i++){
    $mas[$i] = rand(10, 99);
    echo ($mas[$i].' ');
}
echo('<br>');

sort($mas);
echo('Массив в отсортированном виде: ');
for ($i=0; $i<=$N-1; $i++){
    echo ($mas[$i].' ');
}
echo('<br>');

$mas = array_reverse($mas);
echo ('Элементы массива в обратном порядке: ');
for ($i=0; $i<=$N-1; $i++){
    echo ($mas[$i].' ');
}
echo('<br>');

array_pop($mas);
echo('Массив после удаления последнего элемента: ');
for ($i=0; $i<=$N-1; $i++){
    echo ($mas[$i].' ');
}
echo('<br>');

for ($i=0; $i<=$N-1; $i++){
    $sum += $mas[$i];
}
echo('Сумма элементов массива: '. $sum . '<br>');

$count = count($mas);
echo('Количество элементов в массиве: '.$count.'<br>');

$sred = $sum / $count;
$sred = round($sred, 2);
echo('Среднее арифметическое для элементов массива: '.$sred.'<br>');

$nalich = in_array(50, $mas);
if ($nalich == true) {
    echo('Число 50 есть в массиве'.'<br>');
} else {
    echo('Числа 50 нет в массиве'.'<br>');
}

$mas = array_unique($mas);
echo('Массив из уникальных значений: ');
for ($i=0; $i<=$N-1; $i++){
    echo ($mas[$i].' ');
}

?>