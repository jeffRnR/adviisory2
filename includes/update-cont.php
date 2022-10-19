<?php
require '../includes/config.php';
$id = $_SESSION['user-id'];

$row = mysqli_escape_string($conn, $_GET['update']);
if($row){	
	$_SESSION['update-cont'] = $row;
	echo $_SESSION['update-cont'];	
	header('location: ../patient/contact-update.php');
	die();	
}


?>