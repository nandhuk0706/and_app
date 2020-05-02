<?php
//Your authentication key
$authKey = "abccccccccccfsssfresrr";
// mobiles numbers 
$mobileNumber = $_POST["phone"];
//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "STUDEN";
//Your message to send, Add URL encoding here.
$message = urlencode("Thank u for register with us. we will get back to u shortly.");
//Define route 
$route = "route=4";
//Prepare you post parameters
$postData = array(
'authkey' => $authKey,
'mobiles' => $mobileNumber,
'message' => $message,
'sender' => $senderId,
'route' => $route
);
//Put your sms provider api
$url="http://api.msg91.com/api/sendhttp.php";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $postData
//,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
}
curl_close($ch);
echo $output;
$url='localhost';
$conn=mysqli_connect("$url","'id4174600_sivareddy","karna") or die("Could not Connect My Sql");
mysqli_select_db($conn,"id4174600_quiz_new")  or die("Could connect to Database");


if(!$conn){
die('Could not Connect My Sql:' .mysql_error());
}
if(isset($_POST['btn-save']))
{
// variables for input data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
// sql query for inserting data into database
mysqli_query($conn,"insert into loginuser (name, email, phone) values ('$name', '$email', '$phone')") or die(mysqli_error());
echo 'Thank u for your contact with us.';
}
?>