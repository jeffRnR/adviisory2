<?php
require '../includes/config.php';


$row = mysqli_real_escape_string($conn, $_GET['delete']);
echo $row;

$query = mysqli_query($conn, "UPDATE book_session SET is_deleted = '1' WHERE session_id = '$row'");

header('location: ../patient/manage-session.php');

?>