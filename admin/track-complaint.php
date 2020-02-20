<?php include "include/session.php"; ?>

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

  <title>Admin - Technician</title>

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

          <!-- Technician list -->
          <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Track complaint by ID</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="col-lg-4">
                  	<form action="" method="POST">
                  		<div class="form-group">
	                  		<input type="text" name="cid" class="form-control form-control-sm rounded-0">
	                  	</div>
	                  	<div class="form-group">
	                  		<input type="submit" name="search" class="btn btn-primary btn-sm rounded-0" value="Search">
	                  	</div>
                  	</form>
                  	
                  </div>
                  <hr>
                  <?php 

                  if (isset($_POST['search'])) {
                  	$cid = trim($_POST['cid']);
                  	$db_query = $conn->query("SELECT * FROM complaints WHERE complaint_id = '$cid'");

                  	if ($db_query) {
                  		if ($db_query->num_rows > 0) {
 							$db_row = $db_query->fetch_assoc();

 							switch ($db_row['status_id']) {
 								case 0:
 									$status_id = 'Pending';
 									break;
 								case 1:
 									$status_id = 'KIV';
 									break;	
 								case 2:
 									$status_id = 'Closed';
 									break;
 								default:
 									$status_id = 'Pending';
 									break;
 							}

 							$date_added = date('d-m-Y', strtotime($db_row['date_added']));

                  			echo "<div class=\"card\">
				                  	<div class=\"card-body\">
					                  	<div class=\"row\">
											<div class=\"col-lg-4\">
												<img src=\"../images/".$db_row['img1']."\" width=\"100%\" >
											</div>
											<div class=\"col-lg-8\">
												<h5>".$db_row['complaint_id']."</h5>
												<p>".$db_row['detail']."</p>
												<ul>
										        	<li>".$status_id."</li>
										        	<li>".$db_row['room_no']."</li>
										        	<li>".$date_added."</li>
										        </ul>
											</div>
										</div>
				                  		<h1></h1>
				                  	</div>
				                  </div>";
                  		} else echo "not found";
                  	} else die($conn->error);
                  	
                  }

                   ?>
                  
                </div>
              </div>
            </div>
<!--  -->

           
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

  

</body>

</html>
