<?php

ob_start();
session_start();
// include 'include/db.php';
// include('include/function.php');
include('include/db.php');

$msg = '';
if (isset($_POST['login'])){
    

    // OOP method
    $no_matric = $conn->real_escape_string(trim($_POST['no_matric']));
    $password  = $conn->real_escape_string(trim($_POST['password']));

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

    
}
if (isset($_POST['loginStaff'])){

    $staff_id = $conn->real_escape_string(trim($_POST['staff_id']));
    $password  = $conn->real_escape_string(trim($_POST['password']));

    $validateMatric = $conn->query("SELECT * FROM users WHERE matricNum='$staff_id'");
    if ($validateMatric->num_rows == 0) $msg = "No ID tidak dijumpai!";
    else {
        $db_row = $validateMatric->fetch_assoc();
        if (password_verify($password, $db_row['password'])) {
            // echo 'Valid Password'; 
            $_SESSION['user'] = $db_row;
            $_SESSION['staff'] = true;
            header('Location: dashboard.php');
        } else $msg = 'Invalid Password.';
    }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
    <div class="sidenav">
         <div class="login-main-text">
            <h2>Student/Staff Login</h2>
            <p>Login as / Log masuk sebagai:</p>
            <div class="form-group">
                <label>Pelajar</label>
                <input type="radio" name="login" id="studLog" checked>
                <label>Staff</label>
                <input type="radio" name="login" id="staffLog">
            </div><hr>
            <button class="btn btn-info mb-5" onclick="register();">Register</button>
            
         </div>
         
      </div>
      <div class="main">
        <div id="studentLogin">
            <div class="col-md-6 col-sm-12">
                
                <div class="login-form">
                    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="logo"><br><br>
                   <form action="" method="POST">
                    <?= $msg; ?>
                    <h4>Student</h4>
                    <hr>
                      <div class="form-group">
                         <label>Matric ID</label>
                         <input name="no_matric" type="text" class="form-control rounded-0" placeholder="Matric ID" required>
                      </div>
                      <div class="form-group">
                         <label>Password</label>
                         <input name="password" type="password" class="form-control rounded-0" placeholder="Password" required>
                      </div>
                      <button name="login" type="submit" class="btn btn-primary shadow-sm rounded-0"><i class="fa fa-sign-in"></i> Login</button>
                      <!-- <button type="submit" class="btn btn-secondary">Register</button> -->
                   </form>
                </div>
             </div>
        </div>
         <div id="staffLogin">
             <div class="col-md-6 col-sm-12">
                <div class="login-form">
                    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="logo"><br><br>
                   <form action="" method="POST">
                    <?= $msg; ?>
                    <h4>Staff</h4>
                    <hr>
                      <div class="form-group">
                         <label>ID</label>
                         <input name="staff_id" type="text" class="form-control rounded-0" placeholder="ID" required>
                      </div>
                      <div class="form-group">
                         <label>Password</label>
                         <input name="password" type="password" class="form-control rounded-0" placeholder="Password" required>
                      </div>
                      <button name="loginStaff" type="submit" class="btn btn-primary shadow-sm rounded-0"><i class="fa fa-sign-in"></i> Login</button>
                      <!-- <button type="submit" class="btn btn-secondary">Register</button> -->
                   </form>
                </div>
             </div>
         </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var radio = [
                document.getElementById('studLog'),
                document.getElementById('staffLog')
            ];

            function determineForm() {
                var studentLogin = document.getElementById('studentLogin');
                var staffLogin = document.getElementById('staffLogin');
                if (radio[0].checked) {
                    studentLogin.style.display = "block";
                    staffLogin.style.display = "none";
                } else {
                    studentLogin.style.display = "none";
                    staffLogin.style.display = "block";
                }
            }

            determineForm();

            for (var i=0; i<2; i++) {
                radio[i].addEventListener('change', function() {
                    determineForm();
                });
            }

            

        })
        function register() {
            window.location.href = 'register.php'
        }

    </script>
  </body>
</html>


    
