<?php
ob_start();
session_start();

unset($_SESSION['id']);
unset($_SESSION['role']);

if (session_destroy()) {
	header('Location: login.php');
	exit();
}


?>