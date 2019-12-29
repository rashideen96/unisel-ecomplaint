<?php 
include "../include/db.php";
if (isset($_POST['date'])) {

	$date = $conn->real_escape_string($_POST['date']);
	// $date = $_POST['date'];
	$stmt = $conn->prepare("SELECT tarikh FROM complaint_tbl WHERE tarikh=?");
	$stmt->bind_param("s", $date);

	$stmt->execute();
	$result = $stmt->get_result();
	// if ($result->num_rows === 0) exit('No rows');
	if ($result->num_rows === 0) {
		echo "<script>$('#daftar').prop('disabled',false);</script>";
	} else {
		echo "<span style='color:red'> Tarikh sudah di booking .</span>";
		echo "<script>$('#daftar').prop('disabled',true);</script>";
	}
	$stmt->close();
	$conn->close();


	// $sql = "SELECT tarikh FROM complaint_tbl WHERE tarikh='$date'";
	// $qry = mysqli_query($conn, $sql);
	// if ($qry) {
	// 	//chek tarikh
	// 	$check_date = mysqli_num_rows($qry);
	// 	if ($check_date > 0) {
	// 		echo "<span style='color:red'> Tarikh sudah di booking .</span>";
	// 		echo "<script>$('#daftar').prop('disabled',true);</script>";
	// 	} else {
	// 		echo "<script>$('#daftar').prop('disabled',false);</script>";
	// 	}
	// }
}




 ?>