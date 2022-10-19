<?php
require "../includes/connect.php";
$email =$_SESSION['login-data']['email'] ?? null;
$password =$_SESSION['login-data']['password'] ?? null;

unset($_SESSION['login-data']);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/patient_login.css">
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

	<section class="login">
		<div class="container login_container">
			<h4>Login</h4>
			<?php 
				if(isset($_SESSION['signup-success'])) : ?>
				<div class="alert_message success">
					<p>
						<?= $_SESSION['signup-success'];
						unset($_SESSION['signup-success'])?>
					</p>
				</div>

			<?php elseif(isset($_SESSION['login'])) : ?>
				<div class="alert_message error">
					<p>
						<?= $_SESSION['login'];
						unset($_SESSION['login'])?>
					</p>
				</div>
			<?php endif?>				
							
			<form action="../includes/login-logic.php" method="post">							
				<input type="email" name="email" value="<?= $email?>" placeholder="email" >

				<input type="password" name="password" value="<?= $password?>" placeholder="password">				

				<button type="submit" name="submit" class="btn">Login</button>				
				<small>Don't have an account? <a href="../patient/signup.php">Sign up</a></small>
			</form>
			
		</div>
	</section>

	<script type="text/javascript" src="../js/main.js"></script>
</body>
</html>
