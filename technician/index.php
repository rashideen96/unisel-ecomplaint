<?php

session_start();
include 'include/db.php';

$msg = '';
if (isset($_POST['login'])){
    $staff_id = $conn->real_escape_string(trim($_POST['t_id']));
    $password = $conn->real_escape_string(trim($_POST['password']));

    $query = $conn->query("SELECT * FROM technician WHERE staff_id='$staff_id' AND password='$password'");
    // $count_user = mysqli_num_rows($query);

    if ($query->num_rows == 0) {
        $msg = "Incorrect username or password!";
    } else {
        $db_query = $conn->query("SELECT * FROM technician WHERE staff_id='$staff_id' AND password='$password'");
        $db_row = $db_query->fetch_assoc();

        $_SESSION['user'] = $db_row;
        header('Location:dashboard.php');
    }

    // if ($count_user == 0){
    //     $msg = "Incorrect username or password!";
    // } else {
    //     $query = mysqli_query($conn, "SELECT * FROM technician WHERE staff_id='$staff_id' AND password='$password'");
    //     while ($row = mysqli_fetch_assoc($query)){

    //         $_SESSION['user'] = 
    //         $_SESSION['id'] = $row['id'];
    //         $_SESSION['role'] = $row['role'];
    //         $_SESSION['staff_id'] = $row['staff_id'];

    //         header('Location:dashboard.php');
    //     }
    // }
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

    <title>Login Technician</title>
  </head>
  <body>
    <div class="sidenav">
         <div class="login-main-text">
            <h2>Technician Login</h2>
            <p>Login here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="" method="POST">
                <?= $msg; ?>
                  <div class="form-group">
                     <label>User Name</label>
                     <input name="t_id" type="text" class="form-control rounded-0" placeholder="User Name" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input name="password" type="password" class="form-control rounded-0" placeholder="Password" required>
                  </div>
                  <button name="login" type="submit" class="btn btn-black rounded-0">Login</button>
                  <!-- <button type="submit" class="btn btn-secondary">Register</button> -->
               </form>
            </div>
         </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>