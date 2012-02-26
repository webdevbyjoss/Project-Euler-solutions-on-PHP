<?php
/**
 * A palindromic number reads the same both ways. The largest palindrome made from 
 * the product of two 2-digit numbers is 9009 = 91 × 99.
 * 
 * Find the largest palindrome made from the product of two 3-digit numbers.
 */

// configuration
$num_of_digints = 3;

// calculare the range
$start = pow(10, $num_of_digints - 1); 
$end = pow(10, $num_of_digints) - 1;

// detect if number is palindrome
function is_palindrome($number) {
	
	// cast int to string
	$number = (string)$number;
	
	// small optimization
	// if number can't be divided into two parts
	// then its not palindrome for sure
	if (strlen($number) % 2 !== 0) {
		return false;
	}

	// check if number reads in the same way when reversed
	// can be optimized to revers and compare only half of the string 
	if ($number === strrev($number)) {
		return true;
	}
	
	return false;
}

// lets move down and brute force
$palindrome = 0;
for ($i = $end; $i >= $start; $i--) {
	
	for ($j = $end; $j >= $i; $j--) {
		
		$palindrome_tmp = $i * $j;
		if (is_palindrome($palindrome_tmp)) {
			$palindrome = $palindrome_tmp;
			break 2;
		}
	}
}

// output numbers
fwrite(STDOUT, $palindrome);