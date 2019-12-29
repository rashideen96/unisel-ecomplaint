<?php 

include('../include/db.php');

if (isset($_POST['userId'])) {

	$userId = $_POST['userId'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $matric_no = $_POST['matric_no'];
    $phone_no = $_POST['phone_no'];
    $fakulti = $_POST['fakulti'];
    $programme = $_POST['programme'];

    $db_query = $conn->query("UPDATE users SET name='$name', username='$username', email='$email', matricNum='$matric_no', phoneNum='$phone_no', faculty='$fakulti', programe='$programme' WHERE userId=$userId");
    if ($db_query) echo "Successfully updated!";
    else {
    	die($conn->connect_error);
    	exit();
    }

}
// print_r($_POST);

 ?>