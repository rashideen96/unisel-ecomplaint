<?php 
include "../include/db.php";
if (isset($_POST['date'])) {

	$date = $conn->real_escape_string($_POST['date']);
	$stmt = $conn->prepare("SELECT available_date FROM complaints WHERE available_date=?");
	$stmt->bind_param("s", $date);

	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows === 0) echo "<script>$('#daftar').prop('disabled',false);</script>";
	else {
		echo "<span style='color:red'> Tarikh sudah di booking .</span>";
		echo "<script>$('#daftar').prop('disabled',true);</script>";
	}
	$stmt->close();
	$conn->close();
}




 ?>