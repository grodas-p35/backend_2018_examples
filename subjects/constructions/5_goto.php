<?php

$i = 4;
$factor = 3;
$minimum_limit = 35;

if ($i < 5) {
	goto not_big_enough;
}

$i *= $factor;
if ($i < $minimum_limit) {
	goto end;
}
goto ok;
	

not_big_enough:
	echo "i is not big enough";
	
ok:
	echo "i is ok";
	/* process i */

end:

?>