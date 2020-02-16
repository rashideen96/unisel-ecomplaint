<?php 
session_start();
include('include/db.php');
if (!isset($_SESSION['user'])) header('Location: login.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Complaint</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/jquery-ui.css" rel="stylesheet">
  <link href="css/jquery.timepicker.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="vendor/dist/css/jasny-bootstrap.min.css" rel="stylesheet">
  <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet"> -->

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
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
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

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User 1</span>
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

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="goBack();"><i class="fas fa-chevron-left fa-sm"></i> Back</button>
          </div>

          <div class="row">
          	<div class="col-xl-12 col-lg-12">
          		<div class="card shadow mb-4">
          			<div class="card-body">
          				<div class="form-group">
			            	<input id="umum" type="radio" name="complaint" value="umum" class="radio" checked> Umum
			            	<input id="permintaan" type="radio" name="complaint" value="permintaan" class="radio" <?= $_SESSION['user']['role'] !== 'staff' ? 'disabled' : '' ?>> Permintaan
			            </div>
          			</div>
          		</div>
          	</div>
          </div>
            

          <div id="aduanUmum">
          	<div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Complaint</h6>
                  
                </div> -->
                <!-- Card Body -->
                <div class="card-body">
                 <form action="" method="POST" enctype="multipart/form-data" id="complaintFormUmum">
                   <div class="form-group">
                        <label>Room No</label>
                        <input type="text" class="form-control form-control-sm rounded-0" placeholder="A3-2F-U4" name="no_bilik" required autocomplete="off" id="room_no" onkeyup="addHyphen(this);">
                    </div>
                    <div class="form-group">
                        <label>Complaint Type</label>
                        <select name="complaint_type" class="form-control form-control-sm rounded-0" id="complaint_type" required>
                            <option value="">Please Select</option>
                            <?php 

                            $db_query = $conn->query("SELECT * FROM complaint_type");
                            while ($db_row = $db_query->fetch_assoc()) {
                            	?>
                            	<option value="<?= $db_row['id'] ?>"><?= $db_row['type'] ?></option>
                            	<?php
                            }
                             ?>
                        </select>
                    </div>
                    <div class="form-group row">
                    	<div class="col-lg-4">
                    		<div class="fileinput fileinput-new" data-provides="fileinput">
		                        <div class="fileinput-new img-thumbnail rounded-0" style="width: 200px; height: 150px;">
		                          <img src="https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg" data-src="holder.js/100%x100%"  alt="...">
		                        </div>
		                        <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
		                        <div>
		                          <span class="btn btn-primary btn-sm btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="img1" accept="image/*"></span>
		                          <a href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput">Remove</a>
		                        </div>
		                        <!-- <span>*Minimum 5 images<br>*Only png/jpg/jpeg are allowed</span> -->
		                      </div>
                    	</div>
                      	<div class="col-lg-4">
                      		<div class="fileinput fileinput-new" data-provides="fileinput">
		                        <div class="fileinput-new img-thumbnail rounded-0" style="width: 200px; height: 150px;">
		                          <img src="https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg" data-src="holder.js/100%x100%"  alt="...">
		                        </div>
		                        <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
		                        <div>
		                          <span class="btn btn-primary btn-sm btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="img2" accept="image/*"></span>
		                          <a href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput">Remove</a>
		                        </div>
		                        <!-- <span>*Minimum 5 images<br>*Only png/jpg/jpeg are allowed</span> -->
		                      </div>
                      	</div>
                      	<div class="col-lg-4">
                      		<div class="fileinput fileinput-new" data-provides="fileinput">
		                        <div class="fileinput-new img-thumbnail rounded-0" style="width: 200px; height: 150px;">
		                          <img src="https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg" data-src="holder.js/100%x100%"  alt="...">
		                        </div>
		                        <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px; max-height: 150px;"></div>
		                        <div>
		                          <span class="btn btn-primary btn-sm btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="img3" accept="image/*"></span>
		                          <a href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput">Remove</a>
		                        </div>
		                        <!-- <span>*Minimum 5 images<br>*Only png/jpg/jpeg are allowed</span> -->
		                      </div>
                      	</div>
                        <!-- <label>Picture</label>
                        <input type="file" class="form-control form-control-sm rounded-0" placeholder="A3-2F-U4" name="image" required> -->
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <textarea name="detail" id="detail" cols="30" rows="10" placeholder="Detail masalah..." class="form-control form-control-sm rounded-0"></textarea>
                    </div>

                    <div class="form-group">
                    	<label>Date</label>
                    	<div class="input-group">
						  <div class="input-group-prepend">
						    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fas fa-calendar"></i></span>
						  </div>
						  <input type="text" name="tarikh" id="datepicker" class="form-control form-control-sm rounded-0" autocomplete="off"><span id="check_date"></span>
						</div>
                    </div>

                    <!-- <div class="form-group">
                        <label>Date</label>
                        <input type="text" name="tarikh" id="datepicker" class="form-control form-control-sm rounded-0" autocomplete="off"><span id="check_date"></span>
                    </div> -->
                    <hr>
                     Available time
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>From</label>
                            <div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fas fa-clock"></i></span>
							  </div>
							  <input type="text" name="dari" class="form-control form-control-sm rounded-0" id="from">
							</div>
                            
                        </div>
                        <div class="col-lg-4">
                            <label>To</label>
                            <div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text rounded-0" id="basic-addon1"><i class="fas fa-clock"></i></span>
							  </div>
							  <input type="text" name="hingga" class="form-control form-control-sm rounded-0" id="to">
							</div>
                            
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <input type="submit" name="daftar" class="btn btn-primary  shadow-sm" id="daftar">
                        <input type="reset" name="reset" class="btn btn-default  shadow-sm" onclick="resetForm()">
                    </div>
                 </form>
                </div>
              </div>
            </div>

           
          </div>
          </div>

          <div id="aduanPermintaan">
          	<div class="row">

            <!-- Area Chart -->
	            <div class="col-xl-12 col-lg-12">
	              <div class="card shadow mb-4">
	                <!-- Card Header - Dropdown -->
	                <!-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	                  <h6 class="m-0 font-weight-bold text-primary">Add Complaint</h6>
	                  
	                </div> -->
	                <!-- Card Body -->
	                <div class="card-body">
	                 <form action="" method="POST" id="complaintFormPermintaan">

	                    <div class="form-group">
	                        <label>Permintaan</label>
	                        <textarea name="detail" id="detail2" cols="30" rows="10" placeholder="Detail masalah..." class="form-control form-control-sm rounded-0"></textarea>
	                    </div>

	                    <div class="form-group">
	                        <input type="submit" name="daftar" class="btn btn-primary  shadow-sm" id="daftar">
	                        <input type="reset" name="reset" class="btn btn-default  shadow-sm" onclick="resetForm()">
	                    </div>
	                 </form>
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
  <script src="js/jquery-ui.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>

  <script src="vendor/dist/js/jasny-bootstrap.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- Page level plugins -->
  

  <!-- Page level custom scripts -->


</body>
<script>
  // $(document).off('.data-api');
  $(document).off('.alert.data-api');
  $(document).ready(function(){
    var dateToday = new Date(); 
        $( "#datepicker" ).datepicker({
            dateFormat: 'dd/mm/yy',
            minDate: dateToday,
            showButtonPanel: true,
            onClose: function(){
                // alert($(this).val());
                var date = $(this).val();
                $.ajax({
                    url: "ajax/check_date.php",
                    method: "POST",
                    data: {date:date},
                    success: function(data){
                        // $('#mesej').html(data);
                        // $('#check_date').text('triggered');
                        $('#check_date').html(data);
                        // alert(data);
                    },
                    error: function() {
                        alert('error handling here');
                    }
                });
            }
        });

        $('#complaintFormUmum').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData($('#complaintFormUmum')[0]);

            $.ajax({
              url: "ajax/register_complaint_umum.php",
              type: "POST",
              data: formData,
              processData: false,  // tell jQuery not to process the data
              contentType: false,   // tell jQuery not to set contentType
              success: function(data) {
                // clearForm();
                Swal.fire({
                      icon: 'success',
                      title: 'success',
                      text: data
                    });

                 // console.log("PHP Output:");
                    console.log( data );
                 // $('#complaintForm')[0].reset();

              },
              error: function(err) {
                console.log(err);
              }
           
            });
        });

        $('#complaintFormPermintaan').on('submit', function(e) {
            e.preventDefault();
            // var formData = new FormData($('#complaintFormPermintaan')[0]);
            var data = $(this).serialize();
            $.ajax({
              url: "ajax/register_complaint_permintaan.php",
              type: "POST",
              data: data, 
              success: function(data) {
                // clearForm();
                Swal.fire({
                      icon: 'success',
                      title: 'success',
                      text: data
                    });
                console.log(data);
              },
              error: function(err) {
                console.log(err);
              }
           
            });
        });

        // $('#detail').summernote({
        // 	height: 200,
        // 	placeholder: 'Detail'
        // });
        // $('#detail2').summernote({
        // 	height: 200,
        // 	placeholder: 'Permintaan'
        // });

        $('#from').timepicker({
        'minTime': '9:00am',
        'maxTime': '5:00pm',
        'showDuration': false
        });

        $('#to').timepicker({
            'minTime': '9:00am',
            'maxTime': '5:00pm',
            'showDuration': false
        });

        $('.fileinput').fileinput()

        // Switch Form
        var radio = [
            document.getElementById('umum'),
            document.getElementById('permintaan')
        ];

        function determineForm() {
            var aduanUmum = document.getElementById('aduanUmum');
            var aduanPermintaan = document.getElementById('aduanPermintaan');
            if (radio[0].checked) {
                aduanUmum.style.display = "block";
                aduanPermintaan.style.display = "none";
            } else {
                aduanUmum.style.display = "none";
                aduanPermintaan.style.display = "block";
            }
        }

        determineForm();

        for (var i=0; i<2; i++) {
            radio[i].addEventListener('change', function() {
                determineForm();
            });
        }

  })



  
  function goBack() {
    window.history.back();
  }

  function addHyphen(element) {
      var el = document.getElementById(element.id);
      el = el.value.split('-').join('');
      el = el.toUpperCase();
      var finalVal = el.match(/.{1,2}/g).join('-');
      document.getElementById(element.id).value = finalVal;
  }
</script>

</html>
