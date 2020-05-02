<?php



try{
	include 'db_conection.php';
	$method_name=$_SERVER["REQUEST_METHOD"];
	if($_SERVER["REQUEST_METHOD"])
	{

		switch ($method_name) 
		{
		  case 'GET':
		      //global $order_id,$cust_id;
		      global $otp;
		      for ($x = 0; $x <= 1000; $x++) {
               $otp = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9). rand(0,9) ); 
                   echo "$otp <br>";
                    $check_user="INSERT INTO `otp_test1`(`otp`) VALUES ($otp)";
                    $run=mysqli_query($dbcon,$check_user);
                      } 
		      //$otp=$_REQUEST['otp'];
		      //echo "$otp <br>";
		}
		
}
}

catch(Exception $e) {
	 echo 'Caught exception: ',  $e->getMessage(), "\n";

}

?>
