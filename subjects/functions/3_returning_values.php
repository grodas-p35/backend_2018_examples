<?php
declare(strict_types=1);
# get vars from array
function small_numbers(): array {
    return [0, 1.0, "2"];
}

list ($zero, , $two) = small_numbers();

var_dump($zero, $two);

#test return by reference
global $test_source;
$test_source = ['777'];

function &returns_reference() {
  global $test_source;

  return $test_source;
}

$newref =& returns_reference();

var_dump($test_source);
$newref[0] .= 358;

var_dump($test_source);

# return type declaration
function test_return_type($value) : int {
  return (int)$value;
}

try  {
  var_dump(test_return_type('125.694'));
} catch (Error $e) {
  echo $e->getMessage();
}