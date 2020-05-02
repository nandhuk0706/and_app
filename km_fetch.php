<?php 
try{
	include('db_conection.php');
	$method_name=$_SERVER["REQUEST_METHOD"];
	if($_SERVER["REQUEST_METHOD"])
	{

		switch ($method_name) 
		{
		  case 'GET':

		  case 'POST':
		  
			 $cust_id=$_REQUEST['cust_id'];
			$start_date=$_REQUEST['start_date'];
			$end_date=$_REQUEST['end_date'];
			//$qty=$_REQUEST['qty'];
			//$qry="SELECT * from product";
			
			
	    	$check_user="select * from kilometer_store WHERE cust_id='$cust_id'";
	    	$run=mysqli_query($dbcon,$check_user);

            if(mysqli_num_rows($run))
            {
                $qry = "SELECT * FROM kilometer_store  WHERE date(timee) BETWEEN '$start_date' AND '$end_date'";
			//	$data=array("status"=>"1","message"=>"success","result"=>"Product add successfully");
				$result=mysqli_query($dbcon, $qry);
			$json_response = array();
				   while ($row=mysqli_fetch_assoc($result))
            {
                
                 $dbdata['km']= $row['km'];
                 $dbdata['time']= $row['timee'];
                 //$dbdata['km']= $row_dummy['km'];

		//	$dbdata[]=$row;
		array_push($json_response,$dbdata);  
		
			    }
                 //echo json_encode($data);
			 //  break;
			   
			   

                }
                
             
            else
             {
                $data=array("message"=>"success","result"=>"Something wrong!!!","status"=>"0");   
                }
//                   $return_arr = array();
// 			    $qry1 = "SELECT * FROM customers";
// 			    $fetch=mysqli_query($dbcon, $qry1);
//               if(mysqli_num_rows($fetch))
//               {
//               while ($row = mysqli_fetch_assoc($fetch)) {
//                  $row_array['cust_id'] = $row['cust_id'];
//                  $row_array['user_name'] = $row['user_name'];
//                  $row_array['vehicle_number'] = $row['vehicle_number'];
//                  $row_array['Location'] = $row['Location'];
//                  array_push($return_arr,$row_array);
//                 }
// }
//             echo json_encode($return_arr);
//             //break;
		}
	echo json_encode($json_response);
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