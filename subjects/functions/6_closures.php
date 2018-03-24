<?php

function print_callable_result(callable $func, string $title = '') {
  write_ln(call_user_func_array($func, [35, 50]), $title);
}

print_callable_result(function($a, $b) {
  return $a + $b;
}, 'Add');


$extract = function ($a, $b) {
  return $a - $b;
};

write_ln($extract(10, 3));

print_callable_result($extract, 'Extract');

$accumulator = [];

print_callable_result(function ($a, $b) use (&$accumulator, $extract) {
  $accumulator = compact('a', 'b');
  
  return $extract($a, $b);
}, 'Accumulate closure');

write_ln($accumulator);