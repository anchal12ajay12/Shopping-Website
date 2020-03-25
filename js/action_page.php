<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/mail/SMTP.php';
$servername = "localhost";
$username = "id12586154_tufan";
$password = "tufan";
$database = "id12586154_signup_data";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
if(isset($_POST["Name"]) && isset($_POST["uname"]) && isset($_POST["password"]) && isset($_POST["password1"])){
$_SESSION["name"]=$_POST["Name"];
$_SESSION["email"]=$_POST["uname"];
$_SESSION["passwd"]=$_POST["password"];
$conf_passwd=$_POST["password1"];
$_SESSION["otp"]=strval(rand(1000,9999));
}
$email=$_SESSION["email"];
$stmt="SELECT uname FROM signup WHERE uname='$email'";
$res=$conn->query($stmt);
if($res->num_rows>0){
    echo "You have already registered to Sastabazar!";
}

else{
//echo $email;
if($_SESSION["passwd"]==$conf_passwd){
    $mail = new PHPMailer;
$mail->isSMTP(); 
//$mail->SMTPDebug = 2; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 587; 
$mail->SMTPSecure = 'tls'; 
$mail->SMTPAuth = true;
$mail->Username = 'techproj2k21@gmail.com'; 
$mail->Password = 'admin@1234'; 
$mail->setFrom('techproj2k21@gmail.com');
$mail->addAddress($_SESSION["email"], $_SESSION["name"]); // to email and name
$mail->Subject = 'Verify Your Sastabazar Account';
$mail->Body = 'Your OTP is '.$_SESSION["otp"];
$mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
if(!$mail->send()){
    echo "You have entered wrong email address";
}else{
    //echo $otp;
    echo'<script>
     window.location = "otp.html"; 
</script>';

}
}
else{
    echo "Passwords do not match";
}}
//echo $email;*/
?>

