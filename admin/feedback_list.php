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
    <title>Feedback</title>
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
                    <th>Nama</th>
                    <th>Emel</th>
                    <th>Maklum Balas</th>
                </tr>
                </thead>
                <tbody>
                <?php 

                    $sql = "SELECT * FROM feedback_tbl ORDER BY id DESC";
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            $id = $row['id'];
                            $nama = $row['nama'];
                            $email = $row['email'];
                            $maklumbalas = $row['maklumbalas'];

                            echo "<tr>";
                            echo "<td>{$id}</td>";
                            echo "<td>{$nama}</td>";
                            echo "<td>{$email}</td>";
                            echo "<td>{$maklumbalas}</td>";
                            echo "</tr>";
                        }

                    }
                 ?>
                
                </tbody>
            </table>

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
<script src="js/dataTables.min.js"></script>
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