<?php

ob_start();
session_start();
// include 'include/db.php';
// include('include/function.php');
include('include/db.php');

$msg = '';
if (isset($_POST['login'])){
    // $no_matric = mysqli_real_escape_string($conn, trim($_POST['no_matric']));
    // $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    // OOP method
    $no_matric = $conn->real_escape_string(trim($_POST['no_matric']));
    $password  = $conn->real_escape_string(trim($_POST['password']));

    // $query = mysqli_query($conn, "SELECT * FROM users WHERE matricNum='$no_matric' AND password='$password'");
    // $count_user = mysqli_num_rows($query);

    $validateMatric = $conn->query("SELECT * FROM users WHERE matricNum='$no_matric'");
    if ($validateMatric->num_rows == 0) $msg = "No matrik tidak dijumpai!";
    else {
        $db_row = $validateMatric->fetch_assoc();
        if (password_verify($password, $db_row['password'])) {
            // echo 'Valid Password'; 
            $_SESSION['user'] = $db_row;
            $_SESSION['student'] = true;
            header('Location: dashboard.php');
        } else $msg = 'Invalid Password.';
    }

    // login($no_matric, $password, 'dashboard.php');

    
    
    

    // if ($count_user == 0){
    //     $msg = "Incorrect username or password!";
    // } else {
    //     $query = mysqli_query($conn, "SELECT * FROM users WHERE matricNum='$no_matric' AND password='$password'");
    //     while ($row = mysqli_fetch_assoc($query)){
    //         $_SESSION['id'] = $row['userId'];
    //         $_SESSION['role'] = $row['role'];
    //         $_SESSION['staff_id'] = $row['staff_id'];

    //         header('Location:dashboard.php');
    //     }
    // }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Pelajar</title>
</head>

<body>
    <div class="container">
        <div class="row pb-3">
            <div class="col-lg-12 text-center">
                
            <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="">
            <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
            </div>
        </div>
    </div>

    <?php include('include/nav.php'); ?>

    

<!-- <div class="w3-center">

    <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="top-logo">
    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
</div> -->
<br>
<?php //require_once "include/nav.php"; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <form>
                <div class="form-group">
                    <label>Login Sebagai: </label>
                    <select name="login">
                        <option value="pelajar">--Sila Pilih--</option>
                        <option value="pelajar">Pelajar</option>
                        <option value="staff">Staf</option>
                        <option value="technician">Technician</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                
            
            </form>
        </div>
        <div class="col-lg-6">
            <div class="card shadow rounded-0">
                <div class="card-body">
                    <h2 class="text-center bg-danger"><?= $msg; ?></h2>
                    <h2 class="text-center">Log Masuk Pelajar</h2><hr>
                    <form action="" method="POST" id="loginForm">
                        <div class="form-group row">
                            <label for="matricNo" class="col-sm-4 col-form-label">No Matric</label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control form-control-sm rounded-0" id="matricNo" name="no_matric" placeholder="etc 3162002321">
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                              <input type="password" class="form-control form-control-sm rounded-0" id="password" name="password" placeholder="kata laluan">
                            </div>
                            
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-primary btn-xs rounded-pill " value="Log Masuk" id="login" name="login">
                            
                            
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- <div class="w3-container">


    <br>
    <div class="w3-cell-row">

        <div class="w3-container w3-light-grey w3-cell" style="width: 200px;">
            <ul class="w3-ul">

                <li>Login Sebagai: <select name="login" id="login" class="w3-input">
                        <option value="pelajar">--Sila Pilih--</option>
                        <option value="pelajar">Pelajar</option>
                        <option value="staff">Staf</option>
                        <option value="technician">Technician</option>
                        <option value="admin">Admin</option>
                    </select></li>
            </ul>
        </div>

        <div class="w3-container w3-cell">
            <form action="" method="post">
                <div class="w3-center">
                    <?php

                    // if ($msg){
                    //     ?>
                    //     <h4><?php echo $msg; ?></h4>
                    //     <?php
                    // }
                    ?>
                </div>
            <table class="w3-table">
                <thead>
                <tr>
                    <th colspan="2" class="w3-center w3-light-grey">Login Pelajar</th>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><input type="text" name="no_matric" placeholder="No Matric" class="w3-input w3-border"
                               autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><input type="password" name="password" placeholder="Password"
                               class="w3-input w3-border"></td>
                </tr>
                <tr>
                    <th colspan="2" class="w3-center"><input type="submit" name="login"
                                                             class="w3-button w3-light-grey" value="Login"></th>
                </tr>
                </thead>
            </table>
            </form>

        </div>



    </div>
    <br>

    
</div> -->
<br>
<?php require_once "include/footer.php"; ?>


</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    // $(document).ready(function () {
    //     $('#loginForm').on('submit', function() {
    //         // e.preventDefault();
    //         var username = $('#matricNo').val();
    //         var password = $('#password').val();

    //         if (username == '' || password == '') {
    //             window.alert('Fill the form!');
    //         } 
    //     })
    // });
   
    
    // document.getElementById('login').addEventListener('change', function () {
    //     var type = (this).value;

    //     if (type === 'pelajar') {
    //         window.location.href = 'login.php';
    //     } else if (type === 'staff') {
    //         window.location.href = 'login_staff.php';
    //     } else if (type === 'technician') {
    //         window.location.href = 'technician';
    //     } else if (type === 'admin') {
    //         window.location.href = 'admin'
    //     } else {
    //         window.location.href = 'login.php';
    //     }
    // });
</script>

</html>