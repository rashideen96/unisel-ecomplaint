<?php
ob_start();
session_start();

if (!isset($_SESSION['user'])) header('Location: login.php');
elseif (!$_SESSION['student']) header('Location: login.php');
// if (isset($_SESSION['id']) && $_SESSION['role'] == 'student' || $_SESSION['role'] == 'staff'){

// } else{
//   header('Location: login.php');
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
    <style type="text/css">
        .img_preview {
            height: 200px;
            width: 200px;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>

<!-- <div class="w3-center">
    <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="top-logo">
    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
</div>
<br> -->
<!-- <div class="w3-container">
    <div class="w3-bar w3-light-grey w3-border w3-card-2">
        <a href="dashboard.php" class="w3-bar-item w3-button w3-border-right w3-gray">Home</a>
        <a href="reg_complaint.php" class="w3-bar-item w3-button w3-border-right">Register Complaint</a>
        <a href="status_complaint.php" class="w3-bar-item w3-button w3-border-right">Status Complaint</a>
        <a href="help1.php" class="w3-bar-item w3-button w3-border-right">Bantuan</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-right w3-border-left">Logout</a>
    </div>
    <br>

</div> -->
<?php include('include/nav2.php'); ?>
<br>
<br>
<div class="container">
    <div class="row">

        <div class="col-lg-4">


            <h2>Selamat datang ke unisel ecomplaint</h2>

        </div>
        <div class="col-lg-8">

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
    

</div>
<?php require_once "include/footer.php"; ?>
</body>

</html>