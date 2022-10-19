

<?php
//require "../includes/connect.php";

	require '../includes/patient_auth.php';
	ini_set('display_errors', 1);
	if(isset($_SESSION['user-id'])){
		$id = $_SESSION['user-id'];
		$incoming_id = mysqli_real_escape_string($conn, $_REQUEST['incoming_id']);
		$outgoing_id = mysqli_real_escape_string($conn, $_REQUEST['outgoing_id']);
		$message = mysqli_real_escape_string($conn, $_REQUEST['message']);
ECHO $incoming_id;
		if(!empty($message)){	
			$query =  "INSERT INTO chat (incoming_msg_id, outgoing_msg_id, message) VALUES ('$incoming_id', '$outgoing_id', '$message')";


			$florish= mysqli_query($conn, $query);

			header('location: ../patient/chat.php?user_id='.$incoming_id);
		}
	}
?>