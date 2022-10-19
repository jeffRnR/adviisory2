
<?php
/*
if(isset($_REQUEST['save']) ){
$SESSION['session']=session_id();
$fname=$_REQUEST['fname'];
$sname=$_REQUEST['lname'];
$userrole=$_REQUEST['role'];
$gps=$_REQUEST['gps'];

$username=$_REQUEST['uname'];
$password=$_REQUEST['pass'];

$gps=$_REQUEST['gps'];






}
*/

?>






<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Adviisory </title>
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
				<a href="">
					<span class="material-symbols-sharp">
						dashboard
					</span>
					<h3>Dashboard</h3>
				</a>
				<a href="" class="active">
					<span class="material-symbols-sharp">
						schedule
					</span>
					<h3>Appointment Schedule</h3>
				</a>

				<a href="" class="active">
					<span class="material-symbols-sharp">
						schedule
					</span>
					<h3>Create New Patients</h3>
				</a>
				<a href="" class="active">
					<span class="material-symbols-sharp">
						schedule
					</span>
					<h3>Edit Patient details</h3>
				</a>
				<a href="">
					<span class="material-symbols-sharp">
						calendar_month
					</span>
					<h3>Appointment reservation</h3>
				</a>
				<a href="">
					<span class="material-symbols-sharp">
						diversity_3
					</span>
					<h3>Councelling</h3>
				</a>
				<a href="">
					<span class="material-symbols-sharp">
						monitoring
					</span>
					<h3>Appointment report</h3>
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
			</div>

			<!---------------------------------------------------------------------------------->

			<div class="recent-appointments">
				<h2>Add Patient</h2>
				<table>
					<thead>
						<tr>
							<th>Patient Name</th>
							<th>Second Name</th>
							<th>Username</th>
							<th>Password</th>							
							<th>User Level</th>
							<th>Location</th>
							<th>Submit</th>
							
						</tr>
					</thead></table><form method='post' action='new_patients.php'><tbody>
						<tr>
							<td><input type="text" name="fname" value="" placeholder="Enter first Name"></td>
							<td><input type="text" name="fname" value="" placeholder="Enter second Name"></td>
							<td><input type="text" name="fname" value="" placeholder="Enter First Name"></td>
							<td><input type="password" name="fname" value="" placeholder="Enter First Name"></td>
							<td> <select name="type" required="required"  title="user type"> 					<option> </option> 
                                                           <option>user</option> <option>admin</option> 
                                                           <option>therapist</option>  </select></td>
                                                           
                                                           <td><button onclick="getlocation()">Click me</button>
<div id="location"></div></td>
                                                           <td><button name="exit">Save Patient</button></td>
							
						</tr>
						</tbody></form>
					</tbody>
				</table>
				<div class="recent-appointments">
				<h2>All users data</h2>
				<table>
					<thead>
						<tr>
							<th>Patient Name</th>
							<th>Location</th>
							<th>Patient Number</th>							
							<th>Appointmnt Date</th>
							<th>Appointment time</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Jeff</td>
							<td>Jack</td>
							<td>071234526</td>
							<td>12/12/2022</td>
							<td>12:30</td>
							<td class="warning">Pending</td>
							<td class="primary">Details</td>
						</tr>
						
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
						<div class="profile-photo">
							<img src="../images/person1.png">
						</div>
						<div class="message">
							<p><b>Jeff</b> Booked an appointment</p>
							<small class="text-muted">2 minutes ago</small>
						</div>
						<div class="profile-photo">
							<img src="../images/person1.png">
						</div>
						<div class="message">
							<p><b>Jeff</b> Booked an appointment</p>
							<small class="text-muted">2 minutes ago</small>
						</div>
						<div class="profile-photo">
							<img src="../images/person1.png">
						</div>
						<div class="message">
							<p><b>Jeff</b> Booked an appointment</p>
							<small class="text-muted">2 minutes ago</small>
						</div>
					</div>
				</div>
			</div>

			

		</div>

	</div>
</body>
</html>
