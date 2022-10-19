<?php
session_start();

ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
	$ans1 = $_POST['choice1'];
	$ans2 = $_POST['choice2'];
	$ans3 = $_POST['choice3'];
	$ans4 = $_POST['choice4'];
	$ans5 = $_POST['choice5'];

	$num = 0;

	header('location: ../patient/self-assess.php#submit');

	if(!empty($ans1)){
		if ($ans1 == 'Yes') {
			++$num;
		}		
	}
	if(!empty($ans2)){
		if($ans2 == 'Yes'){
			++$num;
		}
	}
	if(!empty($ans3)){
		if($ans3 == 'Yes'){
			++$num;
		}
	
	}
	if(!empty($ans4)){
		if($ans4 == 'Yes'){
			++$num;
		}
	}
	if(!empty($ans5)){
		if($ans5 == 'Yes'){
			++$num;
		}
	}

	if(empty($ans1) && empty($ans2) && empty($ans3) && empty($ans4) && empty($ans5)){
		$_SESSION['assess-empty'] = "You have not answered any question!";
	}	
	elseif($num == 0){
		$_SESSION['assess-no'] = "Yoohoo! You are not at any risk of developing PTSD!";
	}
	elseif ($num>0 && $num<3){
		$_SESSION['assess-likely'] = "You are not at a serious risk of developing PTSD. Therapy is recomended incase symptoms get worse!";
	}
	elseif($num>=3 && $num<5){
		$_SESSION['assess-mostlikely'] = "You are most likely to develop PTSD. Therapy is recomended!";
	}
	else{
		$_SESSION['assess-yes'] = "You have a high risk of developing PTSD. Therapy is highly recommended for you!";
	}


	if($_SESSION['assess-no']){
		$_SESSION['assess-data'] = $_POST;
	}
	if($_SESSION['assess-yes']){
		$_SESSION['assess-data'] = $_POST;
	}
	if($_SESSION['assess-likely']){
		$_SESSION['assess-data'] = $_POST;
	}
	if($_SESSION['assess-mostlikely']){
		$_SESSION['assess-data'] = $_POST;
	}





}
else{
	header('location: ../patient/self-assess.php');
}




?>