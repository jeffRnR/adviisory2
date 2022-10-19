<?php
require '../includes/config.php';

$fetch_contact_query = "SELECT * FROM emergency_contact";
$fetch_contact_result = mysqli_query($conn, $fetch_contact_query$);

$contact_record = mysqli_fetch_assoc($fetch_contact_result);
?>