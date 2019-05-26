<?php 
include "include/db.php";
if (isset($_POST['no_matrik'])) {

	$role = 'student';
	$no_matrik = $_POST['no_matrik'];
	$name = $_POST['name'];
	$emel = $_POST['emel'];
	$no_telefon = $_POST['no_telefon'];
	$no_matrik = $_POST['no_matrik'];
	$fakulti = $_POST['fakulti'];
	$aliran = $_POST['aliran'];
	$password = $_POST['password'];

	// check matrik kad 
	$matrik_query = mysqli_query($conn, "SELECT matric_no FROM matric_tbl WHERE matric_no = '$no_matrik'");

	if ($matrik_query) {
		$chek_matrik = mysqli_num_rows($matrik_query);

		if ($chek_matrik == 0) {
			echo "Matrik Kad Tiada Dalam Database Kami, Sila Rujuk Residen";
		} else {
			// check email
			$query = "SELECT email FROM users WHERE email='$emel'";
			$run_sql = mysqli_query($conn, $query);

			if ($run_sql) {
				$email_count = mysqli_num_rows($run_sql);
				if ($email_count == 0) {
					// set lokasi berdasarkan fakulti
					// fcvac, fels, fess, foundation = BJ (Bestari Jaya)/ fba = SA (Shah Alam)
					if ($fakulti == 'Faculty Communication Visual Arts & Computing' || $fakulti == 'Faculty Engineering & Life Science' || $fakulti == 'Faculty Education & Science Social' || $fakulti == 'Center of Foundation') {
						$lokasi = 'BJ';
					} else {
						$lokasi = 'SA';
					}

					$sql = "INSERT INTO users(role, name, username, email, password, icNum, matricNum, phoneNum, faculty, location, programe) ";
					$sql.= "VALUES('$role', '$name', '$name', '$emel', '$password', '32223334', '$no_matrik', '$no_telefon', '$fakulti', '$lokasi', '$aliran')";

					if (mysqli_query($conn, $sql)) {
						echo "Anda Telah didaftarkan, Sila Login";
					} else {
						echo "Query Failed!".mysqli_error($conn);
					}
					
				} else {
					echo "Email sudah diambil, Sila guna email lain";
				}
			}
		}
	} else {
		echo mysqli_error($conn);
	}
	
	

}else {
	echo "Error";
}



 ?>