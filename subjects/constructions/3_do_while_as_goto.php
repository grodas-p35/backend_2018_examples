<?php

$i = 4;
$factor = 3;
$minimum_limit = 35;

do {
    if ($i < 5) {
        echo "i is not big enough";
        break;
    }
    $i *= $factor;
    if ($i < $minimum_limit) {
        break;
    }
    echo "i is ok";

    /* process i */

} while (0);
?>