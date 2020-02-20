<?php 
session_start();
include "../include/db.php";

if (isset($_SESSION['user']['userId'])) {
    $complainer_id = $_SESSION['user']['userId'];
} else $complainer_id = 0;

 
if (isset($_POST['no_bilik'])) {
   
   $no_bilik = $conn->real_escape_string($_POST['no_bilik']);
   $complaint_type = $conn->real_escape_string($_POST['complaint_type']);
   $detail = $conn->real_escape_string($_POST['detail']);
   $available_date = $conn->real_escape_string($_POST['tarikh']);
   $available_time = $conn->real_escape_string($_POST['dari']).'-'.$conn->real_escape_string($_POST['hingga']);

   $gen_id = random_string(5);


   // img
   // columns
   // `id`, `complainer_id`, `technician_id`, `status_id`, `room_no`, `complaint_type`, `img1`, `img2`, `img3`, `detail`, `available_date`, `available_time`, `date_added`, `date_modified`SELECT * FROM `complaints` WHERE 1

    if ($_FILES["img1"]["error"] == UPLOAD_ERR_OK) {
     $folderLocation = "../images"; 
     if (!file_exists($folderLocation)) mkdir($folderLocation);

     if (move_uploaded_file($_FILES["img1"]["tmp_name"], "$folderLocation/" . basename($_FILES["img1"]["name"])) 
         && move_uploaded_file($_FILES["img2"]["tmp_name"], "$folderLocation/" . basename($_FILES["img2"]["name"])) 
         && move_uploaded_file($_FILES["img3"]["tmp_name"], "$folderLocation/" . basename($_FILES["img3"]["name"]))) {

        $img = [
            basename($_FILES["img1"]["name"]),
            basename($_FILES["img2"]["name"]),
            basename($_FILES["img3"]["name"])
        ];

         if ($conn->query("INSERT INTO complaints(
            complaint_id,
            complainer_id, 
            room_no,
            complaint_type,
            img1,
            img2,
            img3,
            detail,
            available_date,
            available_time
           ) 
            VALUES('{$gen_id}', {$complainer_id},'{$no_bilik}', '{$complaint_type}', '{$img[0]}', '{$img[1]}', '{$img[2]}', '{$detail}', '{$available_date}', '{$available_time}')")) {
             echo "Aduan berjaya dihantar!";


             // Send Email to user after successfully save complaint to db
             
         } else {
             die($conn->error);
             exit();
         }
     } else {
         echo "Error!";
     }
        
        
 } else {
     echo "Error uploading the file!";
 }

}

function random_string($length) {
  $key = '';
  $keys = array_merge(range(0, 9), range('a', 'z'));
  for ($i=0; $i < $length; $i++) { 
    $key .= $keys[array_rand($keys)];
  }
  return $key;
}

// print_r($_POST);
// print_r($_FILES);


// Array
// (
//     [no_bilik] => WW-WW-WW
//     [complaint_type] => electrical
//     [detail] => <p>wwwwwwwwwwwwwwww</p>
//     [tarikh] => 31/01/2020
//     [dari] => 9:00am
//     [hingga] => 11:30am
// )
// Array
// (
//     [img1] => Array
//         (
//             [name] => download.jpg
//             [type] => image/jpeg
//             [tmp_name] => C:\xampp\tmp\phpE083.tmp
//             [error] => 0
//             [size] => 6824
//         )

//     [img2] => Array
//         (
//             [name] => images.png
//             [type] => image/png
//             [tmp_name] => C:\xampp\tmp\phpE093.tmp
//             [error] => 0
//             [size] => 4215
//         )

//     [img3] => Array
//         (
//             [name] => dropbox.jpg
//             [type] => image/jpeg
//             [tmp_name] => C:\xampp\tmp\phpE094.tmp
//             [error] => 0
//             [size] => 441011
//         )

//     [files] => Array
//         (
//             [name] => 
//             [type] => 
//             [tmp_name] => 
//             [error] => 4
//             [size] => 0
//         )

// )




// if (isset($_POST['no_bilik'])) {
//     $complainer_id = $_SESSION['user']['userId'];

//     $no_bilik = $conn->real_escape_string(trim($_POST['no_bilik']));
//     $jenis_aduan = $conn->real_escape_string(trim($_POST['complaint_type']));
//     $detail      = $conn->real_escape_string(trim($_POST['detail']));
//     $tarikh =   $conn->real_escape_string(trim($_POST['tarikh']));
//     $masa   =   trim($_POST['dari']).' - '.trim($_POST['hingga']);

//     // chek masa
//     // $query_time = "SELECT tarikh FROM complaint_tbl WHERE tarikh = '$tarikh'";
//     // $query_exec = mysqli_query($conn, $query_time);

//     if ($_FILES["img1"]["error"] == UPLOAD_ERR_OK) {
// 		$folderLocation = "../images"; 
// 		if (!file_exists($folderLocation)) mkdir($folderLocation);

// 		if (move_uploaded_file($_FILES["img1"]["tmp_name"], "$folderLocation/" . basename($_FILES["img1"]["name"])) 
// 			&& move_uploaded_file($_FILES["img2"]["tmp_name"], "$folderLocation/" . basename($_FILES["img2"]["name"])) 
// 			&& move_uploaded_file($_FILES["img3"]["tmp_name"], "$folderLocation/" . basename($_FILES["img3"]["name"])) 
// 			&& move_uploaded_file($_FILES["img4"]["tmp_name"], "$folderLocation/" . basename($_FILES["img4"]["name"])) 
// 			&& move_uploaded_file($_FILES["img5"]["tmp_name"], "$folderLocation/" . basename($_FILES["img5"]["name"]))) {

// 			$img1 = basename($_FILES["img1"]["name"]);
// 			$img2 = basename($_FILES["img2"]["name"]);
// 			$img3 = basename($_FILES["img3"]["name"]);
// 			$img4 = basename($_FILES["img4"]["name"]);
// 			$img5 = basename($_FILES["img5"]["name"]);

// 			if ($conn->query("INSERT INTO complaint_tbl(complainer_id, no_bilik, jenis_complaint, detail, tarikh, masa) VALUES($complainer_id,'$no_bilik', '$jenis_aduan', '$detail', '$tarikh', '$masa')")) {
// 		    	echo "Aduan berjaya dihantar!";
// 		    } else {
// 		    	die($conn->connect_error);
// 		    	exit();
// 		    }
// 		} else {
// 			echo "Error!";
// 		}
		
		
// 	} else {
// 		echo "Error uploading the file!";
// 	}
			

			
    
//     // $query_exec = $conn->query($query_time);

//     // if ($query_exec) {
//     //     // $kira_masa_available = mysqli_num_rows($query_exec);
   

//     //     if ($query_exec->num_rows == 0) {
//     //         // Boleh buat aduan

//     //         $query = "INSERT INTO complaint_tbl(complainer_id, no_bilik, jenis_complaint, detail, tarikh, masa) VALUES($complainer_id,'$no_bilik', '$jenis_aduan', '$detail', '$tarikh', '$masa')";

//     //         if ($conn->query($query)) {
//     //             // echo "Aduan berjaya dihantar";
//     //             $msg = "Aduan berjaya dihantar";
//     //             // $last_id = mysqli_insert_id($conn);
//     //             $last_id = $conn->insert_id;
                
//     //         } else {
//     //             $msg = "Error";
//     //         }

//     //          // upload multiple image
//     //         for ($i=0; $i < count($_FILES["file_img"]["name"]) ; $i++) { 
                
//     //             $filetmp = $_FILES["file_img"]["tmp_name"][$i];
//     //             $filename = $_FILES["file_img"]["name"][$i];
//     //             $filetype = $_FILES["file_img"]["type"][$i];
//     //             $filepath = "photo/".$filename;

//     //             move_uploaded_file($filetmp, $filepath);

//     //             $sql = "INSERT INTO upload_img(complaint_id, img_name, img_path, img_type) ";
//     //             $sql .= "VALUES('$last_id', '$filename', '$filepath', '$filetype')";

//     //             $result = mysqli_query($conn, $sql);
//     //         }
//     //     } else {

//     //         $msg = "Tarikh penyelenggaraan telah di booking, sila pilih tarikh lain";
//     //     }
//     // }
    
// }


 ?>