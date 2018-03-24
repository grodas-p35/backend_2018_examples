<?php
$a = 1;
$b = 1.01;
$i = 0;

$days = 365;
while($i < $days) {
	$a *= $b;
	$i++;
}

echo $a;