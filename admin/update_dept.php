<?php 
session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] == 'admin'){

} else{
  header('Location: index.php');
}
include "include/db.php";
if (isset($_GET['id'])) {
	$complaint_id = $_GET['id'];
	$dept = $_GET['dept'];
	$status = $_GET['status'];

	$update_sql = mysqli_query($conn, "UPDATE complaint_tbl SET technician_id=$dept WHERE id=$complaint_id");
	if ($update_sql) {
		header('Location: complaint_detail.php?id='.$complaint_id);
	}
}



 ?>