<?php
$query="insert into recs(name,recdate) values (?,?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("si", $_GET['name'], time());
$stmt->execute();
