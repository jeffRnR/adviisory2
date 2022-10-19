

<?php

require '../includes/patient_auth.php';
ini_set('display_errors', 0);


$fetch_contact_query ="SELECT * FROM emergency_contact WHERE added_by = {$_SESSION['user-id']}";
$fetch_contact_result = mysqli_query($conn, $fetch_contact_query);
if(mysqli_num_rows($fetch_contact_result) >= 0){
	$contact_record = mysqli_fetch_assoc($fetch_contact_result);		
}		




/*$fetch_contact_query ="SELECT * FROM emergency_contact ";
$fetch_contact_result = mysqli_query($conn, $fetch_contact_query);
$contact_record = mysqli_fetch_assoc($fetch_contact_result);*/
?>