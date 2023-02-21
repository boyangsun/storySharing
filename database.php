<?php

$mysqli = new mysqli('localhost', 'm3', 'module3', 'module3');

if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>