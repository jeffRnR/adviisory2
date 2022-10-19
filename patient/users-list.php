<?php
	include_once "../includes/config.php";
	if(!isset($_SESSION['user-id'])){
		header ('location: ../patient/login.php');
	}	
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Social Platform</title>
	<link rel="stylesheet" type="text/css" href="../css/users-list.css" media="screen">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Rubik+Moonrocks&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />

</head>
<body>
	<div class="wrapper">
		<section class="users">
			<header>	
			<?php

			$sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = {$_SESSION['user-id']}");
			if(mysqli_num_rows($sql) > 0){
				$row = mysqli_fetch_assoc($sql);
			}


			?>	
				<div class="content">
					<img src="../images/<?php echo $row['avatar']?>" alt="">
					<div class="details">
						<span><?php echo $row['fname']." ".$row['lname']?></span>
						<p><?php echo $row['status']?></p>
					</div>
				</div>
				<a href="../patient/dashboard.php" class="dashboard">Dashboard</a>
			</header>
			<div class="search">
				<span class="text"><p>Find someone to chat with</p></span>
				<input type="text" name="search" placeholder="Enter name" id="input_field">
				<button type="submit" name="search"><span class="material-symbols-sharp" id="search_btn">search</span></button>
			</div>

			<div class="users-list">
			<?php	
				if(!isset($_SESSION['user-id'])){
					header ('location: ../patient/login.php');
				}

				$query = mysqli_query($conn, "SELECT * FROM user WHERE role = 'user' and user_id != '{$_SESSION['user-id']}'");

				if(mysqli_num_rows($query) == 0){
					$output = "No user available to chat";
				}
				elseif(mysqli_num_rows($query) > 0){
					while($data = mysqli_fetch_assoc($query)){

						$id = $data['user_id'];
						
						if(isset($_SESSION['message'])){?>
							<a href="../patient/chat.php?user_id=<?=$id?>"> 
								<div class="content">
									<img src="../images/<?php echo $data['avatar']?>" alt="">
									<div class="details">
										<span><?=$data['fname']." ".$data['lname']?></span>
										<p><?=$_SESSION['message']; unset($_SESSION['message'])?></p>
									</div>
								</div>
								<div class="status-dot">
									<span class="material-symbols-sharp">
										circle							
									</span>	
								</div>
							</a>
					<?php
						}else{?>
							<a href="../patient/chat.php?user_id=<?=$id?>"> 
								<div class="content">
									<img src="../images/<?php echo $data['avatar']?>" alt="">
									<div class="details">
										<span><?=$data['fname']." ".$data['lname']?></span>									
									</div>
								</div>
								<div class="status-dot">
									<span class="material-symbols-sharp">
										circle							
									</span>	
								</div>
							</a>
					<?php
						}
					$select_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $id");
					$select_data = mysqli_fetch_assoc($select_query);
					$_SESSION['id'] = $select_data['user_id'];					
					}

				}

			?>

			
							
			</div>

		</section>
	</div>
	<script type="text/javascript" src="../js/users.js"></script>
</body>
</html>	