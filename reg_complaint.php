<?php
session_start();
if (isset($_SESSION['id']) && $_SESSION['role'] == 'student' || $_SESSION['role'] == 'staff'){

} else{
    header('Location: login.php');
}


// mesej variable
$msg='';
if (isset($_POST['daftar'])) {

    include "include/db.php";
    // id complainer
    $complainer_id = $_SESSION['id'];

    $no_bilik    = strtoupper(mysqli_real_escape_string($conn, trim($_POST['no_bilik'])));
    $jenis_aduan = mysqli_real_escape_string($conn, trim($_POST['complaint_type']));
    $detail      = mysqli_real_escape_string($conn, $_POST['detail']);
    $tarikh =   mysqli_real_escape_string($conn, trim($_POST['tarikh']));
    $masa   =   trim($_POST['dari']).' - '.trim($_POST['hingga']);

    // chek masa
    $query_time = "SELECT tarikh FROM complaint_tbl WHERE tarikh = '$tarikh'";
    $query_exec = mysqli_query($conn, $query_time);

    if ($query_exec) {
        $kira_masa_available = mysqli_num_rows($query_exec);

        if ($kira_masa_available == 0) {
            // Boleh buat aduan

            $query = "INSERT INTO complaint_tbl(complainer_id, no_bilik, jenis_complaint, detail, tarikh, masa) VALUES($complainer_id,'$no_bilik', '$jenis_aduan', '$detail', '$tarikh', '$masa')";

            if (mysqli_query($conn, $query)) {
                // echo "Aduan berjaya dihantar";
                $msg = "Aduan berjaya dihantar";
                $last_id = mysqli_insert_id($conn);
                
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
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <title>Register Complaint</title>
</head>
<body>
<div class="w3-center">
    <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="top-logo">
    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
</div>
<br>
<div class="w3-container">
    <div class="w3-bar w3-light-grey w3-border w3-card-2">
        <a href="dashboard.php" class="w3-bar-item w3-button w3-border-right">Home</a>
        <a href="reg_complaint.php" class="w3-bar-item w3-button w3-border-right w3-gray">Register Complaint</a>
        <a href="status_complaint.php" class="w3-bar-item w3-button w3-border-right">Status Complaint</a>
        <a href="help1.php" class="w3-bar-item w3-button w3-border-right">Bantuan</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-right w3-border-left">Logout</a>
    </div>
    <br>

</div>
<div class="w3-container">
    <div class="w3-cell-row">

        <div class="w3-container w3-cell">
            <?php 

            if (isset($msg)) {
                echo "<h4 class=\"w3-center\">{$msg}</h4>";
            }
             ?>

            <form action="" method="post" enctype="multipart/form-data">
            <table class="w3-table w3-border">
                <tbody>
                <tr>
                    <th style="width: 20%">Room No / No bilik</th>
                    <td><input type="text" class="w3-input w3-border" placeholder="A3-2F-U4" name="no_bilik" id="no_bilik" required autocomplete="off"></td>
                </tr>
                <tr>
                    <th>Complaint Type / Jenis Aduan</th>
                    <td>
                        <select name="complaint_type" class="w3-input w3-border" id="" required>
                            <option value="">Please Select</option>
                            <option value="electrical">Electrical / Peralatan Elektrik</option>
                            <option value="wifi">Modem / Wifi</option>
                            <option value="furniture">Furniture / Perabot</option>
                            <option value="civil">Civil / Sivil</option>
                            <option value="security">Security / Keselamatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Attachment / File / Gambar</th>
                    <td><input type="file" name="file_img[]" multiple>*Minimum 5 gambar</td>

                </tr>

                <tr>
                    <th>Detail / Ulasan </th>
                    <td><textarea name="detail" id="" cols="30" rows="10" placeholder="Detail masalah..." class="w3-input w3-border"></textarea></td>
                </tr>
                <tr>
                    <th>Date / Tarikh penyelenggaraan</th>
                    <td><input type="text" name="tarikh" id="datepicker" class="w3-input w3-border" autocomplete="off" readonly><span id="check_date"></span></td>
                </tr>
                <tr>
                    <th>Available time / Waktu penyelenggaraan</th>
                    <td>From<input type="text" name="dari" class="" id="from">
                        To<input type="text" name="hingga" class="" id="to">
                    </td>

                </tr>
                <tr>
                    <th colspan="2" class="w3-center"><input type="submit" name="daftar"
                                                             class="w3-button w3-light-grey" id="daftar" value="Daftar">
                        <input type="reset" name="reset" class="w3-button w3-light-grey" value="Batal"></th>

                </tr>

                </tbody>
            </table>
            </form>
        </div>
        <div class="w3-container w3-cell" style="width: 200px;">

            <ul class="w3-ul">
                
                <li><a href="#"><img src="https://static.thenounproject.com/png/461886-200.png" alt="" width="30px"
                                     height="30px">Manual</a></li>
            </ul>

        </div>
    </div>


    <br>
    <?php require_once "include/footer.php"; ?>

</div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script>

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
                    url: "processCheckDate.php",
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