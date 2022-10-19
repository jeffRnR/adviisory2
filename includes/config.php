<?php

require '../includes/connect.php';

$conn = new mysqli(DB_host, DB_user, DB_pass, DB_name);

if(mysqli_errno($conn)){
	die(mysqli_error($conn));
}
?>