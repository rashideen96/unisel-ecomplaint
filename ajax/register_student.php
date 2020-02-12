<?php 
include('../include/db.php');

// print_r($_POST);
if (isset($_POST['no_matrik'])) {
	// print_r($_POST);
	function sanitize($array) {
		global $conn;
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				sanitize($value);
			} else $array[$key] = $conn->real_escape_string($value);
		}
		return $array;
	}

	// $array = [
	// 	'no_matrik' => $_POST['no_matrik'],
	//     [name] => dsadasdas
	//     [emel] => sadbask@1122
	//     [no_telefon] => 342453254566
	//     [fakulti] => Faculty Communication Visual Arts & Computing
	//     [aliran] => sdadsadas
	//     [password] => 111
	//     [password2] => 111
	// ]

	$no_matrik = $_POST['no_matrik'];
	$name = $_POST['name'];
	$emel = $_POST['emel'];
	$no_telefon = $_POST['no_telefon'];
	$fakulti = $_POST['fakulti'];
	$aliran = $_POST['aliran'];

	// encrypt password
	$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$sql_query = $conn->query("INSERT INTO users(role, name, username, email, password, matricNum, phoneNum, faculty, programe ) VALUES('student', '$name', '$name', '$emel', '$hashedPassword', '$no_matrik', '$no_telefon', '$fakulti', '$aliran')");

	if (!$sql_query) {
		die($conn->connect_error);
		exit();
	} else echo "successfully registered!";
	

	// $stmt = $conn->prepare("INSERT INTO users VALUES(?,?,?,?,?,?,?)");
	// $stmt->bind_param("sssssss", $date);

	// $stmt->execute();
	// $result = $stmt->get_result();
	// // if ($result->num_rows === 0) exit('No rows');
	// if ($result->num_rows === 0) {
	// 	echo "<script>$('#daftar').prop('disabled',false);</script>";
	// } else {
	// 	echo "<span style='color:red'> Tarikh sudah di booking .</span>";
	// 	echo "<script>$('#daftar').prop('disabled',true);</script>";
	// }
	// $stmt->close();
	// $conn->close();

	// if ($conn->query("INSERT INTO users VALUES('$_POST[""]')")) {

	// }

	// $_POST = sanitize($_POST);
	// print_r($_POST);

}



 ?>