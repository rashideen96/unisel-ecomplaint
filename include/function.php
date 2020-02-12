<?php 
include('db.php');

function login($matric, $password, $location) {
	global $conn;

	$query = $conn->query("SELECT * FROM users WHERE matricNum='$matric' AND password='$password'");

	if ($query) {
            $count_user = $query->num_rows;

            if ($count_user == 0) {
                ?>
                <script type="text/javascript">
                    window.alert('Invalid username or password!');
                </script>
                
                <?php
            } else {
                while ($row = $query->fetch_assoc()) {

                    $_SESSION['id'] = $row['userId'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['staff_id'] = $row['staff_id'];

                    // header('Location:dashboard.php');
                    header('Location: '.$location);
                }
            }
        }
}

// function login_staff($staffid, $password, $location) {
// 	global $connection;

// 	$query = $connection->query("SELECT * FROM users WHERE matricNum='$staff_id' AND password='$password'");
// }


 ?>