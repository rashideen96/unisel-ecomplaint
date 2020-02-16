<?php 

include "../include/db.php";
if (isset($_POST['name'])) {
	$random_id = random_string(5);
	$db_query = $conn->query("INSERT INTO technician(role, staff_id, department, name, phone_number, email, password) VALUES('technician', 
		'$random_id',
		'".$_POST['department']."',
		'".$_POST['name']."',
		'".$_POST['phone_no']."',
		'".$_POST['email']."',
		'".$_POST['password']."'
		)");
	if (!$db_query) {
		die($conn->error);
		exit();
	} else echo "Technician successfully added!";
}

function random_string($length) {
	$key = '';
	$keys = array_merge(range(0, 9), range('a', 'z'));
	for ($i=0; $i < $length; $i++) { 
		$key .= $keys[array_rand($keys)];
	}
	return $key;
}



// print_r($_POST);
// print_r($random_id);

 ?>