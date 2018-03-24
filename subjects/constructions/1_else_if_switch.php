<?php
$action = 'do_something_else';
$modifier = 'specific_action';
$a = 0;

if ($modifier == 'add_extra_value') {
	$init_value = 35;
} else {
	$init_value = 0;
}

if ($modifier == 'add_extra_value') $add_extra_data = true;
else $add_extra_data = false;

if ($add_extra_data) {
	$a += 10;
}



if ($action == 'divide') {
	$a /= $init_value;
} elseif ($action == 'multiply') {
	$a *= $init_value;
} elseif ($action == 'extract') {
	$a -= $init_value;
} else {//add by default
	$a += $init_value;
}

echo $a;

/*
switch($action) {
	case 'divide':
		$a /= $init_value;
		break;
	case 'multiply':
		$a *= $init_value;
		break;
	case 'extract':
		$a -= $init_value;
		break;
	case 'add':
	default:
		$a += $init_value;
		break;
}
*/