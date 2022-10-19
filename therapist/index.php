<?php
require '../includes/config.php';
$id=$_SESSION['user-id'];
$fetch_data_query = mysqli_query($conn, "SELECT * FROM user WHERE role = 'therapist' and user_id = '$id'");
$results = mysqli_fetch_assoc($fetch_data_query);
$id=$_SESSION['user-id'];




?>


<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Therapist Dashboard</title>
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
				<a href="" class="active">
					
					<h3>Dashboard</h3>
				</a>
				<a href="appointment_schedule.php" >
					
					<h3>Appointment Schedule</h3>
				</a>

				<a href="new_patients.php" >
					
					<h3>Create New Patients</h3>
				</a>
				<a href="edit_patient.php">
					
					<h3>Attended Sessions</h3>
				</a>
				
				<a href="councelling.php">
					
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
			<div class="insights">
				<div class="pending">
					<span class="material-symbols-sharp">
						insights
					</span>
					<div class="middle">
						<div class="left">
							<h3>Unpaid Sessions</h3>
							<?php
							
							 
							$result= "SELECT * from book_session where payment_status='pending' and therapist='$id' and is_deleted = '0'";
							$sets = mysqli_query($conn, $result);														
							$num = 0;							
							while($row = mysqli_fetch_assoc($sets)){						
								if($row['payment_status'] == 'pending'){
									++$num;
								}
							}
							?>
							<h1><?=$num?></h1>									
						</div>					
					</div>				
				</div>

				<div class="paid">
					<span class="material-symbols-sharp">
						insights
					</span>
					<div class="middle">
						<div class="left">
							<h3>Paid Sessions</h3>
							<?php
							
							 
							$result= "SELECT * from book_session where payment_status='complete' and therapist='$id' and is_deleted = '0'";
							$sets = mysqli_query($conn, $result);														
							$num = 0;							
							while($row = mysqli_fetch_assoc($sets)){						
								if($row['payment_status'] == 'complete'){
									++$num;
								}
							}
							?>
							<h1><?=$num?></h1>								
						</div>					
					</div>				
				</div>


				<div class="unattended">
					<span class="material-symbols-sharp">
						insights
					</span>
					<div class="middle">
						<div class="left">
							<h3>Unattended Sessions</h3>
							<?php							
							
							$sql= mysqli_query($conn, "SELECT * from book_session where session_status='pending' and therapist='$id' and is_deleted = '0'");														
							$num1 = 0;	
							while($data = mysqli_fetch_assoc($sql)){						
								if($data['session_status'] == 'pending'){
									++$num1;
								}
							}
							?>
							<h1><?=$num1?></h1>	
						</div>
						
					</div>					
				</div>


				<div class="complete">
					<span class="material-symbols-sharp">
						insights
					</span>
					<div class="middle">
						<div class="left">
							<h3>Complete Sessions</h3>
							<?php							
							 
							$qry= mysqli_query($conn, "SELECT * from book_session where session_status='attended' and therapist='$id' and is_deleted = '0'");														
							$num2 = 0;	
							while($all = mysqli_fetch_assoc($qry)){						
								if($all['session_status'] == 'attended'){
									++$num2;
								}
							}
							?>
							<h1><?=$num2?></h1>
						</div>
						
					</div>
				</div>
			</div>

			<!---------------------------------------------------------------------------------->

			<div class="recent-appointments">
				<h2>All appointments</h2>
				<table>
					<thead>
						<tr>
							<th>Patient ID</th>			
							<th>Patient Name</th>
							<th>Telephone</th>
							<th>Category of therapy</th>
							<th>Appointment Date</th>
							<th>Appointment time</th>
							<th>Session Status</th>
							<th>Payment</th>
						</tr>
					</thead>
					<tbody>
						<?php
							
							 
							$result1= "SELECT * from book_session where therapist = {$_SESSION['user-id']} and is_deleted = '0'";
							$sets1 = mysqli_query($conn, $result1);
							
							
							
							if($sets1){	
								while($row1 = mysqli_fetch_array($sets1)){?>

									<tr>				
										<td><?=$row1['booked_by'] ?></a></td>
										<td><?=$row1['patient_name']?></td>
										<td><?=$row1['phone_number']?></td>
										<td><?=$row1['category']?></td>		
										<td><?=$row1['appdate']?></td>
										<td ><?=$row1['apptime']?></td>
										<td class="primary"><?=$row1['session_status']?></td>
										<td class="warning"><?=$row1['payment_status']?></td>
									</tr>
							<?php
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
						<p>Welcome <?=$results['fname']?></p>
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
							$notification_query = mysqli_query($conn, "SELECT * FROM book_session where therapist = $id and is_deleted = '0'");	
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