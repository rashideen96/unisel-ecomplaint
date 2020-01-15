<?php 
include "../include/db.php";
if (isset($_POST['status'])) {

	$status = $_POST['status'];
	$complaint_id = $_POST['complaint_id'];

	$db_query = $conn->query("UPDATE complaint_tbl SET status='$status' WHERE id=$complaint_id");
	if (!$db_query) {
		die($conn->error);
		exit();
	} else echo "Data berjaya dikemaskini";

}

// print_r($_POST);
 ?>