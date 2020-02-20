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

  <title>Admin - Dashboard</title>

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

          
          <!-- Content Row -->
          <?php include('include/card_row.php'); ?>
          <!-- Content Row -->

         <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Complaint Lists</h6>
                  <a href="export_csv.php?tbl_name=complaints" class="btn btn-success btn-sm"><i class="fas fa fa-upload"></i> Export CSV</a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="100">Image</th>
                          <th class="dt-filter-select">Technician</th>
                          <th class="dt-filter-select">Status</th>
                          <th class="dt-filter-text">Room</th>
                          <th class="dt-filter-select">Type</th>
 
                          <th>Detail</th>
                          <th>Available Date</th>
                          <th>Available Time</th>
                          <th>Comment</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th></th>
                              <th>Technician</th>
                              <th>Status</th>
                              <th>Room</th>
                              <th>Type</th>
                              
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                          </tr>
                      </tfoot>
                      <tbody>

                    <?php 

                    $run_query = $conn->query("SELECT * FROM complaints ORDER BY id DESC");

                    while ($db_row = $run_query->fetch_assoc()) { ?>
                        <tr>
                            <td><img src="../images/<?= $db_row['img1'] ?>" width="100%" class="MagicZoom"></td>
                            <td>
                                <?php 
                                $query = $conn->query("SELECT * FROM technician WHERE id = ".$db_row['technician_id']."");
                                $row = $query->fetch_assoc();

                                echo $db_row['technician_id'] == 0 ? "not set" : $row['name'];
                                
                                ?>       
                            </td>
                            <td>
                              <?php 

                              // $db_row['status_id']; 
                              switch ($db_row['status_id']) {
                                case 1:
                                  echo "KIV";
                                  break;
                                case 2:
                                  echo "Closed";
                                  break;
                                default:
                                  echo "Pending";
                                  break;
                              }
                              ?>
                            </td>
                            <td><?= $db_row['room_no']; ?></td>
                            <td>
                                <?php 

                                $query = $conn->query("SELECT * FROM complaint_type WHERE id=".$db_row['complaint_type']."");
                                $row = $query->fetch_assoc();
                                echo $row['type'];

                                ?>
                                    
                                
                            </td>
                           
                            <td><?= $db_row['detail']; ?></td>
                            <td><?= $db_row['available_date']; ?></td>
                            <td><?= $db_row['available_time']; ?></td>
                           <!--  <td><?= $db_row['status'] == '' ? 'Not Processe' : $db_row['status']; ?></td> -->
                           <td><?= $db_row['comment'] == '' ? 'No comment' : $db_row['comment']; ?></td>
                            <td><a class="btn btn-primary btn-sm" href="complaint_detail.php?id=<?= $db_row['id']; ?>">View / Update</a></td>
                        </tr>

                        <?php
                    }
                     ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

           
          </div>
          <!-- Permintaan list -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Requests Lists</h6>
                  <a href="export_csv.php?tbl_name=complaint_tbl" class="btn btn-success btn-sm"><i class="fas fa fa-upload"></i> Export CSV</a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable2" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th class="dt-filter-text">No.</th>
                          <th>Request Detail</th>
                          <th class="dt-filter-select">Status</th>
                          <th width="10%">View</th>
                        </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No.</th>
                              <th></th>
                              <th>Status</th>
                              <th></th>
                          </tr>
                      </tfoot>
                      <tbody>

                    <?php 

                    $run_query = $conn->query("SELECT * FROM complaint_tbl");

                    while ($db_row = $run_query->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $db_row['id'] ?></td>
                            <td><?= $db_row['jenis_complaint']; ?></td>
                            <td><?= $db_row['status'] == '' ? 'Not Processe' : $db_row['status']; ?></td>
                            <td><a class="btn btn-primary btn-sm" href="view_complaint.php?compid=<?= $db_row['id']; ?>">View / Update</a></td>
                        </tr>

                        <?php
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
