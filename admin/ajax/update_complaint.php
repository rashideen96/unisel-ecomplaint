<?php 
include "../include/db.php";
if (isset($_POST['status'])) {

	// $status = $_POST['status'];

	empty($_POST['status']) ? 0 : $_POST['status'];

	// $complaint_id = $_POST['complaint_id'];
	// $technician = $_POST['technician'];

	$db_query = $conn->query("UPDATE complaints SET 
		status_id= '".$_POST['status']."',
		comment = '".$_POST['comment']."',
		technician_id = '".$_POST['technician']."'
		WHERE id= ".$_POST['complaint_id']."");
	if (!$db_query) {
		die($conn->error);
		exit();
	} else echo "Data berjaya dikemaskini";

}

// print_r($_POST);
 ?>