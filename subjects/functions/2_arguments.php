<?php

//declare(strict_types=1);

#passing reference to function
function test_reference($target, $value, &$length = '') {
  $value .= ' changed';
  $length = strlen($value);
  $target[] = $value;
}
?>
Test reference:
<br>
<?php
$source = ['old_value', 'another_value'];
$new_value = 'new_value';



write_ln('before call');
write_ln($source, '$source');
write_ln($new_value, '$new_value');

call_user_func_array('test_reference', [$source, $new_value, &$length]);
//test_reference($source, $new_value, $length);

write_ln('after call');
write_ln($source, '$source');
write_ln($new_value, '$new_value');
write_ln($length, '$length');

#default arguments test
function test_default_argument($type = 'default', &$items = [1, 2]) {
  $count = count($items);
  
  $items[] = 3;
  
  return "You put $count element of type $type";
}

$arr = [
  'foo' => 'bar'
]


?>
<br>
Test default value: <br>
No arguments: <?= test_default_argument() ?><br>
Type "provided": <?= test_default_argument('provided'); ?><br>
<?php 
  $our_items = [5, 4, 6];
  write_ln(test_default_argument('default', $our_items));
  write_ln($our_items, 'Our reference');
  write_ln($arr['foo'], 'arr.foo');
unset($arr['foo']);
var_dump($arr['foo']);


# Types of arguments
/**
 * @link http://php.net/manual/ru/functions.arguments.php#functions.arguments.type-declaration
 */

function echo_count(array $arr) {
  write_ln(count($arr));
}

echo_count(['', '', '']);

# Test strict types

function sum(float $a, int $b) {
    return $a + $b;
}
?>
<br>
Test typecasted param: <br>
<?php 
try {
  $i = (int)1.9;
  var_dump($i);
    var_dump(sum(1, 2));
    var_dump(sum(1.9, 2.9));
} catch (TypeError $e) {
    echo 'Error: '.$e->getMessage();
}





# ... spread operator
?>
<br>
<br>
Test spread operator: <br>
<?php 

var_dump(sum(...[3,5]));

var_dump(sum(3,5));

