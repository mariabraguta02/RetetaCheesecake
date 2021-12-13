<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "contacte";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn) {
	echo 'Connection Failed.';
}

?> 