<?php

session_start();
include "include/db.php";
if (!isset($_SESSION['user']) && $_SESSION['user']['role'] !== 'technician') header('Location: index.php');


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css">

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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            
          </div>
          <!-- Card Row -->

          <?php include('include/card_row.php'); ?>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Complaint Lists</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Aduan</th>
                            <th>Status Aduan</th>
                            <th>Lihat</th>
                        </tr>
                        </thead>
                      <tbody>
                        <?php 
                        // $sql = "SELECT * FROM complaint_tbl ";
                        $technician_id = $_SESSION['user']['id'];
                        $sql = "SELECT id, technician_id, name, role, jenis_complaint, no_bilik, status FROM users, complaint_tbl WHERE users.userId=complaint_tbl.complainer_id AND technician_id=$technician_id";
                        $exec = $conn->query($sql);

                        if ($exec) {
                            $chek_data = $exec->num_rows;

                            if ($chek_data == 0) {
                                // echo "<h4>Tiada Data</h4>";
                            } else {

                                while ($row = $exec->fetch_assoc()) {
                                    
                                    $id = $row['id'];
                                    $jenis_complaint = $row['jenis_complaint'];
                                    $status = $row['status'];

                                    echo "<tr>";
                                    echo "<td>{$id}</td>";
                                    echo "<td>{$jenis_complaint}</td>";
                                    if ($status == 'Pending') {
                                        echo "<td class=\"w3-red\">{$status}</td>";
                                    } elseif($status == 'KIV'){
                                        echo "<td class=\"w3-blue\">{$status}</td>";
                                    } else {
                                        echo "<td class=\"w3-green\">{$status}</td>";
                                    }
                                    
                                    echo "<td><a class=\"btn btn-primary btn-sm shadow-sm\" href=\"complaint_detail.php?id={$id}\"><i class=\"fas fa-fw fa-eye\"></i> lihat</a></td>";
                                    echo "</tr>";
                                }
                            
                            }
                        } else {
                            die($conn->error);
                            exit();
                        }
                        
                         
                        ?>
                    
                    </tbody>
                    </table>
                  </div>
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
  <script>
      $(document).ready( function () {
            $('#dataTable').DataTable({
                dom: 'lfrtipB',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        } );
  </script>

</body>

</html>
