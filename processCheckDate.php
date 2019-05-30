<?php 
include "include/db.php";
if (isset($_POST['date'])) {
	$date = $_POST['date'];

	$sql = "SELECT tarikh FROM complaint_tbl WHERE tarikh='$date'";
	$qry = mysqli_query($conn, $sql);
	if ($qry) {
		//chek tarikh
		$check_date = mysqli_num_rows($qry);
		if ($check_date > 0) {
			echo "<span style='color:red'> Tarikh sudah di booking .</span>";
			echo "<script>$('#daftar').prop('disabled',true);</script>";
		} else {
			echo "<script>$('#daftar').prop('disabled',false);</script>";
		}
	}
}




 ?>