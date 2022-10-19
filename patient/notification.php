<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/manage-session.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Rubik+Moonrocks&display=swap" rel="stylesheet">
</head>
<?php
include("../templates/navbar.php");
?>

<section class="manage_sessions">
	<h2 class="text-center">Send Notification Instantly</h2>
	<div class="container d-flex justify-content-between">
	<?php
		$query = "SELECT * FROM `emergency_contact` WHERE `added_by` = $id AND `is_deleted` = 0;";
		$result = mysqli_query($conn, $query);
		if ($result) :
			while ($row = mysqli_fetch_assoc($result)) {
				$rownum = $row['contact_number'];
				?>
		<div class="card shadow">
			<img src="../images/call.jpg" alt="">
			<div class="card-body">
				<h3><?=$row['contact_fname']. " ".$row['contact_lname'] ?></h3>
				<p><?="0".$row['contact_number']?></p>				
			</div>
			<div class="card-footer">
				<a href="../includes/notification-logic.php?number=<?=$rownum?>"><button type="submit" id="delete" class="change-btn" name="number">Send</button></a>
			</div>
		</div>
		<?php } endif; ?>
	</div>
		
</section>	

<?php
include("../templates/footer.php");
?>