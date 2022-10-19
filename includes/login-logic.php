<?php

require '../includes/connect.php';
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
	header('location: ../patient/login.php');
	$email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

	if(!$email){
		$_SESSION['login'] = "Email required!";
		header ('location../patient/login.php');
	}elseif(!$password){
		$_SESSION['login'] = "Password required!";
	}else{
		$fetch_user_query = "SELECT * FROM user WHERE email='$email' ";
		$fetch_user_result = mysqli_query($conn, $fetch_user_query);

		if(mysqli_num_rows($fetch_user_result) == 1){
			$user_record = mysqli_fetch_assoc($fetch_user_result);
			$db_password = $user_record['password'];

			if(password_verify($password, $hashed_password = password_hash($user_record['password'], PASSWORD_DEFAULT))){
				$_SESSION['user-id'] = $user_record['user_id'];

				if($user_record['role'] == 'user'){
					$_SESSION['user_is_patient'] = true;
					header ('location: ../patient/dashboard.php');
				}

				if($user_record['role'] == 'admin'){
					$_SESSION['user_is_admin'] = true;


					/*redirect to admin dashboard*/
				}
				elseif($user_record['role'] =='therapist'){
					$_SESSION['user_is_therapist'] = true;
					/*redirect to therapist dashboard*/
					header ('location: ../therapist/index.php');
					$_SESSION['therapist-id'] = $user_record['user_id'];
				}
				
				
			}else{
				$_SESSION['login'] = 'Please check yout inputs';
			}

		}else {
			$_SESSION['login'] = "User not found";
		}
	}

	if(isset($_SESSION['login'])){
		$_SESSION['login-data'] = $_POST;
		header ('location../patient/login.php');
		
	}
}
else{
	header ("location: ../patient/login.php");
}
?>