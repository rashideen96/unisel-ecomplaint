<?php 
include "include/session.php";
isset($_GET['tid']) ? $_GET['tid'] : 0;

$db_query = $conn->query("DELETE FROM technician WHERE id = ".$_GET['tid']."");
if (!$db_query) {
	die($conn->error);
} else header('Location: technician.php');


 ?>