<?php

require '../includes/patient_auth.php';

if(isset($_POST['submit'])){
	header('location: ../patient/current-password.php');
	$_SESSION['edit'] = "Enter current password";
	$verify_password = filter_var($_POST['verify-password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	if(isset($_SESSION['user-id'])){
		$sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = {$_SESSION['user-id']}");
		$row = mysqli_fetch_assoc($sql);
		if($verify_password == $row['password']){			
			$_SESSION['proceed'] = "Correct password";
			header ('location: ../patient/profile.php');
		}else{
			$_SESSION['not-proceed'] = "You keyed in the wrong password";
		}
	}	
}

if (isset($_POST['save'])){
	header('location: ../patient/profile.php');
	//$avatar = filter_var($_POST['avatar'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$fname = filter_var($_POST['fname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$lname = filter_var($_POST['lname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$changepassword = filter_var($_POST['changepassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$newpassword	= filter_var($_POST['newpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

	if(!empty($changepassword)){
		if($changepassword != $patient_record['password']){
			$_SESSION['wrong-password'] = "You keyed in the wrong password";
		}
		elseif(empty($newpassword)){
			$_SESSION['no-password'] = "Please enter a new password";
		}
	}elseif(!empty($newpassword)){
		$query = mysqli_query($conn, "UPDATE user SET avatar = '$avatar', fname = '$fname', lname = '$lname', email = '$email', password = '$newpassword' WHERE user_id = '{$_SESSION['user-id']}'");

		if($query){
			$_SESSION['edit-success'] = "Your changes have been saved";	
		}
	}
	else{
		$query2 = mysqli_query($conn, "UPDATE user SET avatar = '$avatar', fname = '$fname', lname = '$lname', email = '$email' WHERE user_id = '{$_SESSION['user-id']}'");
		if($query2){
			$_SESSION['edit-success'] = "Your changes have been saved";	
		}
	}
	
	
}






?>