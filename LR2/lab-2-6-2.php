<title>Пупков Егор Андреевич</title>

<?php

$a = rand(-10, 10);
$b = rand(-10, 10);
echo('a = '.$a.'<br>'.'b = '.$b.'<br>');

$a1 = $a;
$a2 = pow($a, 2);

$b1 = $b;
$b2 = $a + $b;

$u = array($a1, $a2);
$t = array($b1, $b2);

for ($i = 0; $i <= 1; $i++) {
    if ($u < -2) $f[$i] = 2 * $u[$i];
    else if ($u >= -2 and $u <= 2) $f[$i] = sin(pow($u, 3)) + log($t[$i]);
    else $f[$i] = pow(pow(cos($u[$i]), 2) + pow(sin(pow($t[$i], 3)), 4), 0.25);
    $f[$i] = round($f[$i], 2);
}

echo ('f(a, b) = '.$f[0].'<br>');
echo ('f((a^2), a + b) = '.$f[1].'<br>');

$sum = log($f[0]) + $f[1];
echo('Значение функции равно '.$sum.'<br>');

?>