<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "inregistrare";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn) {
	echo 'Connection Failed.';
}

?> 