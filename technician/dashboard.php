<?php

session_start();
include 'include/db.php';

$msg = '';
if (isset($_POST['login'])){
    $no_matric = mysqli_real_escape_string($conn, trim($_POST['no_matric']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    $query = mysqli_query($conn, "SELECT * FROM users WHERE matricNum='$no_matric' AND password='$password'");
    $count_user = mysqli_num_rows($query);

    if ($count_user == 0){
        $msg = "Incorrect username or password!";
    } else {
        $query = mysqli_query($conn, "SELECT * FROM users WHERE matricNum='$no_matric' AND password='$password'");
        while ($row = mysqli_fetch_assoc($query)){
            $_SESSION['id'] = $row['userId'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['staff_id'] = $row['staff_id'];

            header('Location:dashboard.php');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <title>login</title>
</head>

<body>

<div class="w3-center">

    <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="top-logo">
    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
</div>
<br>

<div class="w3-container">
    <div class="w3-bar w3-light-grey w3-card-2">
        <a href="dashboard.php" class="w3-bar-item w3-button w3-border-right">Home</a>
        <a href="complaint_list.php" class="w3-bar-item w3-button w3-border-right">Senarai Aduan</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-right w3-border-left">Logout</a>
    </div>
    <br>

</div>
<div class="w3-container">
    <div class="w3-cell-row">

        <div class="w3-container w3-cell">


            <h2>Selamat datang ke unisel ecomplaint</h2>

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



</html>