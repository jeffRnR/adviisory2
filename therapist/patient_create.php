<?php
session_start();
require "../includes/connect.php";

$fname = $_SESSION['signup-data']['fname'] ?? null;
$lname = $_SESSION['signup-data']['lname'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;

?> 
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="../css/patient_signup.css">
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
				<li><a href="../patient/index.php">Home</a></li>
				<li><a href="../patient/index.php" target="_blank">About</a></li>					
							
			</ul>
			<button id="open_nav-btn" ><i class="uil uil-bars"></i></button>			
			<button id="close_nav-btn" class="close_menu"><i class="uil uil-times-square"></i></button>
		</div>
	</nav>

	<section class="signup">
		<div class="container signup_container">
			<h4>Sign up</h4>
			<?php
				if(isset($_SESSION['signup'])) : ?>
				<div class="alert_message error">
					<p>
						<?= $_SESSION['signup'];
						unset($_SESSION['signup']); 
						?>
							
					</p>
				</div>
			<?php endif ?>			
			<form action="../includes/signup-logic.php" method="post" enctype="multipart/form-data">	
					
				<input type="text" name="fname" value="<?= $fname?>" placeholder="Enter First Name">	
				<input type="text" name="lname" value="<?= $lname?>" placeholder="Enter Last Name">
				<input type="email" name="email" value="<?= $email?>" placeholder="Enter email">						
				<input type="password" name="createpassword" value="<?= $createpassword?>" placeholder="Create password (6 or more characters)">
				<input type="password" name="confirmpassword" value="<?= $confirmpassword?>" placeholder="Confirm password">				
				<div class="form_control">
					<label for="avatar">Choose a profile picture</label>
					<input type="file" id="avatar" name="avatar">
				</div>

				<button type="submit" name="submit"class="btn">Sign Up</button>				
				<small>Already registered? <a href="../patient/login.php">Login</a></small>
			</form>
			
		</div>
	</section>

	<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>
