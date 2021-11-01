<title>Пупков Егор Андреевич</title>

<?php 

    echo('Создали массив с треугольными числами: ');
    for ($n = 1; $n <= 10; $n++){
        $treug[] = $n * ($n + 1) / 2;
        echo ($treug[$n-1].' ');
    }
    
    echo('<br>'.'Создали массив с квадратами чисел от 1 до 10: ');
    for ($n = 1; $n <= 10; $n++) {
        $kvd[] = pow($n, 2);
        echo ($kvd[$n-1].' ');
    }

    echo ('<br>'.'Объединили массивы: ');
    $rez = array_merge($treug, $kvd); 
    for ($n = 0; $n <= count($rez); $n++) {
        echo ($rez[$n].' ');
    } 

    echo ('<br>'.'Отсортировли полученный массив: ');
    sort($rez);
    for ($n = 0; $n <= count($rez); $n++) {
        echo ($rez[$n].' ');
    } 

    echo ('<br>'.'Удалили первый элемент из массива: ');
    unset($rez[0]);
    for ($n = 0; $n <= count($rez); $n++) {
        echo ($rez[$n].' ');
    }
       
    $rez1 = array_unique($rez);
    echo ('<br>'.'Удалили повторяющиеся элементы и занесли в новый массив: ');
    for ($n = 1; $n <= count($rez1)+1; $n++) {
        echo ($rez1[$n].' ');
    } 
    
?>