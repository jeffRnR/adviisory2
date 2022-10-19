<?php
require '../includes/patient_auth.php';

$phone_number = $_SESSION['book-data']['phone_number'] ?? null;
$category = $_SESSION['book-data']['category'] ?? null;
$therapist = $_SESSION['book-data']['therapist'] ?? null;
$appdate = $_SESSION['book-data']['appdate'] ?? null;
$apptime = $_SESSION['book-data']['apptime'] ?? null;

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book session</title>
	<link rel="stylesheet" type="text/css" href="../css/book-session.css">
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
				
				<li><a href="../patient/dashboard.php"><?=$patient_record['fname'];?>'s Dashboard</a></li>	
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
	<section class="therapy">
		<div class="container therapy_container">
			<div class="therapy_left">
				<h1>Meet our specialist</h1>
				<p>
					Scroll down to see and book appointments with our specialists.
				</p>			
			</div>
			<div class="therapy_right">
				<div class="therapy_right-image">
					<img src="../images/arrowdown.jpg">
				</div>				
			</div>
		</div>

	</section>


	<section class="therapists" id="therapists">
		
		<h1>Meet our specialist</h1>

		<div class="cointainer therapists_container">
			
			
				<?php
					$query = "SELECT * FROM user WHERE role = 'therapist'";
					$result = mysqli_query($conn, $query);

					if($result){
						while($row = mysqli_fetch_assoc($result)){?>
							<div class="box">
								<img src="../images/<?=$row['avatar']?>">
								<h3><?=$row['fname']. " ".$row['lname']?></h3>
								
								<div class="share">
									<a href="https://www.facebook.com/" target="_blank" ><i class="uil uil-facebook"></i></a>
									<a href="https://www.twitter.com/" target="_blank"><i class="uil uil-twitter"></i></a>
									<a href="https://www.instagram.com/" target="_blank"><i class="uil uil-instagram"></i></a>					
								</div>
							</div>
						<?php	
						}
					}
				?>			
		</div>

	</section>


	<section class="book" id="book">

		<div class="container book_container">
			<div class="book_left">
				<h5>Each session costs <h4>KES 1,500</h4></h5>
				<div class="book-image">
					<img src="../images/online-doctor-appointment.png">					
				</div>
				<!--<div class="back">
					<a href="../patient/dashboard.php"><i class="uil uil-step-backward-alt"></i></a>
				</div>-->


			</div>

			<div class="book_right">
				<form action="../includes/session-logic.php" class="" method="post" enctype="multipart/form-data">
					<h3>Book appointment</h3>
										<div class="alert_message">
						<?php
						if (isset($_SESSION['missing-data'])) :?>
						<div class="alert_message error">
							<p><?=$_SESSION['missing-data']; unset($_SESSION['missing-data']);?></p>
						</div>
						<?php
						elseif(isset($_SESSION['book-success'])) :?>
						<div class="alert_message success">
							<p><?=$_SESSION['book-success']; unset($_SESSION['book-success'])?></p>
						</div>
						<?php
						endif;
						?>
						
						
					</div>
					<input type="text" name="name" placeholder="Name" class="box" value="<?= $patient_record['fname']?> <?=$patient_record['lname']?>">
					<input type="text" name="email" placeholder="Email" class="box" value="<?= $patient_record['email']?>">
					<label>Enter Mpesa number</label>
					<input type="tell" name="phone_number" placeholder="Phone number" class="box" value="<?=$phone_number?>">
					<label for="category">Select category</label>
					<select id="category" name="category" value="<?=$category?>">
						<option value="General/All">General/All</option>
						<option value="PTSD">PTSD</option>
						<option value="childhood_trauma">Childhood Trauma</option>
						<option value="war_trauma">War Trauma</option>
						<option value="sexual_abuse">Sexual Abuse Trauma</option>
						<option value="physical_abuse">Physical Abuse Trauma</option>
						<option value="survivors_guilt">Survivors Guilt</option>
						<option value="FGM">FGM Trauma</option>
					</select>
					<label>Choose a Therapist</label>
					<select id="therapist" name="therapist" value="<?=$therapist?>">
						<?php
                        	$query = "SELECT * FROM user WHERE role = 'therapist'";
                        	$result = mysqli_query($conn, $query);
                    		
                    		while ($row = mysqli_fetch_assoc($result)) {

                    			$rowid = $row['user_id'];
                    			?>
                    			<option value="<?=$row['fname']?>"><?=$row['fname']?></option>
                    			<?php

                    		}
                    		
						?>

						
					</select>
					<label for="appdate">Choose a date</label>
					<input type="date" name="appdate" id="appdate" class="box" value="<?=$appdate?>">
					<label for="appdate" value="<?=$apptime?>">Choose time (7:00am-7:pm )</label>	
					<input type="time" name="apptime" id="apptime" class="box" min="07:00" max="18:00">				
					<input type="submit" name="submit" value="Book now" class="book-btn">
				</form>
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