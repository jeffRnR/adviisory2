
<?php
//session_start();
require "../includes/connect.php";
if(isset($_REQUEST['save']) ){
	$SESSION['session']=session_id();
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];

	$role=$_REQUEST['type'];
	$id = $_SESSION['user-id'];

	$email=$_REQUEST['uname'];
	$createpassword=$_REQUEST['password'];	
	if(!$fname){
		$_SESSION['create'] = "Some fields are missing";
	}
	elseif(!$lname){
		$_SESSION['create'] = "Some fields are missing";
	}
	elseif(!$email){
		$_SESSION['create'] = "Some fields are missing";
	}
	elseif(!$createpassword){
		$_SESSION['create'] = "Some fields are missing";
	}
	elseif(!$role){
		$_SESSION['create'] = "Please select a role";
	}

	$fetch_all_query = "SELECT * FROM user";
	$fetch_all_result = mysqli_query($conn, $fetch_all_query);
	$user_data = mysqli_fetch_assoc($fetch_all_result);

	if($email = $user_data['email']){
		$_SESSION['create'] = "This email is already saved";
	}
	if(strlen($createpassword) < 6){
		$_SESSION['create'] = "The password should be 6 characters long";
	}
	else{
		$insert_user_query = "INSERT INTO user (fname, lname, email, password, role) VALUES ('$fname','$lname','$email','$createpassword', '$role')";
		$user_check_insert= mysqli_query($conn, $insert_user_query);
		if(!mysqli_errno($conn)){		
			$_SESSION['create-success'] = 'New account was successful created Please login';
		}
	}
}

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create new account</title>
	<link rel="stylesheet" type="text/css" href="../therapist/css/index.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />

	<script>
	var x= document.getElementById("location");
    function getlocation() {
    	if(navigator.geolocation){
    		navigator.geolocation.getCurrentPosition(showPosition)
    	  }
    	else
    	{
             alert("Sorry! your browser is not supporting")
         } }
     
     function showPosition(position){
       var x = "Your current location is (" + "Latitude: " + position.coords.latitude + ", " + "Longitude: " +    position.coords.longitude + ")";
                document.getElementById("location").innerHTML = x;
     }
	</script>
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
				<a href="" class="active">
				
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
				<h2>Add Patient</h2>
				<table>
					<thead>
						<tr>
							<th>Patient First Name</th>
							<th>Second Name</th>
							<th>Email</th>							
							<th>Password</th>							
							<th>User Level</th>							
							
							
						</tr>
					</thead><form method='post' action='new_patients.php'><tbody>
						<tr>
							<td><input type="text" name="fname" value="" placeholder="Enter first Name"></td>
							<td><input type="text" name="lname" value="" placeholder="Enter second Name"></td>
							<td><input type="text" name="uname" value="" placeholder="Enter Email"></td>							
							<td><input type="password" name="password" value="" placeholder="ENTER PASSWORD"></td>
							<td> <select name="type" required="required"  title="user type"> 					<option> </option> 
                                                           <option>user</option> 
                                                           <option>therapist</option>  </select></td>
                                                           
                                                           

                                                           <td><button name="save">Save Patient</button></td>
							
						</tr>
						</tbody></form>
					</tbody>
				</table>


		<?php
			if(isset($_SESSION['create-success'])):?>
				<div class="alert_message success">
					<p><?=$_SESSION['create-success']; unset($_SESSION['create-success'])?></p>					
				</div>
		<?php
			elseif(isset($_SESSION['create'])):?>
				<div class="alert_message error">
					<p><?=$_SESSION['create']; unset($_SESSION['create'])?></p>					
				</div>
		<?php endif?>

		<!----------------------------------------------------------->

		<!--<div class="right">
			<div class="top">
				<button id="menu-btn">					
					<span class="material-symbols-sharp">menu</span>
				</button>
				<div class="profile">
					<div class="info">
						<p>Welcome <b>Lee</b></p>
						<small class="text-muted">Therapist</small>
					</div>
					<div class="profile-photo">
						<img src="../images/person2.jpg">
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
								if($notification_data['therapist'] == $id){	
									++$not;								
								}
							}

						?>
						<div class="details">						
							
							<p><b><?=$not?></b> New bookings</p>							
						</div>
							
						
					</div>
				</div>
			</div>-->

			

		</div>

	</div>
</body>
</html>
