<?php
/**
 * If we list all the natural numbers below 10 that are multiples of 3 or 5, 
 * we get 3, 5, 6 and 9. The sum of these multiples is 23.
 *
 * Find the sum of all the multiples of 3 or 5 below 1000.
 */

// get limit from STD input
fscanf(STDIN, "%d\n", $limit);

if (!intval($limit)) {
	die('Please provide limit');
}

// this can be reconfigured
$include_multiples = array(3,5);

// init multipliers
$multipliers_flags = array();
foreach ($include_multiples as $m) {
	$multipliers_flags[$m] = 0;
}

$sum = 0;
for ($i = 0; $i < $limit; $i++) {
	// summ only those numbers that are multipliers
	foreach ($multipliers_flags as $m => $flag) {
		$multipliers_flags[$m]++;
		if ($multipliers_flags[$m] > $m) {
			$multipliers_flags[$m] = 1;
			$sum += $i;
			continue; // if numver is added then we don't need to add it one more time
		}
	}
}

fwrite(STDOUT, $sum);