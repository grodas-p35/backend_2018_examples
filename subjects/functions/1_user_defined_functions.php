<?php

#1 function defining
function add ($a, $b) {
  return $a + $b;
}

?>
Execution result of add: <?= add(3 + 5) ?>
<br>
<?php


function possible_exist() {
  return 'first possible exist';
}



if (!function_exists('possible_exist')) {
  function possible_exist() {
    return 'second possible exist';
  }
}

global $makefoo;
$makefoo = false;

function fooo() {
  global $makefoo;
  if ($makefoo === true) {
    return 'foo';
  }
}


/*
function possible_exist() {
  return 'error possible exist';
}
/**/
?>
Test possible exist function: <?= possible_exist(); ?> <?= fooo(); ?>
<br>

<?php
# within function. NOT RECOMMEND TO USE IN REAL CODE!!!

function foo() 
{
  echo 'foo<br>';
  function bar() 
  {
    echo "bar<br>";
  }
}
?>
Test within function:

<?php
//not defined here
//bar();
foo();

//Now bar is defined
bar();

# recursion
function factorial($n, $i = 1, $carry = 1) {
  $carry *= $i;

  if ($n > $i) {
    $carry = factorial($n, ++$i, $carry);
  }

  return $carry;
}
?>
Test recursion on factorial example: <?= factorial(3) ?>
<br>
<?php