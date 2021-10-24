<?php
	const NUM_E = 2.71828;
	echo ('Число е равно ' . NUM_E . '<br>');
	$num_e1 = NUM_E;
	echo ('$num_e1 = ' . $num_e1 . ' - ' . gettype($num_e1) . '<br>');
	settype($num_e1, "string");
	echo ('$num_e1 = ' . $num_e1 . ' - ' . gettype($num_e1) . '<br>');
	settype($num_e1, "integer");
	echo ('$num_e1 = ' . $num_e1 . ' - ' . gettype($num_e1) . '<br>');
	settype($num_e1, "boolean");
	echo ('$num_e1 = ' . $num_e1 . ' - ' . gettype($num_e1) . '<br>');
?>
	