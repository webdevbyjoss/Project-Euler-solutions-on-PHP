<?php
/**
 * By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.
 * 
 * What is the 10 001st prime number?
 */

// get limit from STD input
fscanf(STDIN, "%d\n", $position);

if (!intval($position)) {
	die('Please provide prime number position');
}

// find all prime numbers from 2 to maximum available
// using eratosthenes sieve
$prime_numbers = array(3);
for ($i = 3; $i <= PHP_INT_MAX; $i+=2) { // we can skip non-even values as they are 100% dividible by 2
	$is_prime = true;
	foreach ($prime_numbers as $pr_num) {
		if ($i % $pr_num === 0) {
			$is_prime = false;
		}
	}
	if ($is_prime) {
		$prime_numbers[] = $i;
	}
	
	// check the amount of primes we already have
	// so if we've calculated the one we need we can break
	if ((count($prime_numbers)+1) == $position) { // we skipped "2" number to save CPU cycles but need to add it here
		break;
	}
}

fwrite(STDOUT, $i);