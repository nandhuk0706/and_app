<?php
session_start();//session starts here
?>
<?php 
try{
	include 'db_conection.php';
	$method_name=$_SERVER["REQUEST_METHOD"];
	if($_SERVER["REQUEST_METHOD"])
	{

		switch ($method_name) 
		{
		  case 'GET':
		       //global $otp;
		       global $cust_id;
		   //$otp=$_REQUEST['otp'];
		    $cust_id=$_REQUEST['cust_id'];
		   // echo "otp is: $otp";
			$qry="SELECT * FROM user_balance WHERE cust_id=$cust_id";
			$result=mysqli_query($dbcon, $qry);
			
			if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
         //echo  "id: " .$row["max(order_id)"];
         $battery_balance=$row["battery_balance"];
         $data = $battery_balance;
        // $_SESSION["order_id"] = $order_id;
         
          }
         } 

			 //if(mysqli_num_rows($result))
    //   {
    //       $qry1="DELETE FROM otp_test1 WHERE otp=$otp";
	   // 	$result1=mysqli_query($dbcon, $qry1);
    //         $data = 1;
    //         $check_user="UPDATE user_balance SET battery_balance=battery_balance+300 WHERE cust_id=$cust_id";
		
    //     $run=mysqli_query($dbcon,$check_user);
            
            
    // }
     else
     {
         echo "<script>alert('Entered otp is incorrect!')</script>";
         $data = 0;
     }

			//$otp=$temp_cat;
			break;
			
		  
		}
		
	}
	
	else{
		$data=array("status"=>"0","message"=>"Please enter proper request method !! ");
		echo json_encode($data);
	}
echo $data;	
}
catch(Exception $e) {
	 echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>