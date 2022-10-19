<?php
require '../includes/patient_auth.php';
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/patient_dashboard.css">
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
			<a href="">Welcome <?=$patient_record['fname']; ?></a>
			<ul id="nav_menu" class="nav_items">				
				<li><a href="../patient/index.php">About</a></li>
				<li><a href="../patient/index.php#articlesid">Articles</a></li>
				<li><a href="../patient/contact.php" target="_blank">Contact</a></li>	
				<li class="nav_profile">
					<div class="avatar">
						<img src="">
					</div>
					<ul>
						<li><a href="../patient/current-password.php">Profile</a></li>
						<li><a href="../includes/logout.php">Logout</a></li>
					</ul>
				</li>			
			</ul>
			<button id="open_nav-btn" ><i class="uil uil-bars"></i></button>			
			<button id="close_nav-btn" class="close_menu"><i class="uil uil-times-square"></i></button>
		</div>
	</nav>

	<section class="header">
		
	</section>

	<section class="therapy">
		<div class="container therapy_container">
			<div class="therapy_left">
				<h1>Connect to a therapist</h1>
				<p>
					Get to meet and interact with our qualified professionals.
				</p>
				<a href="../patient/book-session.php">Book a sessions</a>
				<a href="../patient/manage-session.php">Manage sessions</a>					
				
			</div>

			<div class="therapy_right">
				<div class="therapy_right-image">
					<img src="../images/femaleTherapist.png">
				</div>
			</div>
		</div>

	</section>


	<section class="assessment">
		<div class="container assessment_container">
			<div class="assessment_left">
				<div class="assessment-image">
					<img src="../images/assess.png">
				</div>
			</div>

			<div class="assessment_right">
				<h1>Self-assessment</h1>
				<p>The Primary Care PTSD Screen for DSM-5 (PC-PTSD-5) is a screening tool designed to identify persons with probable PTSD. Take the test by filling in the form</p>
				<a href="../patient/self-assess.php">Take the test</a>
			</div>			
		</div>
	</section>


	<section class="contact">
		<div class="container contact_container">
			<div class="contact_left">
				<h1>Create emergency contacts</h1>
				<p>
					You can create a list of contacts of your friends and families to notify them incase of an emergency.
				</p>
				<a href="../patient/emergency-contact.php">Create</a>
				<a href="../patient/contact-list.php">My contacts</a>							
				
			</div>

			<div class="contact_right">
				<div class="contact_right-image">
					<img src="../images/contacts.png">
				</div>
			</div>
		</div>

	</section>

	<section class="location">
		<div class="container location_container">
			<div class="location_left">
				<div class="location-image">
					<img src="../images/location.png">
				</div>
			</div>

			<div class="location_right">
				<h1>Enable tracking</h1>
				<p>As a security feature, you can enable Adviisory to track your device. Incase your device goes missing, a notification will be sent to your emergency contacts.</p>
				<button class="btn" id="location-btn">Enable location</button>
				<p id="location"></p>
			</div>			
		</div>
	</section>



	<section class="notification" id ="notification">
		<div class="container notification_container">
			<div class="notification_left">
				<h1>Speed emergency notification</h1>
				<p>
					As a security feature you can send an emergency notification to the emergency contacts you created by just clicking on the button.
				</p>
		<?php
			if(isset($_SESSION['notification'])) :?>
				<h6><?=$_SESSION['notification']; unset($_SESSION['notification'])?></h6>
				<p></p>

		<?php endif?>

				<a href="../includes/notification-logic.php">send notification</a>							
			
				
			</div>

			<div class="notification_right">
				<div class="notification_right-image">
					<img src="../images/clock.png">
				</div>
			</div>
		</div>

	</section>

	<section class="socialplatform">
		<div class="container socialplatform_container">
			<div class="socialplatform_left">
				<div class="socialplatform-image">
					<img src="../images/blog.png">
				</div>
			</div>

			<div class="socialplatform_right">
				<h1>Social platform</h1>
				<p>Get to meet and interact with other Adviisory users.</p>
				<a href="../patient/users-list.php">social platform</a>
			</div>			
		</div>
	</section>

	<section class="footer">
		<div class="container footer_container">
			<div class="footer1">
				<h4><a href="../patient/index.php" class="footer_logo">Adviisory</a></h4>
				<a href="../patient/current-password.php">My profile</a>
			</div>
			<div class="footer2">
				<h4>Links</h4>
				<ul class="perlinks">
					<li><a href="../patient/index.php">Home</a></li>
					<li><a href="../patient/about.php">About</a></li>
					<li><a href="../patient/contact.php">Articles</a></li>
					<li><a href="../patient/signin.php" target="_blank">Contact</a></li>
				</ul>
			</div>
			<div class="footer3">
				<h4>Privacy</h4>
				<ul class="privacy">
					<li><a href="">Privacy Policy</a></li>
					<li><a href="">Terms and conditions</a></li>					
				</ul>
			</div>
			<div class="footer4">
				<h4>Contact Us</h4>
				<div>
					<p>+2547 24 78 1342 </p>
					<p>adviisory@gmail.com</p>
				</div>
				<ul class="footer_socials">
				<li>
					<a href="https://www.facebook.com/" target="_blank"><i class="uil uil-facebook"></i></a>
				</li>
				<li>
					<a href="https://www.instagram.com/" target="_blank"><i class="uil uil-instagram"></i></a>
				</li>
				<li>
					<a href="https://www.twitter.com/" target="_blank"><i class="uil uil-twitter"></i></a>
				</li>
				<li>
					<a href="https://www.linkedin.com/" target="_blank"><i class="uil uil-linkedin"></i></a>
				</li>
			</ul>
			</div>
			
		</div>

		<div class="footer_copyright">
			<small>Copyright &copy; Adviisory Web Application</small>
		</div>	
	</section>
	<script type="text/javascript" src="../js/main.js"></script>
</body>	
</html>