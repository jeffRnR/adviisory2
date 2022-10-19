<?php
require '../includes/config.php';
//header('location: ../patient/contact-list.php');
$id = $_SESSION['user-id'];





if(mysqli_real_escape_string($conn, $_GET['delete'])){	
	$sql = mysqli_query($conn, "UPDATE emergency_contact SET is_deleted = '1' WHERE contact_id = '{$_GET['delete']}'");
	header('location: ../patient/contact-list.php');
}
elseif(mysqli_fetch_assoc($conn, $_GET['update'])){
	$id = $_GET['update'];
	$fname = filter_var($_POST['fname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$lname = filter_var($_POST['lname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$contnumber = filter_var($_POST['contnumber'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

	$query = "UPDATE emergency_contact SET contact_fname = '$fname', contact_lname = '$lname', contact_number = '$contnumber' WHERE contact_id = '$id'";
	$result = mysqli_query($conn, $query);
	header('location: ../patient/contact-list.php');

	
}


?>