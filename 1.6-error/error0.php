<?php
$a = null;
try {
	$a = 5/0;
	echo $a, PHP_EOL;
} catch (exception $e) {
	$e->getMessage();
	$a = -1;
}