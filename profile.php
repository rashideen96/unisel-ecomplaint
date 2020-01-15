<?php
ob_start();
session_start();

include('include/db.php');
// if (isset($_SESSION['id']) && $_SESSION['role'] == 'student' || $_SESSION['role'] == 'staff'){

// } else{
//     header('Location: login.php');
// }

if (!isset($_SESSION['user'])) header('Location: login.php');
elseif (!$_SESSION['student']) header('Location: login.php');

$userId = $_SESSION['user']['userId'];
$db_query = $conn->query("SELECT * FROM users WHERE userId=$userId");
if ($db_query) {
	$db_row = $db_query->fetch_assoc();

	$name = $db_row['name'];
	$username = $db_row['username'];
	$email = $db_row['email'];
	$password = $db_row['password'];
	$matric_no = $db_row['matricNum'];
	$phone_no = $db_row['phoneNum'];
	$faculty = $db_row['faculty'];
	$programme = $db_row['programe'];

}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Profile</title>
</head>
<body>

    <?php include('include/nav2.php'); ?>

<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h4>Profile</h4>
        </div>
        <div class="col-lg-8">
            
                
            <form action="" method="POST" enctype="multipart/form-data" id="profileForm">
                <div class="form-group">
                	<input type="hidden" name="userId" value="<?= $_SESSION['user']['userId']; ?>">
                	<label>Name</label>
                	<input type="text" name="name" class="form-control form-control-sm rounded-0" value="<?= $name; ?>">
                </div>
                <div class="form-group">
                	<label>Username</label>
                	<input type="text" name="username" class="form-control form-control-sm rounded-0" value="<?= $username; ?>">
                </div>
                <div class="form-group">
                	<label>Email</label>
                	<input type="email" name="email" class="form-control form-control-sm rounded-0" value="<?= $email; ?>">
                </div>
                <div class="form-group">
                	<label>Password</label>
                	<input type="password" name="password" class="form-control form-control-sm rounded-0" value="<?= $password; ?>">
                </div>
                <div class="form-group">
                	<label>Matric Number</label>
                	<input type="text" name="matric_no" class="form-control form-control-sm rounded-0" value="<?= $matric_no; ?>">
                </div>
                <div class="form-group">
                	<label>Phone Number</label>
                	<input type="text" name="phone_no" class="form-control form-control-sm rounded-0" value="<?= $phone_no; ?>">
                </div>
                <div class="form-group">
                	<label>Faculty</label>
                	 <select name="fakulti" id="fakulti" class="form-control form-control-sm rounded-0" required>
                 
                        <option value="<?= $faculty ?>"><?= $faculty ?></option>
                        <option value="Faculty Communication Visual Arts & Computing">Faculty Communication
                            Visual Arts & Computing</option>
                        <option value="Faculty Engineering & Life Science">Faculty Engineering & Life
                            Science</option>
                        <option value="Faculty Education & Science Social">Faculty Education & Science
                            Social</option>
                        <option value="Faculty Business & Accounting">Faculty Business & Accounting</option>
                        <option value="Center of Foundation">Center of Foundation</option>
                    </select>
                </div>
                <div class="form-group">
                	<label>Programme</label>
                	<input type="text" name="programme" class="form-control form-control-sm rounded-0" value="<?= $programme ?>">
                </div>
                <div class="form-group">
                	<input type="submit" name="update" class="btn btn-primary rounded-0" value="Update">
        <!--         	<input type="reset" name="reset" class="btn btn-default rounded-0"> -->
                </div>
            </form>
                
        </div>
    </div>
   

  

</div>
  <br>
    <?php require_once "include/footer.php"; ?>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
	$(document).ready(function(){
		$('#profileForm').on('submit', function(e) {
			e.preventDefault();
			$.ajax({
				url: "ajax/edit_profile.php",
				method: "POST",
				data: $(this).serialize(),
				success: function(data) {
					// console.log(data);
					Swal.fire({
                      icon: 'success',
                      title: 'success',
                      text: data
                    });
				},
				error: function(err) {
					console.log(err);
				}
			});
		})

	});
</script>
        
  
</html>