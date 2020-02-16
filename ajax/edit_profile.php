<?php 

include('../include/db.php');

if (isset($_POST['userId'])) {

	$userId = $_POST['userId'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $matric_no = $_POST['matric_no'];
    $phone_no = $_POST['phone_no'];
    $fakulti = $_POST['fakulti'];
    $programme = $_POST['programme'];

    // Get user old password
    $dbq = $conn->query("SELECT password FROM users WHERE userId=$userId");
    $dbr = $dbq->fetch_assoc();

    if (empty($_POST['password'])) {


        $old_pass = $dbr['password'];
        $db_query = $conn->query("UPDATE users SET 
            name      ='$name', 
            username  ='$username', 
            email     ='$email', 
            password  ='$old_pass',
            matricNum ='$matric_no', 
            phoneNum  ='$phone_no', 
            faculty   ='$fakulti', 
            programe  ='$programme' 
            WHERE userId=$userId");

        if ($db_query) echo "Successfully updated!";
        else {
            die($conn->error);
            exit();
        }

    } else {
        if (password_verify($_POST['password'], $dbr['password'])) {

            // encrypt password
            $new_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $db_query = $conn->query("UPDATE users SET 
                name     ='$name', 
                username ='$username', 
                email    ='$email', 
                password ='$new_pass',
                matricNum='$matric_no', 
                phoneNum ='$phone_no', 
                faculty  ='$fakulti', 
                programe ='$programme' 
                WHERE userId=$userId");
            if ($db_query) echo "Successfully updated!";
            else {
                die($conn->error);
                exit();
            }
        } else echo 'Invalid Password.';
    }

    
}
// print_r($_POST);

 ?>