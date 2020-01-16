<?php

session_start();
include "include/db.php";
if (!isset($_SESSION['user']) && $_SESSION['user']['role'] !== 'technician') header('Location: index.php');

isset($_GET['id']) ? $complaint_id = $_GET['id'] : '';

$sql = "SELECT 
        id, 
        name, 
        matricNum, 
        role, faculty, 
        phoneNum, 
        jenis_complaint, 
        detail, 
        no_bilik, 
        tarikh, 
        masa, 
        status 
        FROM users, complaint_tbl 
        WHERE users.userId = complaint_tbl.complainer_id 
        AND id=$complaint_id";


$query = $conn->query($sql);
if ($query) {
    
    while ($row = $query->fetch_assoc()) {
        
        // Student info
        $complaint_id = $row['id'];
        $name = $row['name'];
        $matric_number = $row['matricNum'];
        $jawatan = $row['role'];
        $faculty = $row['faculty'];
        $phone_num = $row['phoneNum'];

        // complaint data
        $jenis_complaint = $row['jenis_complaint'];
        $detail = $row['detail'];
        $no_bilik = $row['no_bilik'];
        $tarikh = $row['tarikh'];
        $masa = $row['masa'];
        $status = $row['status'];

    }
}

if (isset($_POST['send'])) {
    $mesej = $_POST['mesej'];

    $sql = "INSERT INTO message_tbl(complaint_id, mesej) VALUES($complaint_id, '$mesej')";
    if ($conn->query($sql)) {
        header("Location: complaint_detail.php?id=$complaint_id");
    } else {
        die($conn->error);
    }
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
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="goBack();"><i class="fas fa-chevron-left"></i> Kembali</button>

            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="print();"><i class="fas fa-print fa-sm"></i> Cetak</button>
          </div>
         
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Detail</h6>
                  
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>Nama: </th>
                        <td><?php echo $name; ?></td>
                        <th>No.ID: </th>
                        <td><?php echo $matric_number; ?></td>
                    </tr>
                    <tr>
                        <th>Jawatan: </th>
                        <td><?php echo $jawatan ?></td>
                        <th>Pejabat/Jabatan/Fakulti: </th>
                        <td><?php echo $faculty ?></td>
                    </tr>
                    <tr>
                        <th>No.Telefon: </th>
                        <td><?php echo $phone_num ?></td>
                        <th>No.Telefon(Pejabat): </th>
                        <td>-</td>
                    </tr>
                    <tr>
                        <th>Aduan Kerosakan: </th>
                        <td colspan="3"><?php echo $jenis_complaint ?></td>
                    </tr>
                    <tr>
                        <th>Masalah/Ulasan: </th>
                        <td colspan="3"><?php echo $detail ?></td>
                    </tr>
                    <tr>
                    <th>Gambar: </th>
                    <td colspan="3">
                    <?php 


                    $img_query = "SELECT * FROM upload_img WHERE complaint_id=$complaint_id";
                    $img_exec  = $conn->query($img_query);

                    if ($img_exec) {
                        while ($row = $img_exec->fetch_assoc()) {
                            $img_id = $row['id'];
                            $img_name = $row['img_name'];

                            echo "<a href=\"../photo/{$img_name}\"><img src=\"../photo/{$img_name}\" alt=\"\" width=\"100px\" height=\"100px\" class=\"w3-hover-opacity\"></a>";
                        }
                    }

                     ?>
                    </td>
                    </tr>
                </tbody>
                </table>
                <br>
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>Bangunan: </th>
                        <td><?php echo $no_bilik ?></td>
                        <th>Tarikh Temuduga: </th>
                        <td><?php echo $tarikh ?></td>
                    </tr>
                    <tr>
                        <th>Masa: </th>
                        <td><?php echo $masa ?></td>
                        <th>Keutamaan: </th>
                        <td>Segera</td>
                    </tr>
                    <tr>
                        <th>Status: </th>
                        <td colspan="3"><select name="status" id="status" class="form-control rounded-0">
                                <?php echo "<option value=\"{$status}\">{$status}</option>" ?>
                                <option value="KIV">KIV</option>
                                <option value="Pending">Pending</option>
                                <option value="Closed">Closed</option>
                            </select></td>
                    </tr>
                    </tbody>
                </table>

                <button class="btn btn-primary btn-sm" id="kemaskini"><i class="fas fa-fw fa-edit"></i> Kemaskini</button>
             
                
                </div>
              </div>
            </div>

           
          </div>

          <div class="row">
              <div class="col-xl-12 col-lg-12">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Komen</h6>
                      
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered">
                        <tbody>
                        <?php 

                            $sql = "SELECT * FROM message_tbl WHERE complaint_id=$complaint_id";
                            $ext = $conn->query($sql);

                            if ($ext) {
                                while ($row = $ext->fetch_assoc()) {
                                    $mesej = $row['mesej'];

                                    echo "<tr>";
                                    echo "<th width=\"20%\">user: </th>";       
                                    echo "<td>{$mesej}</td>";
                                    echo "</tr>";
                                }
                            }
                             ?>
                        <tr>
                            <td colspan="2">
                                <form action="" method="post">
                                <input type="text" class="form-control rounded-0" placeholder="Mesej" name="mesej" required>
                                <input type="submit" class="btn btn-primary btn-sm" value="Hantar" name="send">
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
  <script>

    $(document).ready(function(){
        $('#kemaskini').click(function(){
            var status = $('#status').val();
            $.ajax({
                url: "ajax/update_complaint.php",
                method: "POST",
                data: {
                    status: status,
                    complaint_id: <?= $complaint_id; ?>
                },
                success: function(data) {
                    alert(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    });


  function goBack() {
    window.history.back();
  }

  </script>

  <!-- Page level custom scripts -->
  

</body>

</html>
