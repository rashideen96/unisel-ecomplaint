<?php 

session_start();
include('include/db.php');
if (!isset($_SESSION['id']) && $_SESSION['role'] == 'admin') header('Location: index.php');
 ?>