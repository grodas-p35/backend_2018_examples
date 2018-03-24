<?php

function _called($name) {
  write_ln("$name called");
}

function foo() {
  _called(__FUNCTION__);
}

function bar() {
  _called(__FUNCTION__);
}

function baz(...$string) {
  print_r($string);
  _called(__FUNCTION__);
}

function sum(...$nums) {
  $sum = 0;
  foreach ($nums as $num) {
    $sum += $num;
  }
  
  array_push(1);
  $nums[] = 1;
  
  $sum = array_merge($arr1, $arr2);
  $sum = $arr1 + $arr2;
    
  
  write_ln($sum);
  
  write_ln(array_reduce($nums, function($carry, $item) {
    return $carry + $item;
  }, 0));
  _called(__FUNCTION__);
}

$test = 'foo';
$test();

$test = 'bar';
$test();

$test = 'baz';
$test('passed 1', 7, 5);

$test = 'sum';

call_user_func($test, '1212', '1223');