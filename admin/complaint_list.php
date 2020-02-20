<?php include "include/session.php"; ?>
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

<?php include "include/nav.php"; ?>
<div class="w3-container">
    <div class="w3-cell-row">

        <div class="w3-container w3-cell">


            <table class="w3-table w3-table-all w3-bordered" id="myTable">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pengadu</th>
                    <th>Technician</th>
                    <th>No Bilik</th>
                    <th>Jenis Aduan</th>
                    <th>Detail</th>
                    <th>Tarikh Temuduga</th>
                    <th>Masa Temuduga</th>
                    <th>Status</th>
                    <th>Lihat</th>
                </tr>
                </thead>
                <tbody>
                    <?php 


                    $sql = "SELECT * FROM complaint_tbl";
                    $query = mysqli_query($conn, $sql); 

                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            $id = $row['id'];
                            $id_pengadu = $row['complainer_id'];
                            $id_technician = $row['technician_id'];
                            $no_bilik = $row['no_bilik'];
                            $jenis_aduan = $row['jenis_complaint'];
                            $detail = substr($row['detail'], 0, 10)."...";
                            $tarikh_temuduga = $row['tarikh'];
                            $masa = $row['masa'];
                            $status = $row['status'];

                            echo "<tr>";
                            echo "<td>{$id}</td>";

                            // check pengadu is exist or not
                            if (empty($id_pengadu)) {
                                echo "<td>Tiada ID/Nama</td>";
                            } else {
                                $complainer_sql = mysqli_query($conn, "SELECT name FROM users WHERE userId = $id_pengadu");
                                if ($complainer_sql) {

                                    while ($row = mysqli_fetch_assoc($complainer_sql)) {
                                        $nama_pengadu = $row['name'];
                                        echo "<td>{$nama_pengadu}</td>";
                                    }
                                    
                                }
                            }
                            if (empty($id_technician)) {
                               echo "<td>Belum Disetkan</td>";
                            } else {
                                $technician_sql = mysqli_query($conn, "SELECT * FROM technician WHERE id=$id_technician");
                                if ($technician_sql) {
                                    while ($row = mysqli_fetch_assoc($technician_sql)) {
                                        $nama_technician = $row['name'];
                                        echo "<td>{$nama_technician}</td>";
                                    }
                                }
                            }
                            
                            echo "<td>{$no_bilik}</td>";
                            echo "<td>{$jenis_aduan}</td>";
                            echo "<td>{$detail}</td>";
                            echo "<td>{$tarikh_temuduga}</td>";
                            echo "<td>{$masa}</td>";
                            echo "<td>{$status}</td>";
                            echo "<td><a href=\"complaint_detail.php?id={$id}\" class=\"w3-button w3-light-gray w3-border\">Lihat</a></td>";
                            echo "</tr>";
                        }
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