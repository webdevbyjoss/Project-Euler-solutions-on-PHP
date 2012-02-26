<?php
/**
 * The prime factors of 13195 are 5, 7, 13 and 29.
 * 
 * What is the largest prime factor of the number 600851475143 ?
 * 
 * WARNING!! This will not work for PHP 32bit as we will be able to calculate numbers above 2147483646
 */

// get limit from STD input
fscanf(STDIN, "%d\n", $limit);

if (!intval($limit)) {
	die('Please provide number');
}

$numbers = array();

// sqrt( number ) 
$prime_numbers_limit = ceil(sqrt($limit));

// find all prime numbers from 2 to $prime_numbers_limit
// using eratosthenes sieve
$prime_numbers = array(2);
for ($i = 3; $i <= $prime_numbers_limit; $i+=2) { // we can skip non-even values as they are 100% dividible
	$is_prime = true;
	foreach ($prime_numbers as $pr_num) {
		if ($i % $pr_num === 0) {
			$is_prime = false;
		}
	}
	if ($is_prime) {
		$prime_numbers[] = $i;
	}
}

// search for all prime numbers as candidats for division
$prime_numbers = array_reverse($prime_numbers); // start from largest ones

$factor_numbers = array();
foreach ($prime_numbers as $pr_num) {
	if ($limit % $pr_num === 0) {
		$factor_numbers[] = $pr_num;
		$limit /= $pr_num;
	}
}

// output numbers
fwrite(STDOUT, implode(', ', $factor_numbers));