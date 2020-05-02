<?php 
try{
	include('db_conection.php');
	$method_name=$_SERVER["REQUEST_METHOD"];
	if($_SERVER["REQUEST_METHOD"])
	{

	switch ($method_name) 
		{
		  case 'GET':
		   $client_id=$_REQUEST['client_id'];
			 $vehicle_number = $_REQUEST['vnumber'];
	   //  $check_user2="INSERT INTO `customers`(`cust_id`,`vehicle_number`) VALUES ($client_id,$vehicle_number)";
	   //     	$run2=mysqli_query($dbcon,$check_user2);
	    	
			 //$lattitude = $_REQUEST['lattitude'];
			 //$longitude = $_REQUEST['longitude'];
        	$check_user="UPDATE customers SET vehicle_number = $vehicle_number WHERE cust_id = $client_id";
	    	$run=mysqli_query($dbcon,$check_user);
	    	echo json_encode( $check_user);
	   // 	echo json_encode($run);
               

		echo json_encode($client_id);
		echo json_encode( $vehicle_number);
		echo json_encode($run);
		
		
	}
}
	else{
		$data=array("status"=>"0","message"=>"Please enter proper request method !! ");
		echo json_encode($data);
	}
	
}
catch(Exception $e) {
	 echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>