<?php

ini_set('display_errors', 1);
require '../includes/config.php';

/*
if(isset($_SESSION['user-id'])){
	$_SESSION['get-data'] = $_SESSION['user-id'];
	header('location: ../patient/dashboard.php
		')


ini_set('display_errors', 0);
$all_users_fetch = "SELECT * FROM user";
$all_users_result = mysqli_query($conn, $all_users_fetch);
$user_record = mysqli_fetch_assoc($all_users_result);
$_SESSION['user-id'] = $user_record['user_id'];


	$fetch_user_query = "SELECT * FROM user WHERE user_id = {$_SESSION['user-id']}";
	$fetch_user_result = mysqli_query($conn, $fetch_user_query);

	if(mysqli_num_rows($fetch_user_result) == 1){
		$patient_record = mysqli_fetch_assoc($fetch_user_result);
	}	
$idd=$_SESSION['user-id'];

	 $fetch_contact_query ="SELECT * FROM emergency_contact WHERE added_by ='$idd'"; 
	$fetch_contact_result = mysqli_query($conn, $fetch_contact_query);
	$contact_record = mysqli_fetch_assoc($fetch_contact_result);

	if(mysqli_num_rows($fetch_contact_query) == 1){
		$_SESSION['added-by'] = $contact_record['added_by']; 
	}

}
/*$_SESSION['user-id'] = $contact_record['added_by'];*/




/*$fetch_all_query = "SELECT * FROM user";
$fetch_all_result = mysqli_query($conn, $fetch_all_query);
$record = mysqli_fetch_assoc($fetch_all_result);

if($record == $_SESSION['user-id']){
	echo "hi";
}*/

if (isset($_SESSION['user-id'])) {
	$fetch_all_query = "SELECT * FROM user WHERE user_id = {$_SESSION['user-id']}";
	$fetch_all_result = mysqli_query($conn, $fetch_all_query);
	$patient_record = mysqli_fetch_assoc($fetch_all_result);
}








	




?>