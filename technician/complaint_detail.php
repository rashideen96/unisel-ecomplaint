<?php

session_start();
include "include/db.php";
if (!isset($_SESSION['user']) && $_SESSION['user']['role'] !== 'technician') header('Location: index.php');

isset($_GET['id']) ? $complaint_id = $_GET['id'] : '';

// $sql = "SELECT 
//         id, 
//         name, 
//         matricNum, 
//         role, faculty, 
//         phoneNum, 
//         jenis_complaint, 
//         detail, 
//         no_bilik, 
//         tarikh, 
//         masa, 
//         status 
//         FROM users, complaint_tbl 
//         WHERE users.userId = complaint_tbl.complainer_id 
//         AND id=$complaint_id";

$sql = "SELECT 
        id, 
        technician_id, 
        status_id,
        room_no,
        complaint_type,
        img1,
        img2,
        img3,
        detail, 
        available_date, 
        available_time,
        comment
        FROM users, complaints 
        WHERE users.userId = complaints.complainer_id 
        AND id=$complaint_id";


$query = $conn->query($sql);

if (!$query) die($conn->error);
else {
  $row = $query->fetch_assoc();
  $complaint_id = $row['id'];
  $technician_id = $row['technician_id'];
  $status_id = $row['status_id'];
  $room_no = $row['room_no'];
  $complaint_type = $row['complaint_type'];
  $c = $conn->query("SELECT * FROM complaint_type WHERE id = $complaint_type");
  $r = $c->fetch_assoc();
  $complaint_name = $r['type'];
  $images = [
    $row['img1'],
    $row['img2'],
    $row['img3']
  ];
  $detail = $row['detail'];
  $available_date = $row['available_date'];
  $available_time = $row['available_time'];
  $comment = $row['comment'];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Detail</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('include/sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include('include/top_bar.php'); ?>
        
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="goBack();"><i class="fas fa-chevron-left fa-sm"></i> Back</button>
          </div>

          <!-- Card Row -->

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- Card Body -->
                <div class="card-body">
                  <form action="" method="POST">
                  <div class="row">
                    <div class="col-lg-4">
                      <img src="../images/<?= $images[0] ?>" width="100%">
                    </div>
                    <div class="col-lg-4">
                      <img src="../images/<?= $images[1] ?>" width="100%">
                    </div>
                    <div class="col-lg-4">
                      <img src="../images/<?= $images[2] ?>" width="100%">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group row">
                          <label class="col-sm-2 col-form-label">ID.</label>
                          <div class="col-sm-10">
                            <input type="id" name="id" class="form-control  rounded-0" value="<?= $complaint_id ?>" disabled>
                          </div>
                      </div>
                     
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Room No.</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control  rounded-0" placeholder="A3-2F-U4" name="no_bilik" required autocomplete="off" id="room_no" value="<?= $room_no ?>" disabled>
                        </div>
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Complaint Type</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control  rounded-0" value="<?= $complaint_name ?>" disabled>
                        </div>
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Detail</label>
                        <div class="col-sm-10">
                          <textarea class="form-control  rounded-0" disabled><?= $detail; ?></textarea>
                        </div>
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Available Date</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control  rounded-0" value="<?= $available_date ?>" disabled>
                        </div>    
                       
                      </div>
                      
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Available Time</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control  rounded-0" value="<?= $available_time ?>" disabled>
                        </div>
                        
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <select name="status" class="form-control  rounded-0" id="status" required>
                              <option value="">Please Select</option>
                              <option value="electrical">KIV</option>
                              <option value="wifi">Closed</option>
                              
                          </select>
                        </div>
                        
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Comment</label>
                        <div class="col-sm-10">
                          <textarea class="form-control  rounded-0" rows="10"><?= $comment; ?></textarea>
                        </div>
                        
                      </div>

                      <div class="form-group">
                        <input type="submit" name="daftar" class="btn btn-primary btn-sm  shadow-sm" id="daftar" value="Update">
                        <input type="reset" name="reset" class="btn btn-default btn-sm shadow-sm">
                    </div>
                    </div>
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
      <?php include('include/footer.php'); ?>
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
  <!-- <script src="js/demo/datatables-demo.js"></script> -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
  <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>

  <script src="js/demo/datatables-demo.js"></script>
  <script type="text/javascript">
    function goBack() {
      window.history.back();
    }
  </script>

</body>

</html>






