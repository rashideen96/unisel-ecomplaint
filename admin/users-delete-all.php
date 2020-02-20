<?php 
include "include/session.php";

$db_query = $conn->query("DELETE FROM users");
if (!$db_query) {
	die($conn->error);
} else header('Location: users.php');


 ?>