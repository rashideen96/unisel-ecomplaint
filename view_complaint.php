<?php
ob_start();
session_start();

include "include/db.php";

// if (!isset($_SESSION['id']) && $_SESSION['role'] !== 'student' || $_SESSION['role'] !== 'staff') {
//     header('Location: login.php');
// }

if (!isset($_SESSION['id'])) header('Location: login.php');
elseif (!$_SESSION['role'] == 'student' || !$_SESSION['role'] == 'staff') header('Location: login.php');




// $complainer_id = $_SESSION['id'];
$complainer_id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

$complaint_id = isset($_GET['id']) ? $_GET['id'] : '';

// if (isset($_GET['id'])) {
// 	$complaint_id = $_GET['id'];

// 	// $sql = "SELECT * FROM complaint_tbl WHERE id=$complaint_id AND complainer_id=$complainer_id LIMIT 1";
// 	// $ext = mysqli_query($conn, $sql);
//     if ($conn->query("SELECT * FROM complaint_tbl WHERE id=$complaint_id AND complainer_id=$complainer_id LIMIT 1")) 

	
// } else {
//     $complaint_id = '';
// }

if (isset($_POST['send'])) {
	$mesej = $_POST['mesej'];

	$sql = "INSERT INTO message_tbl(complaint_id, mesej) VALUES($complaint_id, '$mesej')";
	if (mysqli_query($conn, $sql)) {
		header("Location: view_complaint.php?id=$complaint_id");
	} else {
		die(mysqli_error($conn));
        exit();
	}

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dataTables.min.css">

    <title>View Complaint</title>
</head>
<body>
<div class="w3-center">
    <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="top-logo">
    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
</div>
<br>
<div class="w3-container">
    <div class="w3-bar w3-light-grey w3-border w3-card-2">
        <a href="dashboard.php" class="w3-bar-item w3-button w3-border-right">Home</a>
        <a href="reg_complaint.php" class="w3-bar-item w3-button w3-border-right">Register Complaint</a>
        <a href="status_complaint.php" class="w3-bar-item w3-button w3-border-right w3-gray">Status Complaint</a>
        <a href="help1.php" class="w3-bar-item w3-button w3-border-right">Bantuan</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-right w3-border-left">Logout</a>
    </div>
    <br>

</div>
<div class="w3-container">
    <div class="w3-cell-row">

        <div class="w3-container w3-cell">

        	<a href="status_complaint.php" class="w3-button w3-border w3-light-gray">< Back</a><br><br>
        	<?php 

            $db_query = $conn->query("SELECT * FROM complaint_tbl WHERE id=$complaint_id AND complainer_id=$complainer_id LIMIT 1");

            if ($db_query) {
                if ($db_query->num_rows == 0) echo "<h4>Data tidak wujud</h4>";
                else while ($db_row = $db_query->fetch_assoc()) { ?>
                   
                    <table class="w3-table w3-border">
                            <tbody>
                                <tr>
                                    <th>No.</th>
                                    <td><?= $db_row['id'] ?></td>
                                    <th>No Bilik</th>
                                    <td><?= $db_row['no_bilik'] ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Complaint</th>
                                    <td><?= $db_row['jenis_complaint'] ?></td>
                                    <th>Status</th>
                                    <?php 
                                    if ($db_row['status'] == 'Pending') echo "<td class=\"w3-red\">{$db_row['status']}</td>";
                                    elseif($db_row['status'] == 'KIV') echo "<td class=\"w3-blue\">{$db_row['status']}</td>";
                                    else echo "<td class=\"w3-green\">{$db_row['status']}</td>";

                                     ?>
                                    
                                </tr>
                                <tr>
                                    <th>Detail</th>
                                    <td colspan="3"><?= $db_row['detail'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tarikh</th>
                                    <td><?= $db_row['tarikh'] ?></td>
                                    <th>Masa</th>
                                    <td><?= $db_row['masa'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                   <?php
                }
            } else {
                die($conn->connect_error);
                exit();
            }

        	 ?>

          <p>comment: </p>
            <table class="w3-table w3-border">
                <tbody>
                	<?php 

                    $db_query = "SELECT * 
                                 FROM message_tbl 
                                 WHERE complaint_id=$complaint_id";
                    $db_exec = $conn->query($db_query);             


                    if ($db_exec) {
                        while ($db_row = $db_exec->fetch_assoc()) {
                            $mesej = $db_row['mesej'];
                            ?>
                            <tr>
                                <th width="20%">user: </th>
                                <th><?= $mesej ?></th>
                            </tr>
                            <?php
                            
                        }
                    }

                	// $sql = "SELECT * FROM message_tbl WHERE complaint_id=$complaint_id";
                	// $ext = mysqli_query($conn, $sql);

                // 	if ($ext) {
                // 		while ($row = mysqli_fetch_assoc($ext)) {
                // 			$mesej = $row['mesej'];

                // 			echo "<tr>";
                // 			echo "<th width=\"20%\">user: </th>";       
				            // echo "<td>{$mesej}</td>";
				            // echo "</tr>";
                // 		}
                // 	}
                	 ?>
                
               
                <tr>
                    <td colspan="2">
                        <form action="" method="post">
                        <input type="text" class="w3-input w3-border" placeholder="Mesej" name="mesej" required>
                        <input type="submit" class="w3-button w3-light-gray" value="Hantar" name="send">
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="w3-container w3-cell" style="width: 200px;">

            <ul class="w3-ul">
                <li><a href="#"><img src="https://cdn1.iconfinder.com/data/icons/seo-internet-marketing-4-3/64/x-01-2-512.png" width="30px" height="30px" alt="">Edit</a></li>
                
            </ul>

        </div>
    </div>


    <br>
    <?php require_once "include/footer.php"; ?>

</div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/dataTables.min.js"></script>


</html>