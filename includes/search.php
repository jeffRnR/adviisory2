

<?php
require '../includes/config.php';

$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

$query = "SELECT * FROM user WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
	$output .= "user found";
}else{
	$output .="No user matched";
}

?>

