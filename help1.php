<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role'] == 'student' || $_SESSION['role'] == 'staff'){

} else{
  header('Location: login.php');
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
    <title>Bantuan</title>
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
        <a href="status_complaint.php" class="w3-bar-item w3-button w3-border-right">Status Complaint</a>
        <a href="help1.php" class="w3-bar-item w3-button w3-border-right  w3-gray">Bantuan</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-right w3-border-left">Logout</a>
    </div>
    <br>

</div>
<div class="w3-container">
    <div class="w3-cell-row">
        <div class="w3-container w3-light-grey w3-cell" style="width: 200px;">
            <h4>Pautan</h4>
            <hr>
            <ul class="w3-ul">
                <li><a href="#">CICT</a></li>
                <li><a href="#">CVAC</a></li>
            </ul>
        </div>
        <div class="w3-container w3-cell">


            <table class="w3-table w3-border">
                <thead>
                <tr>
                    <th colspan="2" class="w3-center w3-light-gray">Contact</th>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <th>No Tel</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>CICT</td>
                    <td>222-222-222</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>


    <br>
    <?php require_once "include/footer.php"; ?>

</div>
</body>

</html>