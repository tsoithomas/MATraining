<?php

if ($argc != 2)
	die("Incorrect number of arguments.");

$path = $argv[1];

$fh = fopen($path, "r") or die("Unable to open file!");


$capcount = 0;
while(!feof($fh)) {
	$data = fread($fh, 8192);
	for ($i=0; $i<strlen($data); $i++) {
		$ch = $data[$i];
		if ($ch == "\n") {
			echo "$capcount\n";
			$capcount = 0;
		}
		elseif (mb_strtolower($ch) != $ch)
			$capcount++;
	}
	//echo $data;
}


fclose($fh);