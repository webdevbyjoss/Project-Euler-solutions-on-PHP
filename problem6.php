<?php
/**
 * The sum of the squares of the first ten natural numbers is,
 * 
 * 1^2 + 2^2 + ... + 10^2 = 385
 * 
 * The square of the sum of the first ten natural numbers is,
 * 
 * (1 + 2 + ... + 10)^2 = 55^2 = 3025
 * 
 * Hence the difference between the sum of the squares of the first ten natural numbers 
 * and the square of the sum is 3025 − 385 = 2640.
 * 
 * Find the difference between the sum of the squares of the first one hundred natural numbers 
 * and the square of the sum.
 */

// get limit from STD input
fscanf(STDIN, "%d\n", $limit);

if (!intval($limit)) {
	die('Please provide limit');
}

$sum = 0;
$square_sum = 0;

// go throught numbers and calculate regular and square sum
for ($i = 1; $i <= $limit; $i++) {
	$sum += $i;
	$square_sum += ($i * $i);
}

$diff = ($sum * $sum) - $square_sum;

fwrite(STDOUT, $diff);