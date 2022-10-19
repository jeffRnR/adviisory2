<?php
require '../includes/patient_auth.php';
$id = $_SESSION['user-id'];
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage sessions</title>
	<link rel="stylesheet" type="text/css" href="../css/manage-session.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Rubik+Moonrocks&display=swap" rel="stylesheet">

</head>
<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

<style>
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>

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
						<li><a href="../patient/dashboard.php">Profile</a></li>
						<li><a href="../includes/logout.php">Logout</a></li>
					</ul>
				</li>			
			</ul>
			<button id="open_nav-btn" ><i class="uil uil-bars"></i></button>			
			<button id="close_nav-btn" class="close_menu"><i class="uil uil-times-square"></i></button>
		</div>
	</nav>



	<section class="manage_sessions">
		<h1>Manage your bookings</h1>
		<div class ="container manage_container">			
			<div class="manage_table">
				<table class="tbl">	
					<thead>
						<tr scope="col">
							<th>Category</th>
							<th>Therapist Name</th>
							<th>Scheduled Date</th>
							<th>Scheduled Time</th>
							<th></th>
							<th></th>
							<th></th>						
						</tr>
					</thead>

					<tbody>
					
					<?php
					$query = "SELECT * FROM book_session where booked_by = '$id' and is_deleted = '0'";
					$result = mysqli_query($conn, $query);

					if($result){
						while($row = mysqli_fetch_assoc($result)){?>
							<tr scope="row">
								<td><?=$row['category']?></td>
								<td><?=$row['therapist_name']?></td>
								<td><?=$row['appdate']?></td>
								<td><?=$row['apptime']?></td>
								<td><a href="../includes/update-session.php?update=<?=$row['session_id']?>#book"><button id="change" class="change-btn">Change</button></a></td>		
								<td><a href="../includes/delete-session.php?delete=<?=$row['session_id']?>"><button id="delete" class="delete-btn">Delete</button></a></td>
							</tr>
						<?php
						}
					}


					?>

					</tbody>
				</table>
				<a href="../patient/book-session.php#book" class="add-btn">Add an appointment</a>
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