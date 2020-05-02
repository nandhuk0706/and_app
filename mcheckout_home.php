<?php
session_start();
header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LEEP</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/jquery.bxslider.css">
	<link href="css/overwrite.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/set1.css" />
	<link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
    .login-panel {
        margin-top: 150px;

</style>
  </head>
  <body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html"><span>LEEP</span></a>
			</div>
		<!--	<div class="navbar-collapse collapse">							
			<!--	<div class="menu">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="index.html">Home</a></li>
						<li role="presentation"><a href="Aboutus.php">About Us</a></li>
						<li role="presentation"><a href="contact.html">Contact</a></li>
						<li role="presentation"><a href="Product.php">Product</a></li>	
	                    <li role="presentation"><a href="signup.php">Sign up</a></li>
					    <li role="presentation"><a href="login.php">Login</a></li>						
					</ul>
				</div>
			</div>	-->		
		</div>
	</nav>
	
	
	
	<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
    <div class="row"><!-- row class is used for grid system in Bootstrap-->
       // <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
    
    <br>
    </br>
    </br></br>
    
    
    <?php
		include 'db_conection.php';

	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	////if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		
		
		$ORDER_ID = $_SESSION["order_id"];
		$cust_ID = $_SESSION["cust_id"];
		//echo $ORDER_ID;

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
		$amount = $responseParamList["TXNAMOUNT"];
		$status = $responseParamList["RESPCODE"];
		//echo $responseParamList["RESPCODE"];
		if($responseParamList["RESPCODE"]==01){
		  echo  '<h3 style="color:green;margin-left:30px;font-size: 30px;">Recharge sucessfull</h3>';
		$check_user="UPDATE user_balance SET battery_balance=battery_balance+300 WHERE cust_id=$cust_ID";
		
        $run=mysqli_query($dbcon,$check_user);
        	$check_user2="UPDATE orders SET amount=$amount,payment_status =$status WHERE order_id=$ORDER_ID";
		
        $run2=mysqli_query($dbcon,$check_user2);
		  
		  
		}
		else if($responseParamList["RESPCODE"]==02){
		  echo  '<h3 style="color:red;margin-left:30px;font-size: 30px;">Recharge Failed Try again Later</h3>';
		}
		else{
		   echo  '<h3 style="color:purple;">Transaction Pending Retry your Payment</h3>';
		}
		echo "<br/>";
		//$string_version = implode(',', 	$responseParamList);
		//echo $string_version;
//	}

?>
  <?php
// Echo session variables that were set on previous page
//echo "Favorite color is " . $_SESSION["cust_id"] . ".<br>";
//echo "Favorite animal is " . $_SESSION["order_id"] . ".";
?>

                   
        </div>
    </div>
</div>

</body>

</html>

	<footer>
		<div class="inner-footer">
			<div class="container">
				<div class="row">
					<!--<div class="col-md-4 f-about">
						<a href="index.html"><h1><span>Encompass Compute</span></h1></a>
						<p>Encompass Compute is a two decade old company with in-depth knowledge
						and expertise in power electronics, EDA and  embedded domain. 
						The company is run by a group of professionals who are very strong  in  
						fundamentals  of  engineering and physical sciences, offering global solutions
						with knowledge and technology as the base.
						</p>
					</div>
					<div class="col-md-4 l-posts">
						<h3 class="widgetheading">Latest Posts</h3>
							<ul>
							<li><a href="https://www.youtube.com/watch?v=KYe81tfbxj8">https://www.youtube.com/watch?v=KYe81tfbxj8</a></li>
							<!--<li><a href="#">Awesome features are awesome</a></li>
							<li><a href="#">Create your own awesome startup</a></li>
							<li><a href="#">Wow, this is fourth post title</a></li>
						</ul>
					</div>
					<div class="col-md-4 f-contact">
						<h3 class="widgetheading">Stay in touch</h3>
						<a href="#"><p><i class="fa fa-envelope"></i> ramanujan@vget.org</p></a>
						<p><i class="fa fa-phone"></i>9360309098 </p>
						<p><i class="fa fa-home"></i> Encompass Compute PVT LTD 414/B,Rangopandith Agraharam ,Hosur-635109
							 <br>
							Tamil Nadu, Ind</p>
					</div>-->
				</div>
			</div>
		</div>
			
		<div class="last-div">
			<div class="container">
				<div class="row">
					<div class="copyright">
						© 2018 LEEP Technologies | <a target="_blank" href="http://encompassindia.com/">LEEP Technologies</a> | <a href="pp.php">Privacy Policy </a>|<a href="tc.php"> Terms & Conditions  </a> | <a href="rrc.php">Refund & Cancellation Policy</a>
					</div>		
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=eNno
                    -->			
				</div>
			</div>
			<div class="container">
				<div class="row">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus fa-1x"></i></a></li>
					</ul>
				</div>
			</div>
		</div>			
	</footer>
	
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