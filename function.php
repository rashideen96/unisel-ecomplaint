<?php 

include('include/db.php');
function add_dash($string){
	return implode("-", str_split($string, 2));
}

function ref_num($location){
	global $conn;

	// SA00001
	$sql = "SELECT * FROM users";
	if (mysqli_query($conn, $sql)) {
		
		$count_user = mysqli_query($conn, $sql);

		($count_user < 10000) ? $count_user.'0000' : $count_user;

		return $location . $count_user;
	}
}






 ?>