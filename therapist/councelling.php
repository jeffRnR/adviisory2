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
	<title>Councelling</title>
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
				<a href="appointment_schedule.php" >
					
					<h3>Appointment Schedule</h3>
				</a>

				<a href="new_patients.php">
					
					<h3>Create New Patients</h3>
				</a>
				<a href="edit_patient.php" >
				
					<h3>Attended Sessions</h3>
				</a>
				
				<a href="#" class="active">
					
					<h3>Councelling</h3>
				</a>
							

			</div>
		</aside>

		<!-------------------------------------------------------section------------------------------------------------->
		<main>
			<h1>Dashboard</h1>
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
				<h2>Councelling sessions</h2>
				<table>
					<thead>
						<tr>						
							<th>Patient Name</th>													
							<th>Category of therapy</th>
							<th>Appointment date</th>							
							<th>Started at</th>
							<th>Ended at</th>
							<th>Notes</th>
						</tr>
					</thead>
					<tbody>
						<?php
						

						if(isset($_SESSION['user-id'])){
							
							
							$id = $_SESSION['user-id'];		
											
							
							$sql_query = "SELECT * FROM book_session where therapist = '$id' and session_status = 'pending'";
							$sql = mysqli_query($conn, $sql_query);

							while($row = mysqli_fetch_assoc($sql)){
								
								$patient_id = $row['booked_by'];
								$patient_name = $row['patient_name'];
								$category = $row['category'];
								$appdate = $row['appdate'];							
								
							 	?>
								<tr>								
									<form action="councelling.php" method="post" enctype="multipart/form-data">				
										<td><input type="text" name="patient_name" value="<?php echo $patient_name;?>"></td>
										<td><input type="text" name="category" value="<?php echo $category;?>"></td>
										<td><input type="text" name="appdate" value="<?php echo $appdate;?>"></td>
										<td><input type="time" name="started" ></td>
										<td><input type="time" name="ended" ></td>
										<td><input type="text" name="notes"></td>
										<td><input type="submit" name="submit" value="Save"></td>
									</form>									
								</tr>
							<?php
							}
																
							if(isset($_POST['submit'])){
												 
								//$patient_id = $row['booked_by'];
								$patient_name = mysqli_real_escape_string($conn, $_REQUEST['patient_name']);
								$notes = mysqli_real_escape_string($conn, $_REQUEST['notes']);
								$started = filter_var($_POST['started'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
								$ended = filter_var($_POST['ended'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
								$insert_query = mysqli_query($conn, "INSERT INTO session (patient_id, patient_name, therapist, notes, started_at, ended_at) VALUES ('$patient_id', '$patient_name', '$id', '$notes', '$started', '$ended')  ");
								

								if($insert_query){								
									$sql_query = "SELECT * FROM book_session where therapist = '$id'";
									$sql = mysqli_query($conn, $sql_query);
									while($row = mysqli_fetch_assoc($sql)){
										$_SESSION['session-id'] = $row['session_id'];
										$session_id = $_SESSION['session-id'];										
										
									}
															 
										
									$_SESSION['session-success'] = "This information has been saved successfully";
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

		<!--<div class="right">
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

			

		</div>-->

	</div>
</body>
</html>