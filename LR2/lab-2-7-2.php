<HTML>
<TITLE> Пупков Егор Андреевич </TITLE>
<BODY>

<?php
echo('Заполнить квадратную матрицу 10x10 последовательными числами от 1 до 100 по спирали'.'<br>');

$n = 10;
$i = 1;
$p = $n / 2;
for ($k = 1;$k <= $p;$k++) {
    for ($j = $k - 1;$j < $n - $k + 1;$j++) {
        $mas[$k - 1][$j] = $i++; 
    }
    for ($j = $k;$j < $n - $k + 1;$j++) {
        $mas[$j][$n - $k] = $i++; 
    }
    for ($j = $n - $k - 1;$j >= $k - 1;$j--) {
        $mas[$n - $k][$j] = $i++; 
    }
    for ($j = $n - $k - 1;$j >= $k;$j--) {
        $mas[$j][$k - 1] = $i++; 
    }
}
?>

<a>Массив данных:</a>
<TABLE border=1>
<?php 
for ($i = 0; $i <= 9; $i++) { 
    
    echo ("<tr>"); 
    for ($k = 0; $k <= 9; $k++) { 
    echo ("<td align=center>");  
    echo ($mas[$i][$k]);
    echo ("</td>");
    }
    echo ("</tr>");
}
?>
</TABLE>
</BODY>
</HTML>