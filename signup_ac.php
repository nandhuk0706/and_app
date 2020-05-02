<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LeeP eDrive</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/set1.css" />
	<link href="css/overwrite.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<?php include 'header.php';?>
	
	
	<div class="container"  margin-top="150px">
	<center>
	  
<?php

include('db_conection.php');


// Random confirmation code 
$confirm_code=md5(uniqid(rand())); 

// values sent from form 
extract($_POST);

//here query check weather if user already registered so can't register again.
    $check_email_query="select * from customers WHERE email='$email'";
    $run_query=mysqli_query($dbcon,$check_email_query);

    if(mysqli_num_rows($run_query)>0)
    {
        echo "<script>alert('Email $email is already exist in our database, Please try another one!')</script>";
        exit();
    }
// Insert data into database 
$sql="INSERT INTO customers (user_name,password,email)VALUES('$name', '$password', '$email')";
$result=mysqli_query($dbcon,$sql);



        $check_email_query2="select * from customers WHERE email='$email'";
        $result3 = mysqli_query($dbcon,  $check_email_query2);

        if (mysqli_num_rows($result3) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result3)) {
         //echo  "id: " .$row["max(order_id)"];
         $cust_id=$row["cust_id"];
         //echo "</br></br></br>$cust_id";
         $sql2="INSERT INTO user_balance (cust_id,battery_balance,previous_balance)VALUES('$cust_id',0,0)";
         $result2=mysqli_query($dbcon,$sql2);
         echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<h3>Please use this credentails in your mobile app .</h3>";
echo "<h3> To Recharge click <a href='Product.php'>here</a> </h3>";

echo "<br>";
echo "<br>";
         
          }
         }
         else {
             echo "</br></br>nodata found";
         }

// if suceesfully inserted data into database, send confirmation link to email 
if($result)
{

// send e-mail to ...
$to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header = "From: fantasyquizcom.000webhostapp.com" . "\r\n";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="https://fantasyquizcom.000webhostapp.com/confirmation.php?passkey=$confirm_code";


// send email
$sentmail = mail($to,$subject,$message,$header);

}


// if not found 
else {
echo "Not found your email in our database";
}


// if your email succesfully sent
if($sentmail){

}

else {
//echo "<h2>Cannot send Confirmation link to your e-mail address</h2>";
}



?>
    </center>
    </div>
	
	
	<?php include 'footer.php';?>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="js/fliplightbox.min.js"></script>
	<script src="js/functions.js"></script>	
	<script type="text/javascript">$('.portfolio').flipLightBox()</script>
  </body>
</html>
<html>
<head>



