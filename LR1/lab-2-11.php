<?php
echo ('Дано:' . '<br>');
$N = rand(0, 500);
echo ('N = ' . $N . '<br>');
echo ('Делители:' . '<br>');
for ($i=1; $i<=$N; $i++) {
    if ($N % $i == 0) {
        echo ($i . '<br>');
    }
}