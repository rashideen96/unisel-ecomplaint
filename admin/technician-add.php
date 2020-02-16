<?php

session_start();
include('include/db.php');
if (isset($_SESSION['id']) && $_SESSION['role'] == 'admin'){

} else{
  header('Location: index.php');
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

  <title>Admin - Technician Add</title>

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
    <?php include('include/sidebar.php') ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('include/top_bar.php') ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<div class="d-sm-flex align-items-center justify-content-between mb-4">
	            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="goBack();"><i class="fas fa-chevron-left fa-sm"></i> Back</button>
	          </div>

          <!-- Technician list -->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
              	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add New Technician</h6>
              </div>

                <!-- Card Body -->
                <div class="card-body">
                  <form action="" method="POST" id="addTechnician">
                  	<div class="form-group row">
	                    <label for="name" class="col-sm-4 col-form-label">Name</label>
	                    <div class="col-sm-8">
	                      <input type="text" name="name" class="form-control form-control-sm rounded-0" id="name" placeholder="Nama" required>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="department" class="col-sm-4 col-form-label">Department</label>
	                    <div class="col-sm-8">
	                      <input type="text" name="department" class="form-control form-control-sm rounded-0" id="department" placeholder="Department" required>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="phone_no" class="col-sm-4 col-form-label">Phone No.</label>
	                    <div class="col-sm-8">
	                      <input type="number" name="phone_no" class="form-control form-control-sm rounded-0" id="phone_no" placeholder="No Telefon" required>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="email" class="col-sm-4 col-form-label">Email</label>
	                    <div class="col-sm-8">
	                      <input type="email" name="email" class="form-control form-control-sm rounded-0" id="email" placeholder="Email" required>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    <label for="email" class="col-sm-4 col-form-label">Password</label>
	                    <div class="col-sm-8">
	                      <input type="password" name="password" class="form-control form-control-sm rounded-0" id="password" placeholder="Password" required>
	                    </div>
	                </div>
          			<div class="form-group">
          				<input type="submit" name="submit" class="btn btn-primary shadow-sm btn-sm " value="Add">
          				<input type="reset" class="btn btn-default shadow-sm btn-sm ">
          			</div>
	          		</form>
                </div>
              </div>
            </div>

           
          </div>
          

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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
  	$('#addTechnician').on('submit', function(e) {
            e.preventDefault();
            // var formData = new FormData($('#complaintFormPermintaan')[0]);
            var data = $(this).serialize();
            $.ajax({
              url: "ajax/add_technician.php",
              type: "POST",
              data: data, 
              success: function(data) {
                // clearForm();
                // Swal.fire({
                //       icon: 'success',
                //       title: 'success',
                //       text: data
                //     });
                window.alert(data);
                console.log(data);

              },
              error: function(err) {
                console.log(err);
              }
           
            });
        });

  	function goBack() {
	    window.history.back();
	  }

  </script>
  

</body>

</html>
