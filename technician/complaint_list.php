<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] == 'technician'){

} else{
  header('Location: index.php');
}

include "include/db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css">
    <title>login</title>
</head>

<body>

<div class="w3-center">

    <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="top-logo">
    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
</div>
<br>

<div class="w3-container">
    <div class="w3-bar w3-light-grey w3-card-2">
        <a href="dashboard.php" class="w3-bar-item w3-button w3-border-right">Home</a>
        <a href="complaint_list.php" class="w3-bar-item w3-button w3-border-right">Senarai Aduan</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-right w3-border-left">Logout</a>
    </div>
    <br>

</div>
<div class="w3-container">
    <div class="w3-cell-row">

        <div class="w3-container w3-cell">


            <table class="w3-table w3-table-all w3-bordered" id="myTable">
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
                    $technician_id = $_SESSION['id'];
                    $sql = "SELECT id, technician_id, name, role, jenis_complaint, no_bilik FROM users, complaint_tbl WHERE users.userId=complaint_tbl.complainer_id AND technician_id=$technician_id";
                    $exec = mysqli_query($conn, $sql);

                    if ($exec) {
                        $chek_data = mysqli_num_rows($exec);

                        if ($chek_data == 0) {
                            // echo "<h4>Tiada Data</h4>";
                        } else {

                            while ($row = mysqli_fetch_assoc($exec)) {
                                
                                $id = $row['id'];
                                $jenis_complaint = $row['jenis_complaint'];

                                echo "<tr>";
                                echo "<td>{$id}</td>";
                                echo "<td>{$jenis_complaint}</td>";
                                echo "<td>pending</td>";
                                echo "<td><a href=\"complaint_detail.php?id={$id}\"><i class=\"fas fa-pencil fa-2x\"></i>lihat</a></td>";
                                echo "</tr>";
                            }
                        
                        }
                    } else {
                        die(mysqli_error($conn));
                    }
                    
                     
                    ?>
                
                </tbody>
            </table>

        </div>
    
    </div>


    <br>
    <?php require_once "include/footer.php"; ?>

</div>




</body>
<script src="js/jquery.min.js"></script>
<script src="js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
<script>
    $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'lfrtipB',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        } );
</script>

</html>