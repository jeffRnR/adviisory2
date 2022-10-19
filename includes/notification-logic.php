<?php
require '../includes/config.php';
$query = mysqli_query($conn, "SELECT * FROM emergency_contact WHERE added_by = '{$_SESSION['user-id']}'");
while($row = mysqli_fetch_assoc($query)){
    $number = "+254".$row['contact_number'];
}
$sql = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '{$_SESSION['user-id']}'");
$set = mysqli_fetch_assoc($sql);

$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL =>"https://api.mobitechtechnologies.com/sms/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
        "mobile": "'.$number.'",
        "response_type": "json",
        "sender_name": "23107",
        "service_id": 0,
        "message": "From Adviisory. Your kin/friend '.$set['fname'].' '.$set['lname'].' might be in dange.\n\nKindly contact them or the authorities\nAdviisory "
    }',
    CURLOPT_HTTPHEADER => array(
        'h_api_key: 19fef96c9750fd47b984ee1598f217008948ae760ff30facc0dc8ab35092e5bf',
        'Content-Type: application/json'
    ),
]);

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);
if ($data[0]['status_code'] == 1000) {
    $_SESSION['notification'] = "Your message was sent successfully";
    header('location: ../patient/dashboard.php#notification');
}
else{
    $_SESSION['notification'] = "Your message was sent successfully";
    header('location: ../patient/dashboard.php#notification');
}
