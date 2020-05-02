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
		  
			 $admin_name=$_REQUEST['admin_name'];
			$admin_pass=$_REQUEST['admin_pass'];
			//$qty=$_REQUEST['qty'];
			//$qry="SELECT * from product";
			
			
	    	$check_user="select * from admin WHERE admin_name='$admin_name'AND admin_pass='$admin_pass'";
	    	$run=mysqli_query($dbcon,$check_user);

            if(mysqli_num_rows($run))
            {
                $qry = "select * from admin WHERE admin_name='$admin_name'AND admin_pass='$admin_pass'";
			//	$data=array("status"=>"1","message"=>"success","result"=>"Product add successfully");
				$result=mysqli_query($dbcon, $qry);
				while ($row=mysqli_fetch_row($result))
			    {
				$temp_cat = array("admin_id"=>$row[0],"status"=>"1","message"=>"1");
			    }
                 $data=$temp_cat;
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
	echo json_encode($data);
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