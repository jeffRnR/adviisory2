<?php

require'../includes/patient_auth.php';

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Self Assessment</title>
	<link rel="stylesheet" type="text/css" href="../css/self-assess.css">
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
				<li><a href="../patient/index.php">About</a></li>					
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
				<a href="#assess_form">Take the test</a>
			</div>			
		</div>
	</section>



	<section class="assess-form" id="assess_form">
		<h1>DSM-5 (PC-PTSD-5) Test</h1>
		<div class="container form_container">
			<div class="box">
				<form action="../includes/assess-logic.php" class="assess_form" id="form" method="post">
					<caption>In the last month have you: </caption>

					<p class>Had nightmares about the event(s) or thought about the event(s) when you did not want to?</p>
					<div class="input_field">
						<input type="radio" name="choice1" id="no" value="No">
						<label for="no">No</label><br>

						<input type="radio" name="choice1" id="yes" value="Yes">
						<label for="yes">Yes</label><br>
					</div>
					<p>Tried hard not to think about the event(s) or went out of your way to avoid situations that reminded you of the event(s)?</p>
					<div class="input_field">
						<input type="radio" name="choice2" id="no" value="No">
						<label for="no">No</label><br>

						<input type="radio" name="choice2" id="yes" value="Yes">
						<label for="yes">Yes</label><br>
					</div>
					<p>Been constantly on guard, watchful, or easily startled?</p>
					<div class="input_field">
						<input type="radio" name="choice3" id="no" value="No">
						<label for="no">No</label><br>

						<input type="radio" name="choice3" id="yes" value="Yes">
						<label for="yes">Yes</label><br>
					</div>
					<p>Felt numb or detached from people, activities, or your surroundings?</p>
					<div class="input_field">
						<input type="radio" name="choice4" id="no" value="No">
						<label for="no">No</label><br>

						<input type="radio" name="choice4" id="yes" value="Yes">
						<label for="yes">Yes</label><br>
					</div>
					<p>Felt guilty or unable to stop blaming yourself or others for the events(s) or any problems the event(s) may have caused?</p>
					<div class="input_field">
						<input type="radio" name="choice5" id="no" value="No">
						<label for="no">No</label><br>

						<input type="radio" name="choice5" id="yes" value="Yes">
						<label for="yes">Yes</label><br>
					</div>

					<button type="Submit" class="hero-btn" name="submit" id="submit"><a href="../patient/self-assess.php#submit">Submit</a></button>
					<!--<button type="reset" class="hero-btn" name="clear">Clear</button>	-->				
				</form>
				<div id="response" class="response">
					
					<?php
						if(isset($_SESSION['assess-empty'])) :?>
						<p>Result.</p>
						<div class="alert_message empty">
							<p>
								<?=$_SESSION['assess-empty']; unset($_SESSION['assess-empty'])?>
							</p>
						</div>				
					<?php
						elseif(isset($_SESSION['assess-no'])) :?>
						<p>Result.</p>
						<div class="alert_message no">							
							<p>
								<?=$_SESSION['assess-no']; unset($_SESSION['assess-no'])?>
							</p>							
						</div>		

					<?php
						elseif(isset($_SESSION['assess-likely'])) :?>
						<p>Result.</p>	
						<div class="alert_message likely">							
							<p>
								<?=$_SESSION['assess-likely']; unset($_SESSION['assess-likely'])?>
							</p>							
						</div>						

					<?php
						elseif(isset($_SESSION['assess-mostlikely'])) :?>
						<p>Result.</p>	
						<div class="alert_message mostlikely">							
							<p>
								<?=$_SESSION['assess-mostlikely']; unset($_SESSION['assess-mostlikely'])?>
							</p>							
						</div>		
						
					<?php
						elseif(isset($_SESSION['assess-yes'])) :?>
						<p>Result.</p>	
						<div class="alert_message yes">							
							<p>
								<?=$_SESSION['assess-yes']; unset($_SESSION['assess-yes'])?>
							</p>							
						</div>				
					<?php endif ?>	
				</div>
				
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
