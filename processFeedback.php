<?php 

include "include/db.php";

if (isset($_POST['nama'])) {

	$nama = $_POST['nama'];
	$emel = $_POST['email'];
	$maklumBalas = $_POST['maklumbalas'];

	$sql = "INSERT INTO feedback_tbl(nama, email, maklumbalas) ";
	$sql.= "VALUES('$nama', '$emel', '$maklumBalas')";

	if (mysqli_query($conn, $sql)) {
		echo "Maklum Balas Berjaya Dihantar";
	} else {
		echo "Maklum Balas Gagal Dihantar, Sila Cuba Sekali Lagi";
	}
}

 ?>