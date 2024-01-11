<?php
$personmap = array();

function showperson($personid, &$personmap) {
	if (!array_key_exists("person_$personid", $personmap)) {
		$query="select persons.personid,fname,lname, phone from persons left join phones on persons.personid = phones.personid where persons.personid=?";
		$rs=sql_prep($query,$db,$personid);

		while ($myrow=sql_fetch_assoc($rs)) {
			$personid=$myrow['personid'];
			$fname=$myrow['fname'];
			$lname=$myrow['lname'];
			$phone=$myrow['phone'];
		
			if (array_key_exists("person_$personid", $personmap)) {
				array_push($personmap["person_$personid"]["phones"], $phone);
			}
			else {
				$personmap["person_$personid"] = array();
				$personmap["person_$personid"]["fname"] = $fname;
				$personmap["person_$personid"]["lname"] = $lname;
				$personmap["person_$personid"]["phones"] = array($phone);
			}
		}
	}
}

function showpersons(){
	//populate the personmap for all the persons

	$query="select personid from persons";
	$rs=sql_prep($query,$db);

	while ($myrow=sql_fetch_assoc($rs)) {
		$personid=$myrow['personid'];
        showperson($personid, $personmap)
	}
}

showperson(5, $personmap);
showperson(5, $personmap);