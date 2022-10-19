<?php


require '../includes/config.php';
$id = $_SESSION['user-id'];

$sql= mysqli_query($conn, "SELECT * FROM emergency_contact WHERE added_by = '$id'");
while($row = mysqli_fetch_assoc($sql)){
	echo $row['contact_number'].'';
	$query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '{$row['added_by']}'");
	while($set = mysqli_fetch_assoc($query)){
		echo " ".$set['fname']." ". $set['lname'];
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.mobitechtechnologies.com/sms/sendsms',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 15,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS =>'{
		    "mobile": "+254742422990",
		    "response_type": "json",
		    "sender_name": "MobiTech",
		    "service_id": 0,
		    "message": "From Adviisory. Your kin/friend might be in danger. Kindly contact them or the authorities."
		}',
		  CURLOPT_HTTPHEADER => array(
		    'h_api_key: 19fef96c9750fd47b984ee1598f217008948ae760ff30facc0dc8ab35092e5bf',
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}

}


/*$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.mobitechtechnologies.com/sms/sendsms',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 15,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>{
    "mobile": "+254742422990",
    "response_type": "json",
    "sender_name": "MobiTech",
    "service_id": 0,
    "message": "From Adviisory. Your kin/friend". might be in danger. Kindly contact them or the authorities."
},
  CURLOPT_HTTPHEADER => array(
    'h_api_key: 19fef96c9750fd47b984ee1598f217008948ae760ff30facc0dc8ab35092e5bf',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;*/
                
?>