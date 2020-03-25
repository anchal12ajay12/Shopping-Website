<?php
include 'action_page.php';
$end=time();
$otp_conf='';
    if(isset($_POST['otp'])){
$otp_conf = $_POST['otp'];}
echo gettype($otp)." ".gettype($otp_conf)." ".$otp." ".$otp_conf." Rama";

//echo gettype($otp_conf);
if($otp==$otp_conf){
    
$servername = "localhost";
$username = "id12586154_tufan";
$password = "tufan";
$database = "id12586154_signup_data";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());}

$stmt = "INSERT INTO signup ($uname,$name,$passwd) VALUES ($email,$name,$passwd)";
if($conn->query($stmt)){
echo 'Signup Successful';
}
else{
echo "Sorry,Something went wrong";
}
}
else{
echo "You entered wrong OTP";
}

?>
