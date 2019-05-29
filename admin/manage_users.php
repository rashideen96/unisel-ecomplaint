<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] == 'admin'){

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

<?php include "include/nav.php"; ?>
<div class="w3-container">
    <div class="w3-cell-row">

        <div class="w3-container w3-cell">


            <table class="w3-table w3-table-all w3-bordered" id="myTable">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Jawatan</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No ID</th>
                    <th>No Telefon</th>
                    <th>Faculty</th>
                    <th>Lihat</th>
                </tr>
                </thead>
                <tbody>
                    <?php 


                    $sql = "SELECT * FROM users";
                    $query = mysqli_query($conn, $sql); 

                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            $id = $row['userId'];
                            $jawatan = $row['role'];
                            $nama = $row['name'];
                            $email = $row['email'];
                            $no_id = $row['matricNum'];
                            $no_telefon = $row['phoneNum'];
                            $fakulti = $row['faculty'];


                            echo "<tr>";
                            echo "<td>{$id}</td>";                          
                            echo "<td>{$jawatan}</td>";
                            echo "<td>{$nama}</td>";
                            echo "<td>{$email}</td>";
                            echo "<td>{$no_id}</td>";
                            echo "<td>{$no_telefon}</td>";
                            echo "<td>{$fakulti}</td>";
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