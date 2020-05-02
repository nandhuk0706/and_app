<?php
session_start();
$user_email=$_POST['email'];//same
$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$emailaddress = $user_email;
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: fantasyquizcom.000webhostapp.com" . "\r\n";
$mail=mail($emailaddress,$subject,$txt,$headers) or die("Could not Connect your mail");

if(isset($_POST['register']))
{
$_SESSION['name']=$_POST['name'];
$_SESSION['email']=$_POST['email'];
$_SESSION['phone']=$_POST['mobile'];
$_SESSION['otp']=$rndno;
header( "Location: otp.php" ); 
} ?>