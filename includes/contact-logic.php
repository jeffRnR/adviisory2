<?php

require '../includes/patient_auth.php';
session_start();

ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['submit'])){
	$fname = filter_var($_POST['fname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$lname = filter_var($_POST['lname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$contnumber = filter_var($_POST['contnumber'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);	

	if(!$fname){
		$_SESSION['contact'] = "Some fields are missing!";
	}
	elseif(!$lname){
		$_SESSION['contact'] = "Some fields are missing!";
	}
	elseif(!$contnumber){
		$_SESSION['contact'] = "Some fields are missing!";
	}
	elseif(strlen($contnumber)<10){
		$_SESSION['contact'] = "Enter valid phone number length";
	}
	else{
		$contact_check_query = "SELECT * FROM emergency_contact WHERE contact_number = '$contnumber'";
		$contact_check_result  = mysqli_query($conn, $contact_check_query);
		/*$fetch_user_query = "SELECT * FROM user";
		$fetch_user_result = mysqli_query($conn, $fetch_user_query);
		$user_record = mysqli_fetch_assoc($fetch_user_result);
		$user_id = $user_record['user_id'];*/
		if(mysqli_num_rows($contact_check_result) > 0){
			$_SESSION['contact'] = "This contact is already saved!";
		}
	}
	if(isset($_SESSION['contact'])){
		$_SESSION['contact-data'] = $_POST;
		header('location: ../patient/emergency-contact.php');
	
	}else{
		$insert_contact_query = "INSERT INTO emergency_contact (contact_fname, contact_lname, contact_number, added_by) VALUES ('$fname','$lname','$contnumber','{$_SESSION['user-id']}')";
		$contact_check_insert= mysqli_query($conn, $insert_contact_query);

		$fetch_query = "SELECT * FROM emergency_contact";
		$fetch_result = mysqli_query($conn, $fetch_query);
		$contact_record = mysqli_fetch_assoc($fetch_result);

		$_SESSION['contact-id'] = $contact_record['contact_id'];

			
		if(!mysqli_errno($conn)){		
			$_SESSION['contact-success'] = 'The contact has been saved successfully';
				ECHO $fname.$lname.$contnumber;
			header('location: ../patient/emergency-contact.php');
		}elseif(!mysqli_errno($conn)){		
			$_SESSION['contact-add'] = 'Add';
				ECHO $fname.$lname.$contnumber;
			header('location: ../patient/emergency-contact.php');
		}
	}		
	

}
else{
	header('location: ../patient/emergency-contact.php');
}

?>