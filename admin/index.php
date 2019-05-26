<?php

session_start();
include 'include/db.php';

$msg = '';
if (isset($_POST['login'])){
    $staff_id = mysqli_real_escape_string($conn, trim($_POST['t_id']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id='$staff_id' AND password='$password'");
    $count_user = mysqli_num_rows($query);

    if ($count_user == 0){
        $msg = "Incorrect username or password!";
    } else {
        $query = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id='$staff_id' AND password='$password'");
        while ($row = mysqli_fetch_assoc($query)){
            $_SESSION['id'] = $row['id'];
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
        <a href="../index.php" class="w3-bar-item w3-button w3-border-right">Home</a>
        <div class="w3-dropdown-hover">
            <button class="w3-button w3-border-right">Register</button>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <a href="../reg_student.php" class="w3-bar-item w3-button">Student</a>
                <a href="../reg_staff.php" class="w3-bar-item w3-button">Staff</a>
            </div>
        </div>
        <a href="../contact.php" class="w3-bar-item w3-button w3-border-right">Hubungi Kami</a>
        <a href="../help.php" class="w3-bar-item w3-button w3-border-right">Bantuan</a>
    </div>
    <br>

</div>
<div class="w3-container">


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

                    if ($msg){
                        ?>
                        <h4><?php echo $msg; ?></h4>
                        <?php
                    }
                    ?>
                </div>
                <table class="w3-table">
                    <thead>
                    <tr>
                        <th colspan="2" class="w3-center w3-light-grey">Login Admin</th>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><input type="text" name="t_id" placeholder="ID" class="w3-input w3-border"
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

    <?php require_once "include/footer.php"; ?>
</div>




</body>

<script>
    // $(document).ready(function () {

    // });

    document.getElementById('login').addEventListener('change', function () {
        var type = (this).value;

        if (type === 'pelajar') {
            window.location.href = '../login.php';
        } else if (type === 'staff') {
            window.location.href = '../login_staff.php';
        } else if (type === 'admin') {
            window.location.href = '../admin'
        } else {
            window.location.href = '../login.php';
        }
    });
</script>

</html>