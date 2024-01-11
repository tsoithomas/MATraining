<?php

$persons = array();

$query="select persons.personid,fname,lname, phone from persons left join phones on persons.personid = phones.personid";
$rs=sql_prep($query,$db);

while ($myrow=sql_fetch_assoc($rs)) {
    $personid=$myrow['personid'];
	$fname=$myrow['fname'];
	$lname=$myrow['lname'];
	$phone=$myrow['phone'];

	if (array_key_exists("person_$personid", $persons)) {
		array_push($persons["person_$personid"]["phones"], $phone);
	}
	else {
		$persons["person_$personid"] = array();
		$persons["person_$personid"]["fname"] = $fname;
		$persons["person_$personid"]["lname"] = $lname;
		$persons["person_$personid"]["phones"] = array($phone);
	}
}