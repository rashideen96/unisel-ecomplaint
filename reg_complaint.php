<?php
ob_start();
session_start();
// if (isset($_SESSION['id']) && $_SESSION['role'] == 'student' || $_SESSION['role'] == 'staff'){

// } else{
//     header('Location: login.php');
// }

if (!isset($_SESSION['user'])) header('Location: login.php');
elseif (!$_SESSION['student']) header('Location: login.php');


// mesej variable
$msg='';
if (isset($_POST['daftar'])) {

    include "include/db.php";
    // id complainer
    $complainer_id = $_SESSION['id'];

    $no_bilik = strtoupper($conn->real_escape_string(trim($_POST['no_bilik'])));
    $jenis_aduan = $conn->real_escape_string(trim($_POST['complaint_type']));
    $detail      = $conn->real_escape_string(trim($_POST['detail']));
    $tarikh =   $conn->real_escape_string(trim($_POST['tarikh']));
    $masa   =   trim($_POST['dari']).' - '.trim($_POST['hingga']);

    // chek masa
    $query_time = "SELECT tarikh FROM complaint_tbl WHERE tarikh = '$tarikh'";
    // $query_exec = mysqli_query($conn, $query_time);
    $query_exec = $conn->query($query_time);

    if ($query_exec) {
        // $kira_masa_available = mysqli_num_rows($query_exec);
   

        if ($query_exec->num_rows == 0) {
            // Boleh buat aduan

            $query = "INSERT INTO complaint_tbl(complainer_id, no_bilik, jenis_complaint, detail, tarikh, masa) VALUES($complainer_id,'$no_bilik', '$jenis_aduan', '$detail', '$tarikh', '$masa')";

            if ($conn->query($query)) {
                // echo "Aduan berjaya dihantar";
                $msg = "Aduan berjaya dihantar";
                // $last_id = mysqli_insert_id($conn);
                $last_id = $conn->insert_id;
                
            } else {
                $msg = "Error";
            }

             // upload multiple image
            for ($i=0; $i < count($_FILES["file_img"]["name"]) ; $i++) { 
                
                $filetmp = $_FILES["file_img"]["tmp_name"][$i];
                $filename = $_FILES["file_img"]["name"][$i];
                $filetype = $_FILES["file_img"]["type"][$i];
                $filepath = "photo/".$filename;

                move_uploaded_file($filetmp, $filepath);

                $sql = "INSERT INTO upload_img(complaint_id, img_name, img_path, img_type) ";
                $sql .= "VALUES('$last_id', '$filename', '$filepath', '$filetype')";

                $result = mysqli_query($conn, $sql);
            }
        } else {

            $msg = "Tarikh penyelenggaraan telah di booking, sila pilih tarikh lain";
        }
    }

    
    

    
}



?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css"> -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <style type="text/css">
        .img_preview {
            height: 200px;
            width: 200px;
        }
    </style>
    <title>Register Complaint</title>
</head>
<body>

    <?php include('include/nav2.php'); ?>

<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h4>Register Complaint / Cipta Aduan</h4>
        </div>
        <div class="col-lg-8">
            
                
            <form action="" method="POST" enctype="multipart/form-data" id="complaintForm">
                <div class="form-group">
                    <label>Room No</label>
                    <input type="text" class="form-control form-control-sm rounded-0" placeholder="A3-2F-U4" name="no_bilik" required autocomplete="off" id="room_no" onkeyup="addHyphen(this);">
                </div>
                <div class="form-group">
                    <label>Complaint Type</label>
                    <select name="complaint_type" class="form-control form-control-sm rounded-0" id="complaint_type" required>
                        <option value="">Please Select</option>
                        <option value="electrical">Electrical / Peralatan Elektrik</option>
                        <option value="wifi">Modem / Wifi</option>
                        <option value="furniture">Furniture / Perabot</option>
                        <option value="civil">Civil / Sivil</option>
                        <option value="security">Security / Keselamatan</option>
                    </select>
                </div>
                <hr>
                Images
                <div class="row">
                    
                    <div class="col-lg-4">
                        <div class="form-group">
                            <img id="blah1" src="https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg" alt="image" class="img_preview" onclick="removeImg(this, '#img1');" title="click to remove photo">
                            <input type="file" class="form-control form-control-sm rounded-0" name="img1" onchange="readURL(this, '#blah1');" accept="image/*" id="img1" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <img id="blah2" src="https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg" alt="image" class="img_preview" onclick="removeImg(this, '#img2');">
                            <input type="file" class="form-control form-control-sm rounded-0" name="img2" onchange="readURL(this, '#blah2');" accept="image/*" id="img2" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <img id="blah3" src="https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg" alt="image" class="img_preview" onclick="removeImg(this, '#img3');">
                            <input type="file" class="form-control form-control-sm rounded-0" name="img3" onchange="readURL(this, '#blah3');" accept="image/*" id="img3" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <img id="blah4" src="https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg" alt="image" class="img_preview" onclick="removeImg(this, '#img4');">
                            <input type="file" class="form-control form-control-sm rounded-0" name="img4" onchange="readURL(this, '#blah4');" accept="image/*" id="img4" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <img id="blah5" src="https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg" alt="image" class="img_preview" onclick="removeImg(this, '#img5');">
                            <input type="file" class="form-control form-control-sm rounded-0" name="img5" onchange="readURL(this, '#blah5');" accept="image/*" id="img5" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" placeholder="Detail masalah..." class="form-control form-control-sm rounded-0"></textarea>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="text" name="tarikh" id="datepicker" class="form-control form-control-sm rounded-0" autocomplete="off" readonly><span id="check_date"></span>
                </div>
                <hr>
                Available time
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>From</label>
                        <input type="text" name="dari" class="form-control form-control-sm rounded-0" id="from">
                    </div>
                    <div class="col-lg-4">
                        <label>To</label>
                        <input type="text" name="hingga" class="form-control form-control-sm rounded-0" id="to">
                    </div>
                    
                </div>
                <div class="form-group">
                    <input type="submit" name="daftar" class="btn btn-primary rounded-0" id="daftar">
                    <input type="reset" name="reset" class="btn btn-default rounded-0" onclick="resetForm()">
                </div>
            </form>
                
        </div>
    </div>
   

  

</div>
  <br>
    <?php require_once "include/footer.php"; ?>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function readURL(input, imageSelector) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(imageSelector).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }

    }

    function removeImg(input, selector) {
        input.src = 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg';
        $(selector).val('');
    }

    function resetForm() {
        document.getElementById('complaintForm').reset();
        $('#blah1').attr('src', 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg');
        $('#blah2').attr('src', 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg');
        $('#blah3').attr('src', 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg');
        $('#blah4').attr('src', 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg');
        $('#blah5').attr('src', 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg');
    }

    function clearForm() {
        $('#room_no').val('');
        $('#complaint_type').val('');
        $('#img1').val('');
        $('#img2').val('');
        $('#img3').val('');
        $('#img4').val('');
        $('#img5').val('');
        $('#detail').val('');
        $('#datepicker').val('');
        $('#from').val('');
        $('#to').val('');

        $('#blah1').attr('src', 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg');
        $('#blah2').attr('src', 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg');
        $('#blah3').attr('src', 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg');
        $('#blah4').attr('src', 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg');
        $('#blah5').attr('src', 'https://wolper.com.au/wp-content/uploads/2017/10/image-placeholder.jpg');

    }

    function addHyphen(element) {
        var el = document.getElementById(element.id);
        el = el.value.split('-').join('');
        el = el.toUpperCase();
        var finalVal = el.match(/.{1,2}/g).join('-');
        document.getElementById(element.id).value = finalVal;
    }

    $(document).ready(function () {
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

        
        $('#complaintForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData($('#complaintForm')[0]);

            $.ajax({
              url: "ajax/register_complaint.php",
              type: "POST",
              data: formData,
              processData: false,  // tell jQuery not to process the data
              contentType: false,   // tell jQuery not to set contentType
              success: function(data) {
                clearForm();
                Swal.fire({
                      icon: 'success',
                      title: 'success',
                      text: data
                    });

                 // console.log("PHP Output:");
                 //    console.log( data );
                 // $('#complaintForm')[0].reset();

              },
              error: function(err) {
                console.log(err);
              }
           
            });
        });


        // $('#complaintForm').submit(function(e) {
        //     e.preventDefault();
        //     var formData = new FormData($('#complaintForm')[0]);

        //     $.ajax({
        //       url: "ajax/register_complaint.php",
        //       type: "POST",
        //       data: formData,
        //       processData: false,  // tell jQuery not to process the data
        //       contentType: false,   // tell jQuery not to set contentType
        //       success: function(data) {
        //         // $('#complaintForm')[0].reset();
        //         Swal.fire({
        //               icon: 'success',
        //               title: 'success',
        //               text: data
        //             })

        //          // console.log("PHP Output:");
        //          //    console.log( data );

        //       },
        //       error: function(err) {
        //         console.log(err);
        //       }
           
        //     });
            
        // });

        
    

        



    });
    

    // $('#datepicker').on('focusout', function(){
    //     // $('#check_date').text('triggered');
    //     var date = $(this).val();
    //     $.ajax({
    //         url: "processCheckDate.php",
    //         method: "POST",
    //         data: {date:date},
    //         success: function(data){
    //             // $('#mesej').html(data);
    //             // $('#check_date').text('triggered');
    //             $('#check_date').text(data);
    //             // alert(data);
    //         },
    //         error: function() {
    //             alert('error handling here');
    //         }
    //     });
    // });

    

</script>
</html>