<?php
ob_start();
session_start();
include('include/db.php');
if (!isset($_SESSION['user'])) header('Location: login.php');


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



<!DOCTYPE html>
<html lang="en">
<style type="text/css">
    tfoot {
    display: table-header-group;
}
</style>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Profile</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-complaint <br><sup><?= $_SESSION['user']['role'] ?></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="complaint.php">
          <i class="fa fa-fw fa-folder"></i>
          <span>Complaints</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['user']['name'] ?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

         
          
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Profile</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                   <form action="" method="POST" id="profileForm">
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
                            <input type="password" name="password" class="form-control form-control-sm rounded-0">
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
                <!--            <input type="reset" name="reset" class="btn btn-default rounded-0"> -->
                        </div>
                    </form>
                </div>
              </div>
            </div>

           
          </div>

          <!-- Request Table -->
  

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

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

</body>

</html>



