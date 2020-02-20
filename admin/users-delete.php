<?php 
include "include/session.php";
isset($_GET['id']) ? $_GET['id'] : 0;

$db_query = $conn->query("DELETE FROM users WHERE userId = ".$_GET['id']."");
if (!$db_query) {
	die($conn->error);
} else header('Location: users.php');


 ?>