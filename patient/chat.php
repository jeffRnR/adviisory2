<?php
	include_once "../includes/config.php";
	if(!isset($_SESSION['user-id'])){
		header ('location: ../patient/login.php');
		$id = $_SESSION['user-id'];	
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Social Platform</title>
	<link rel="stylesheet" type="text/css" href="../css/chat.css">
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
		<section class="chat-area">
			<header>
			<?php
				if(isset($_SESSION['user-id']))	{
					$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);				
					$sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $user_id");
					if (mysqli_num_rows($sql) > 0) {
						$row1 = mysqli_fetch_assoc($sql);
					}
				}
			?>

				<a href="../patient/users-list.php" class="back-icon">
					<span class="material-symbols-sharp">						
						arrow_left
					</span>
				</a>
				<img src="../<?=$row1['avatar']?>" alt="">
				<div class="details">
					<span><?=$row1['fname']." ".$row1['lname']?></span>
					<p><?=$row1['status']?></p>
				</div>								
			</header>	
				
			<div class="chat-box">
			<?PHP
			$id = $_SESSION['user-id'];
			$chat_id = mysqli_real_escape_string($conn, $_GET['user_id']);
			$sql =  "SELECT * FROM chat where outgoing_msg_id = '$id' AND incoming_msg_id = '$chat_id'  ORDER BY chat_id ";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0){			             		
	            while ($row = mysqli_fetch_assoc($result)) {
	            	$_SESSION['message'] = $row['message'];           	
	             	if($row['outgoing_msg_id'] = $chat_id){?>
				 		<div class="chat incoming">
							<div class="details">
								<p><?=$row['message']?></p>
							</div>
						</div>
					<?php
				
					}
				}
			}
				
			$id = $_SESSION['user-id'];
			$chat_id = mysqli_real_escape_string($conn, $_GET['user_id']);
			$sql =  "SELECT * FROM chat where outgoing_msg_id = '$chat_id' AND incoming_msg_id = '$id' ORDER BY chat_id";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)){
			  	while ($row = mysqli_fetch_assoc($result)) {
			  		$_SESSION['message'] = $row['message'];  
	                if($row['incoming_msg_id'] = $chat_id){?>
						<div class="chat outgoing">
							<div class="details">
								<p><?=$row['message']?></p>
							</div>
						</div>
				<?php
					}
			
				}
			}
				
			
		            
						
				
				
			?>
				
				
			</div>
			<form action="../includes/chat-logic.php" method="GET" class="typing-area" autocomplete="off">
				<input type="text" name="outgoing_id" value="<?php echo $_SESSION['user-id']?>" hidden>
				<input type="text" name="incoming_id" value="<?php echo $_GET['user_id'];?>" hidden>			
				<input type="text" name="message" class="input-field" placeholder="Type message here">
				<button  type="submit" name="submit"><span class="material-symbols-sharp">send</span></button>
			</form>
				
		</section>
	</div>



	<script type="text/javascript" src="../js/user.js"></script>

</body>
</html>	