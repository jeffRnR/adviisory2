<?php
session_start();
require "../includes/connect.php";

ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = new mysqli(DB_host, DB_user, DB_pass, DB_name);

if(isset($_POST['submit'])){
	$fname = filter_var($_POST['fname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$lname = filter_var($_POST['lname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
	
	$createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);	
	$avatar = $_FILES['avatar'];
	$role = 'user';
	
	if(!$fname){
		$_SESSION['signup'] = "Some fields are missing";
	}elseif(!$lname){
		$_SESSION['signup'] = "Some fields are missing";
	}elseif(!$email){
		$_SESSION['signup'] = "Enter a valid email";
	}elseif(strlen($createpassword) < 6 || strlen($confirmpassword) < 6){
		$_SESSION['signup'] = "Password should be 6 or more characters!";
	}else{
		if($createpassword !== $confirmpassword){
			$_SESSION['signup'] = "Passwords do not match";
		}
		else{
			

			$user_check_query = "SELECT * FROM user WHERE email = '$email'";
			$user_check_result = mysqli_query($conn, $user_check_query);

			if(mysqli_num_rows($user_check_result) > 0){
				$_SESSION['signup'] = "The email is already registerd!";
			}else{
				$time = time();
				$avatar_name = $time. $avatar['name'];
				$avatar_tmp_name = $avatar['tmp_name'];
				$avatar_destination_path = 'images/' .$avatar_name;

				$allowed_files = ['png', 'jpg', 'jpeg'];
				$extension = explode('.', $avatar_name);
				$extension = end($extension);

				if(in_array($extension, $allowed_files)){
					if($avatar['size'] < 1000000){
						move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
					}else{
						$_SESSION['signup-img'] = 'File size too big. Should be less than 1mb.';
					}
				}else{
					$_SESSION['signup-img'] = "File should be an image!";
				}
			}				
		}
	}	

	if(isset($_SESSION['signup'])){

		$_SESSION['signup-data'] = $_POST;

		header('location: ../patient/signup.php');
		die();
	}else{

//require "../includes/connect.php";
		$insert_user_query = "INSERT INTO user (fname, lname, email, password, role, avatar) VALUES ('$fname','$lname','$email','$createpassword', '$role','$avatar_name')";
		$user_check_insert= mysqli_query($conn, $insert_user_query);
		if(!mysqli_errno($conn)){

		
			$_SESSION['signup-success'] = 'Registration was successful Please login';
				//ECHO $fname.$lname.$email.$createpassword.$role.$avatar_name;


			header('location: ../patient/login.php');
		}
	}

}else{
	header('Location: ../patient/signup.php');
	die();
}

?>