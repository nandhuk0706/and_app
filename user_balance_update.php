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
			 $battery_value = $_REQUEST['battery_value'];
			 $lattitude = $_REQUEST['lattitude'];
			 $longitude = $_REQUEST['longitude'];
			 $check_user="UPDATE table6 SET order_id = $battery_value, gps_lat = $lattitude, gps_long = $longitude  WHERE cust_id = $client_id";
	    	$run=mysqli_query($dbcon,$check_user);
	    	
	    	
	   // 	$check_user1="INSERT INTO `table2`(`cust_id`, `order_id`, `gps_lat`, `gps_long`) VALUES ($client_id,$battery_value,$lattitude,$longitude)";
	   // 	$run1=mysqli_query($dbcon,$check_user1);
	    	
	    	
	    	
	    	
	    	 
	   // 	 $check_user1="select * from table6 WHERE cust_id='$client_id'";
	   // 	$run1=mysqli_query($dbcon,$check_user1);
	    	
	    	
	   // 	 if(mysqli_num_rows($run1))
    //         {
    //             $qry = "select * from table6 WHERE cust_id ='$client_id'";
				// $data=array("status"=>"1","message"=>"success","result"=>"Product add successfully");
				// $result=mysqli_query($dbcon, $qry);
				// while ($row=mysqli_fetch_row($result))
			 //   {
				// $temp_cat = array("cust_id"=>$row[0],"client_id"=>$row[1],"gps_lat"=>$row[2],"gps_long"=>$row[3]);
				// echo json_encode($temp_cat);
			 //   }
    //              $data=$temp_cat;
                 
			 //  break;

    //             }
    //         else
    //          {
    //             $data=array("message"=>"success","result"=>"Something wrong!!!","status"=>"0");   
    //             }

		echo json_encode($client_id);
		echo json_encode( $battery_value);
		echo json_encode($lattitude);
		echo json_encode( $longitude);
// 		echo json_encode($data);
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