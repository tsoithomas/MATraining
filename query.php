<?php
$query="insert into recs(name,recdate) values (?,?)";
$rs=sql_prep($query,$db,array($_GET['name'], time()));