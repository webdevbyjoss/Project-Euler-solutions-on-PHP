<?php
/**
 * 2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.
 * 
 * What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?
 */

// configuration
$start = 1;
$end = 20;

// place numbers in reverse order to check from the greatest numbers 
$numbers = array_reverse(range($start, $end));

// round to closest even number
if ($end % 2 !== 0) {
	$end += 1;
}

// brute force starting from the lowest possible number	
for ($i = $end; $i < PHP_INT_MAX; $i += 2) { // select only even numbers
	foreach ($numbers as $num) {
		if (($i % $num) !== 0) {
			continue 2;
		}
	}
	break;
}

// output numbers
fwrite(STDOUT, $i);