<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role'] == 'student' || $_SESSION['role'] == 'staff'){

} else{
    header('Location: login.php');
}

include "include/db.php";

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

    <title>Status Complaint</title>
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

            <table class="w3-table w3-bordered" id="myTable">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Complaint Type</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    <?php 

                    $complainer_id = $_SESSION['id'];
                    $sql = "SELECT id, jenis_complaint FROM complaint_tbl WHERE complainer_id = $complainer_id";
                    $run_query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($run_query)) {
                        
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['jenis_complaint']}</td>";
                        echo "<td><a class=\"color\" href=\"view_complaint.php?id={$row['id']}\">pending</a></td>";
                        echo "</tr>";
                    }
                     ?>
                
                </tbody>
            </table>
        </div>
        <div class="w3-container w3-cell" style="width: 200px;">

            <ul class="w3-ul">
                <li><a href="#"><img
                            src="https://cdn1.iconfinder.com/data/icons/seo-internet-marketing-4-3/64/x-01-2-512.png"
                            width="30px" height="30px" alt="">Maklum Balas</a></li>
                <li><a href="#"><img src="https://static.thenounproject.com/png/461886-200.png" alt="" width="30px"
                                     height="30px">Manual</a></li>
            </ul>

        </div>
    </div>


    <br>
    <?php require_once "include/footer.php"; ?>

</div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    });
</script>
<style>
    .color {
        color: red;
    }
</style>
</html>