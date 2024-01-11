<?php

if ($argc != 2)
	die("Incorrect number of arguments.\n");

$path = $argv[1];

$fh = fopen($path, "r") or die("Incorrect file name.\n");

while (($line = fgets($fh)) !== false) {
	$uppercaseCount = preg_match_all('/\p{Lu}/u', $line);
	echo $uppercaseCount . "\n";
}

fclose($fh);