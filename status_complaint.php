<?php
ob_start();
session_start();


include "include/db.php";
if (!isset($_SESSION['user'])) header('Location: login.php');
elseif (!$_SESSION['student']) header('Location: login.php');
// if (isset($_SESSION['id']) && $_SESSION['role'] == 'student' || $_SESSION['role'] == 'staff'){

// } else{
//     header('Location: login.php');
// }



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css"> -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/dataTables.min.css">
    <style type="text/css">
        .img_preview {
            height: 200px;
            width: 200px;
        }
    </style>

    <title>Status Complaint</title>
</head>
<body>
<?php include('include/nav2.php'); ?>
<br>
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-4">
            <h2>Status Complaint</h2>
        </div>
        <div class="col-lg-8">
            
            <h2 id="compId"></h2>
            <table class="table table-bordered table-hovered" id="myTable">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Complaint Type</th>
                    <th>Status</th>
                    <th>View</th>
                </tr>
                </thead>
                <tbody>
                    <?php 

                    // print_r($_SESSION['user']);

                    $complainer_id = $_SESSION['user']['userId'];
                    $run_query = $conn->query("SELECT id, jenis_complaint, status FROM complaint_tbl WHERE complainer_id = $complainer_id");

                    while ($db_row = $run_query->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $db_row['id'] ?></td>
                            <td><?= $db_row['jenis_complaint']; ?></td>
                            <td><?= $db_row['status']; ?></td>
                            <td><a href="view_complaint.php?compid=<?= $db_row['id']; ?>">View</a></td>
                        </tr>

                        <?php
                    }
                     ?>
                
                </tbody>
            </table>
        </div>
        
    </div>


    <br>
    

</div>
<?php require_once "include/footer.php"; ?>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/dataTables.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function (){
        $(document).ready( function () {
            $('#myTable').DataTable();
        });

        // $.ajax({
        //     url: "ajax/status_complaint.php",
        //     method: "POST",
        //     data: 6,
        //     success: function(data) {
        //         console.log(data);
        //         // $('#compId').innerHTML = data;
        //     },
        //     error: function(err) {
        //         console.log(err);
        //     }
        // })
    });
</script>
<style>
    .color {
        color: red;
    }
</style>
</html>