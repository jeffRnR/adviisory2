<?php
	require '../includes/config.php';
	ini_set('display_errors', 1);


	header('location: ../patient/book-session.php#book');
	
	
	if(isset($_POST['submit'])){
		$phone_number = filter_var($_POST['phone_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$category = filter_var($_POST['category'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$therapist = filter_var($_POST['therapist'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$appdate = filter_var($_POST['appdate'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$apptime = filter_var($_POST['apptime'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$patient_id = $_SESSION['user-id'];
		

		

		if(!$phone_number){
			$_SESSION['missing-data'] = "Mpesa number required!";
		}
		elseif(!$category){
			$_SESSION['missing-data'] = "Please select a category!";
		}
		elseif(!$therapist){
			$_SESSION['missing-data'] = "Please select a therapist!";
		}
		elseif(!$appdate){
			$_SESSION['missing-data'] = "Please select your preferred appointment date!";
		}
		elseif(!$apptime){
			$_SESSION['missing-data'] = "Please select your preferred appointment date!";
		}
		elseif(!strlen($phone_number) == 10){
			$_SESSION['missing-data'] = "Please enter a valid phone number!";

		}
		else{			
			
			$query = "SELECT * FROM user WHERE role = 'therapist' AND fname = '$therapist'";
			$result = mysqli_query($conn, $query);	
			

			if($result){							
				$row = mysqli_fetch_assoc($result);				
				$rowid = $row['user_id'];
				

				$user_query = "SELECT * FROM user WHERE user_id = '$patient_id'";
				$user_result = mysqli_query($conn, $user_query);

				if($user_result){
					$row = mysqli_fetch_assoc($user_result);
				}
					
				$insert_query = "INSERT INTO book_session (booked_by, patient_name, phone_number, category, therapist, therapist_name, appdate, apptime) VALUES ('$patient_id','{$row['fname']}', '$phone_number', '$category', '$rowid', '$therapist', '$appdate','$apptime')";
				$insert_result = mysqli_query($conn, $insert_query);


				if ($insert_query) {
					$select_query = "SELECT * FROM book_session";
					$select_result = mysqli_query($conn, $select_query);
					if(mysqli_num_rows($select_result) == 1){
						$row = mysqli_fetch_assoc($select_result);
						$_SESSION['book-id'] = $row['session_id'];
					}
					else{
						echo "none!";
					}
						
				}

				if(isset($_SESSION['missing-data'])){			
					$_SESSION['book-data'] = $_POST;					
				}else{
					$_SESSION['book-success'] = "Your session has been booked successfully";
				}
			
				
			}

		}	

				
	}	



?>