<?php
require '../includes/config.php';
$id = $_SESSION['user-id'];

if(isset($_POST['submit'])){
	$phone_number = filter_var($_POST['phone_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$category = filter_var($_POST['category'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$therapist = filter_var($_POST['therapist'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$appdate = filter_var($_POST['appdate'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$apptime = filter_var($_POST['apptime'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$rowid = $_SESSION['rowid'];

	$select_query = mysqli_query($conn, "SELECT * FROM user where fname = '$therapist'");
	$row = mysqli_fetch_assoc($select_query);
	$_SESSION['therapist-id-change'] = $row['user_id'];
	$therapist_id = $_SESSION['therapist-id-change'];

	$update_query = mysqli_query($conn, "UPDATE book_session SET phone_number = '$phone_number', category ='$category', therapist = '$therapist_id', therapist_name = '$therapist', appdate = '$appdate', apptime = '$apptime'");
	if($query){
		$_SESSION['update-success'] = "Changes saved successfully";
	}
	header('location: ../patient/manage-session.php');
	

	
}

?>