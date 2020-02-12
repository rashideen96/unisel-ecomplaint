<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ecomplaint');

// $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// if (!$connection) {
// 	// echo 'connected to database '. DB_NAME;
// 	die('failed to connect to database'.$connection->error);
// 	exit();
// } else {
// 	// echo 'connected';
// }

// create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// check connection
if ($conn->connect_error) {
	die("connection failed: " . $conn->connect_error);
}

?>