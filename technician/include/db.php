<?php


$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ecomplaint';

// New db connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
	die($conn->connect_error);
	exit();
}

?>