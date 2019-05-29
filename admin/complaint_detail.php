<?php

session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] == 'admin'){

} else{
  header('Location: index.php');
}
include "include/db.php";
if (isset($_GET['id'])) {
    $complaint_id = $_GET['id'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
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
            <a href="complaint_list.php" class="w3-button w3-light-gray w3-border">< Back</a><br><br>
            <?php 

            $sql = "SELECT id, name, matricNum, role, faculty, phoneNum, technician_id,jenis_complaint, detail, no_bilik, tarikh, masa, status FROM users, complaint_tbl WHERE users.userId = complaint_tbl.complainer_id AND id=$complaint_id";


            $query = mysqli_query($conn, $sql);
            if ($query) {
                
                while ($row = mysqli_fetch_assoc($query)) {
                    
                    // Student info
                    $complaint_id = $row['id'];
                    $name = $row['name'];
                    $matric_number = $row['matricNum'];
                    $jawatan = $row['role'];
                    $faculty = $row['faculty'];
                    $phone_num = $row['phoneNum'];

                    // complaint data
                    $technician_id = $row['technician_id'];
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
                if (mysqli_query($conn, $sql)) {
                    header("Location: complaint_detail.php?id=$complaint_id");
                } else {
                    die(mysqli_error($conn));
                }
            }

             ?>


            <table class="w3-table w3-border">
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
                    <th>Technician: </th>
                    
                        <td>
                            <select name="technician" id="technician" class="w3-input">
                                
                            <?php 

                            $sql_dept = "SELECT name FROM technician WHERE id=$technician_id";
                            $sql_qry = mysqli_query($conn, $sql_dept);
                            if ($sql_qry) {
                                while ($row = mysqli_fetch_assoc($sql_qry)) {
                                    $dept_id = $row['id'];
                                    $dept_name = $row['name'];
                                    echo "<option value=\"{$id}\">{$dept_name}</option>";
                                }
                            }

                            $technician_sql = "SELECT * FROM technician";
                            $technician_qry = mysqli_query($conn, $technician_sql);
                            if ($technician_sql) {
                                while ($row = mysqli_fetch_assoc($technician_qry)) {
                                    $id = $row['id'];
                                    $technician_name = $row['name'];
                                    echo "<option value=\"{$id}\">{$technician_name}</option>";
                                }
                            }
                             ?>
                        </select></td>
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
                $img_exec  = mysqli_query($conn, $img_query);

                if ($img_exec) {
                    while ($row = mysqli_fetch_assoc($img_exec)) {
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
            <table class="w3-table w3-border">
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
                    <td><select name="priority" id="priority" class="w3-input">
                            <option value="LOW">LOW</option>
                            <option value="MEDIUM">MEDIUM</option>
                            <option value="HIGH">HIGH</option>
                            <option value="CRITICAL">CRITICAL</option>
                        </select></td>
                </tr>
                <tr>
                    <th>Status: </th>
                    <td colspan="3"><select name="status" id="status" class="w3-input">
                            <?php echo "<option value=\"{$status}\">{$status}</option>" ?>
                            <option value="KIV">KIV</option>
                            <option value="Pending">Pending</option>
                            <option value="Closed">Closed</option>
                        </select></td>
                </tr>
                </tbody>
            </table>
            <br>
            <table class="w3-table w3-border">
                <tbody>
                <?php 

                    $sql = "SELECT * FROM message_tbl WHERE complaint_id=$complaint_id";
                    $ext = mysqli_query($conn, $sql);

                    if ($ext) {
                        while ($row = mysqli_fetch_assoc($ext)) {
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
                        <input type="text" class="w3-input w3-border" placeholder="Mesej" name="mesej" required>
                        <input type="submit" class="w3-button w3-light-gray" value="Hantar" name="send">
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
        
    </div>


    <br>


</div>

<div class="w3-container">
    <?php require_once "include/footer.php"?>
</div>




</body>
<script src="js/jquery.min.js"></script>
<script>
    $('#technician').on('change', function(){
        var data = $(this).val();
        window.location.href = "update_dept.php?id=<?php echo $complaint_id ?>&dept="+data;
    });

    $('#status').on('change', function(){

        var data = $(this).val();
        console.log(data);
        window.location.href = "update_status.php?id=<?php echo $complaint_id ?>&status="+data;
    });

    // $('#btn_kemaskini').on('click', function(e){
    //     e.preventDefault();
    //     // console.log('clicked');

    //     var dept = $('#technician').val();
    //     var status = $('#status').val();

    //     window.location.href = "update_dept.php?id=<?php echo $complaint_id ?>&dept="+data+"&status="+status;
    // });
</script>

</html>