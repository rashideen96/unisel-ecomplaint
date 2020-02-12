<?php 
session_start();
include "../include/db.php";
// print_r($_POST);
// print_r($_FILES);

if (isset($_POST['no_bilik'])) {
    $complainer_id = $_SESSION['user']['userId'];

    $no_bilik = $conn->real_escape_string(trim($_POST['no_bilik']));
    $jenis_aduan = $conn->real_escape_string(trim($_POST['complaint_type']));
    $detail      = $conn->real_escape_string(trim($_POST['detail']));
    $tarikh =   $conn->real_escape_string(trim($_POST['tarikh']));
    $masa   =   trim($_POST['dari']).' - '.trim($_POST['hingga']);

    // chek masa
    // $query_time = "SELECT tarikh FROM complaint_tbl WHERE tarikh = '$tarikh'";
    // $query_exec = mysqli_query($conn, $query_time);

    if ($_FILES["img1"]["error"] == UPLOAD_ERR_OK) {
		$folderLocation = "../images"; 
		if (!file_exists($folderLocation)) mkdir($folderLocation);

		if (move_uploaded_file($_FILES["img1"]["tmp_name"], "$folderLocation/" . basename($_FILES["img1"]["name"])) 
			&& move_uploaded_file($_FILES["img2"]["tmp_name"], "$folderLocation/" . basename($_FILES["img2"]["name"])) 
			&& move_uploaded_file($_FILES["img3"]["tmp_name"], "$folderLocation/" . basename($_FILES["img3"]["name"])) 
			&& move_uploaded_file($_FILES["img4"]["tmp_name"], "$folderLocation/" . basename($_FILES["img4"]["name"])) 
			&& move_uploaded_file($_FILES["img5"]["tmp_name"], "$folderLocation/" . basename($_FILES["img5"]["name"]))) {

			$img1 = basename($_FILES["img1"]["name"]);
			$img2 = basename($_FILES["img2"]["name"]);
			$img3 = basename($_FILES["img3"]["name"]);
			$img4 = basename($_FILES["img4"]["name"]);
			$img5 = basename($_FILES["img5"]["name"]);

			if ($conn->query("INSERT INTO complaint_tbl(complainer_id, no_bilik, jenis_complaint, detail, tarikh, masa) VALUES($complainer_id,'$no_bilik', '$jenis_aduan', '$detail', '$tarikh', '$masa')")) {
		    	echo "Aduan berjaya dihantar!";
		    } else {
		    	die($conn->connect_error);
		    	exit();
		    }
		} else {
			echo "Error!";
		}
		
		
	} else {
		echo "Error uploading the file!";
	}
			

			
    
    // $query_exec = $conn->query($query_time);

    // if ($query_exec) {
    //     // $kira_masa_available = mysqli_num_rows($query_exec);
   

    //     if ($query_exec->num_rows == 0) {
    //         // Boleh buat aduan

    //         $query = "INSERT INTO complaint_tbl(complainer_id, no_bilik, jenis_complaint, detail, tarikh, masa) VALUES($complainer_id,'$no_bilik', '$jenis_aduan', '$detail', '$tarikh', '$masa')";

    //         if ($conn->query($query)) {
    //             // echo "Aduan berjaya dihantar";
    //             $msg = "Aduan berjaya dihantar";
    //             // $last_id = mysqli_insert_id($conn);
    //             $last_id = $conn->insert_id;
                
    //         } else {
    //             $msg = "Error";
    //         }

    //          // upload multiple image
    //         for ($i=0; $i < count($_FILES["file_img"]["name"]) ; $i++) { 
                
    //             $filetmp = $_FILES["file_img"]["tmp_name"][$i];
    //             $filename = $_FILES["file_img"]["name"][$i];
    //             $filetype = $_FILES["file_img"]["type"][$i];
    //             $filepath = "photo/".$filename;

    //             move_uploaded_file($filetmp, $filepath);

    //             $sql = "INSERT INTO upload_img(complaint_id, img_name, img_path, img_type) ";
    //             $sql .= "VALUES('$last_id', '$filename', '$filepath', '$filetype')";

    //             $result = mysqli_query($conn, $sql);
    //         }
    //     } else {

    //         $msg = "Tarikh penyelenggaraan telah di booking, sila pilih tarikh lain";
    //     }
    // }
    
}


 ?>