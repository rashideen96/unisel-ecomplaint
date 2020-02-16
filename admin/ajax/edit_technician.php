<?php 

include "../include/db.php";
if (isset($_POST['tid'])) {
	$db_query = $conn->query("UPDATE technician SET 
		name = '".$_POST['name']."',
		department = '".$_POST['department']."',
		phone_number = '".$_POST['phone_no']."',
		email = '".$_POST['email']."',
		password = '".$_POST['password']."' WHERE id = ".$_POST['tid']."");

	if (!$db_query) {
		die($conn->error);
		exit();
	} else echo "Successfully updated ".$_POST['name'];
}
// print_r($_POST);


 ?>