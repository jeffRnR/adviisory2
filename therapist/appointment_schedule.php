<?php
require '../includes/config.php';
$fetch_data_query = mysqli_query($conn, "SELECT * FROM user WHERE role = 'therapist'");
$results = mysqli_fetch_assoc($fetch_data_query);
$id = $_SESSION['user-id'];

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Appointment Schedule</title>
	<link rel="stylesheet" type="text/css" href="../therapist/css/index.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
	<div class="container">
		<aside>
			<div class="top">
				<div class="logo">
					<a href="../patient/index.php" class="nav_logo"><h2>Adviisory</h2></a>
				</div>
				<div class="close" id="close_btn">
					<span class="material-symbols-sharp">
						close
					</span>
				</div>
			</div>
			<div class="sidebar">
				<a href="index.php">
					
					<h3>Dashboard</h3>
				</a>
				<a href="#" class="active">
					
					<h3>Appointment Schedule</h3>
				</a>

				<a href="new_patients.php">
					<h3>Create New Patients</h3>
				</a>
				<a href="edit_patient.php" >
					
					<h3>Attended Sessions</h3>
				</a>
				
				<a href="Councelling.php">
					
					<h3>Councelling</h3>
				</a>
							

			</div>
		</aside>

		<!-------------------------------------------------------section------------------------------------------------->
		<main>
			<h1>Your schedule</h1>
			<div class="date">
				<input type="date" name="">
			</div>
			<!--<div class="insights">
				<div class="pending">
					<span class="material-symbols-sharp">
						insights
					</span>
					<div class="middle">
						<div class="left">
							<h3>Payment Pending Sessions</h3>
							<h1>2</h1>
						</div>
						
					</div>
					<small class="text-muted">Last 24hrs</small>
				</div>


				<div class="unattended">
					<span class="material-symbols-sharp">
						insights
					</span>
					<div class="middle">
						<div class="left">
							<h3>Unattended Sessions</h3>
							<h1>0</h1>
						</div>
						
					</div>
					<small class="text-muted">Last 24hrs</small>
				</div>


				<div class="complete">
					<span class="material-symbols-sharp">
						insights
					</span>
					<div class="middle">
						<div class="left">
							<h3>Complete Sessions</h3>
							<h1>2</h1>
						</div>
						
					</div>
					<small class="text-muted">Last 24hrs</small>
				</div>
			</div>-->

			<!---------------------------------------------------------------------------------->

			<div class="recent-appointments">
				<h2>Your schedule</h2>
				<table>
					<thead>
						<tr>
							<th>Date</th>							
							<th>Time</th>							
													
						</tr>
					</thead>
					<tbody>
					<?php
					
					if($_SESSION['user-id']){					
						$id = $_SESSION['user-id'];
						$fetch_query = mysqli_query($conn, "SELECT * FROM book_session where therapist = '$id' AND session_status = 'pending'");
						if($fetch_query){
							while($fetch_row = mysqli_fetch_assoc($fetch_query)){ ?>					
							
								<tr>
									<td><?php echo $fetch_row['appdate']?></td>
									<td><?=$fetch_row['apptime']?></td>
									
								</tr>
							<?php
							}		
							
						}

					}
					


					?>		


						
						
					</tbody>
				</table>
				<a href="">Show All</a>
			</div>
		</main>

		<!----------------------------------------------------------->

		<div class="right">
			<div class="top">
				<button id="menu-btn">					
					<span class="material-symbols-sharp">menu</span>
				</button>
				<div class="profile">
					<div class="info">
						<p>Welcome <b><?=$results['fname']?></b></p>
						<small class="text-muted">Therapist</small>
					</div>
					<div class="profile-photo">
						<img src="../images/<?=$results['avatar']?>">
					</div>
				</div>

			</div>


			<div class="recent-updates">
				<h2>Recent Bookings</h2>
				<div class="updates">
					
					<div class="update">
						<?php
							$notification_query = mysqli_query($conn, "SELECT * FROM book_session where therapist = $id");	
							$not = 0;				
							while($notification_data = mysqli_fetch_assoc($notification_query)){
								if($notification_data['session_status'] == 'pending'){	
									++$not;								
								}
							}

						?>
						<div class="details">						
							
							<p><b><?=$not?></b> New bookings</p>							
						</div>
							
						
					</div>
				</div>
				
			</div>

			

		</div>

	</div>
</body>
</html>