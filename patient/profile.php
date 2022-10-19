<?php
require '../includes/patient_auth.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$patient_record['fname']?></title>
	<link rel="stylesheet" type="text/css" href="../css/patient_profile.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Rubik+Moonrocks&display=swap" rel="stylesheet">
</head>
<body>
	<nav>
		<div class="cointainer nav_container"> 
			<a href="../patient/index.php" class="nav_logo"><h4>Adviisory</h4></a>
			<ul id="nav_menu" class="nav_items">
				<li><a href="../patient/dashboard.php"><?=$patient_record['fname']?>'s Dashboard</a></li>
				<li><a href="../patient/index.php" target="_blank">About</a></li>					
							
			</ul>
			<button id="open_nav-btn" ><i class="uil uil-bars"></i></button>			
			<button id="close_nav-btn" class="close_menu"><i class="uil uil-times-square"></i></button>
		</div>
	</nav>

	<section class="profile">
		<div class="container profile_container">
			<h4>My profile</h4>	
		<?php

			if(isset($_SESSION['edit-success'])){?>		
				<div class="alert_message success">
					<p>
						<?=$_SESSION['edit-success']; unset($_SESSION['edit-success'])?>
					</p>
				</div>	
		<?php
			}
		?>								
			<form action="../includes/profile-logic.php" method="post" enctype="multipart/form-data">
				<div class="user-avatar">
					<img src="../images/<?=$patient_record['avatar']?>">
				</div>		
				<label for="avatar">Change profile photo</label>					
				<input type="file" name="avatar" value="Change">			
				<label for="fname">First Name</label>						
				<input type="text" name="fname" value="<?= $patient_record['fname']?>" placeholder="Enter First Name">	
				<label for="lname">Last Name</label>
				<input type="text" name="lname" value="<?= $patient_record['lname']?>" placeholder="Enter Last Name">
				<label for="email">Email</label>
				<input type="email" name="email" value="<?= $patient_record['email']?>" placeholder="Enter email">	
		<?php
			if(isset($_SESSION['wrong-password'])):?>
				<div class="alert_message error">
					<p>
						<?= $_SESSION['wrong-password'];
						unset($_SESSION['wrong-password'])?>
					</p>
				</div>
		<?php
			elseif(isset($_SESSION['no-password'])):?>
				<div class="alert_message error">
					<p>
						<?= $_SESSION['no-password'];
						unset($_SESSION['no-password'])?>
					</p>
				</div>
		<?php endif?>
				
				<label for="changepassword">Change Password</label>						
				<input type="password" name="changepassword" placeholder="Current password ">
				<input type="password" name="newpassword" placeholder="New Password(6 or more characters)">					
				<button type="submit" name="save" class="btn">Save</button>
			</form>
		
		</div>
	</section>

	<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>
