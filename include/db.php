<?php


$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'ecomplaint';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn){
    die('failed to connect to database'.mysqli_error($conn));
    exit();
}
?>