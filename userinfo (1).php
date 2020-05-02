<?php 
try{
    //connecting with database//
	include('db_conection.php');
	  //Creating time Function
            //echo "<br>";
            date_default_timezone_set('Asia/Kolkata');
            echo "The time is " . date("H:m:sa");
            $date = strval(date('Y-m-d H:i:s'));
            echo "<br>";
            echo $date;
            //$time = strtotime($timee);
            echo "<br>";
	$method_name=$_SERVER["REQUEST_METHOD"];
	function vincentyGreatCircleDistance(
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  echo " latFrom".$latitudeFrom;
  echo "</br>";
  $lonFrom = deg2rad($longitudeFrom);
  echo " latFrom".$longitudeFrom;
  echo "</br>";
  $latTo = deg2rad($latitudeTo);
  echo " latFrom".$latitudeTo;
  echo "</br>";
  $lonTo = deg2rad($longitudeTo);
  echo " latFrom".$longitudeTo;
  echo "</br>";

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  return $angle * $earthRadius/1000;
}
	
	if($_SERVER["REQUEST_METHOD"])
	{

		switch ($method_name) 
		{
		  case 'GET':
		      
		   //requesting values from arduino through URL//
			 $client_id=$_REQUEST['client_id'];
			 $battery_value = $_REQUEST['battery_value'];
			 $lattitude = $_REQUEST['lattitude'];
			 $longitude = $_REQUEST['longitude'];
			 
			 //Displaying the getting values in userinfo.php file//
			 echo "cust_id is";
			 echo json_encode($client_id);
			 echo "<br>";
			 echo "voltage = ";
	       	 echo json_encode($battery_value);
	       	 echo "<br>";
	       	 echo "lattitude = ";
	    	 echo json_encode($lattitude);
	    	 echo "<br>";
	    	 echo "longitude = ";
		     echo json_encode($longitude);
		     
		     
		     if ($longitude == "\""){
		         
		         echo "loop1";
		         //checking the cust_id in customers table//
			  $sql = "SELECT * from customers WHERE cust_id=$client_id";
              $result = mysqli_query($dbcon, $sql);
              
              
               if (mysqli_num_rows($result) > 0) {
                   echo "cust_id exists proceeding further";
                   echo "<br>";
                   
              //checking the cust_id in user_info table//
                   $sql_userinfo = "SELECT * from user_info WHERE cust_id=$client_id";
               $result_userinfo = mysqli_query($dbcon, $sql_userinfo);
              
               
              //updating the voltage, lat and long values in exiting cust_id row//
               if (mysqli_num_rows($result_userinfo) > 0) {
                   echo "users exits - updating into user_info table";
                   echo "<br>";
                   $check_user1="UPDATE user_info SET voltage = $battery_value, gps_lat = $lattitude, gps_long = $longitude  WHERE cust_id = $client_id";
                   $checky ="UPDATE user_info SET voltage = $battery_value WHERE cust_id = $client_id";
                   $runy=mysqli_query($dbcon,$checky);
	          	$run1=mysqli_query($dbcon,$check_user1);
               }
               
               //inserting the voltage,lat and long values in new cust_id row//
               else {
                    echo "new users exits - inserting into user_info table";
                    echo "<br>";
                    $check_user2="INSERT INTO `user_info`(`cust_id`,`voltage`, `gps_lat`, `gps_long`) VALUES ($client_id,$battery_value,$lattitude,$longitude)";
	        	$run2=mysqli_query($dbcon,$check_user2);
               }
               
               //checking the cust_id in votage_update table//
                $sql_voltageinfo = "SELECT * from voltage_update WHERE cust_id=$client_id";
               $result_voltageinfo = mysqli_query($dbcon, $sql_voltageinfo);
               
               //updating the voltage value in existing cust_id row//
               if (mysqli_num_rows($result_voltageinfo) > 0) {
                   echo "users exits - updating into voltage_update table";
                   echo "<br>";
                   $check_user3="UPDATE voltage_update SET voltage = $battery_value  WHERE cust_id = $client_id";
	    	       $run3=mysqli_query($dbcon,$check_user3);
               }
               
               //inserting the voltage value in new cust_id row//
               else {
                   echo "new users exits - inserting into voltage_update table";
                   echo "<br>";
                    $check_user4="INSERT INTO `voltage_update`(`cust_id`,`voltage`) VALUES ($client_id,$battery_value)";
	        	    $run4=mysqli_query($dbcon,$check_user4);
               }
               
               
                
    
            } 
            //cust_id not exist in customers table//
            else {
             echo "cust_id doesn't exist";
         
          }
		     }
		     
		     else{
		         
		         echo "loop2";
		         
		             //checking the cust_id in customers table//
			  $sql = "SELECT * from customers WHERE cust_id=$client_id";
              $result = mysqli_query($dbcon, $sql);
              
              
               if (mysqli_num_rows($result) > 0) {
                   echo "cust_id exists proceeding further";
                   echo "<br>";
                   
              //checking the cust_id in user_info table//
                   $sql_userinfo = "SELECT * from user_info WHERE cust_id=$client_id";
               $result_userinfo = mysqli_query($dbcon, $sql_userinfo);
              
               
              //updating the voltage, lat and long values in exiting cust_id row//
               if (mysqli_num_rows($result_userinfo) > 0) {
                   echo "users exits - updating into user_info table";
                   echo "<br>";
                   $check_user1="UPDATE user_info SET voltage = $battery_value, gps_lat = $lattitude, gps_long = $longitude  WHERE cust_id = $client_id";
                   $checky ="UPDATE user_info SET voltage = $battery_value WHERE cust_id = $client_id";
                   $runy=mysqli_query($dbcon,$checky);
	          	$run1=mysqli_query($dbcon,$check_user1);
               }
               
               //inserting the voltage,lat and long values in new cust_id row//
               else {
                    echo "new users exits - inserting into user_info table";
                    echo "<br>";
                    $check_user2="INSERT INTO `user_info`(`cust_id`,`voltage`, `gps_lat`, `gps_long`) VALUES ($client_id,$battery_value,$lattitude,$longitude)";
	        	$run2=mysqli_query($dbcon,$check_user2);
               }
               
               //checking the cust_id in votage_update table//
                $sql_voltageinfo = "SELECT * from voltage_update WHERE cust_id=$client_id";
               $result_voltageinfo = mysqli_query($dbcon, $sql_voltageinfo);
               
               //updating the voltage value in existing cust_id row//
               if (mysqli_num_rows($result_voltageinfo) > 0) {
                   echo "users exits - updating into voltage_update table";
                   echo "<br>";
                   $check_user3="UPDATE voltage_update SET voltage = $battery_value  WHERE cust_id = $client_id";
	    	       $run3=mysqli_query($dbcon,$check_user3);
               }
               
               //inserting the voltage value in new cust_id row//
               else {
                   echo "new users exits - inserting into voltage_update table";
                   echo "<br>";
                    $check_user4="INSERT INTO `voltage_update`(`cust_id`,`voltage`) VALUES ($client_id,$battery_value)";
	        	    $run4=mysqli_query($dbcon,$check_user4);
               }
               
               
                
    
            } 
            //cust_id not exist in customers table//
            else {
             echo "cust_id doesn't exist";
         
          }
          
          
         
	
	        //inserting the lattitude and longitude values in location_update table//
	       
	    //	SELECT * FROM table where DATE(date)=CURDATE()
	    	$dummy = "SELECT * from location_update WHERE DATE(timee) = CURDATE() AND cust_id =1";
	    	
                $result_dummy = mysqli_query($dbcon, $dummy);
                //echo json_encode($result_dummy);
               if (mysqli_num_rows($result_dummy) > 0) {
                     echo "kilometer  alerttt </br>";
                   // SELECT * FROM status ORDER BY date DESC, time DESC;
                    	$dummy_data = "SELECT * FROM location_update WHERE cust_id = $client_id ORDER BY timee DESC LIMIT 1";
                $result_data = mysqli_query($dbcon, $dummy_data);
                    
                      while ($row_dummy=mysqli_fetch_assoc($result_data))
            {
                echo "custttttt".$row_dummy['gps_lat'];
                
                $lat_old = $row_dummy['gps_lat'];
                $lang_old = $row_dummy['gps_long'];
                $km_old = $row_dummy['km'];
                
                $km = vincentyGreatCircleDistance($lat_old,$lang_old,$lattitude, $longitude,"6371000");
                
                echo "kilometer   </br>".$km;
                $km_update = $km + $km_old ;
                $check_user6="INSERT INTO `location_update`(`cust_id`, `gps_lat`, `gps_long`,`timee`,`km`) VALUES ($client_id,$lattitude,$longitude,'$date','$km_update')";
	    	$run6=mysqli_query($dbcon,$check_user6);
	    	
	    	$check_update="UPDATE kilometer_store SET km = '$km_update', timee='$date' WHERE cust_id = $client_id AND DATE(timee) = CURDATE()";
	    	          $run_update=mysqli_query($dbcon,$check_update);
	    	
                
                
	    	
                
            }
                }
                else 
               {
                   echo "kilometer loop";
    //                              	$dummy_data = "SELECT * FROM location_update WHERE cust_id = $client_id ORDER BY timee DESC LIMIT 1";
    //             $result_data = mysqli_query($dbcon, $dummy_data);
                    
    //                   while ($row_dummy=mysqli_fetch_assoc($result_data))
    //         {
    //             echo "custttttt".$row_dummy['gps_lat'];
                
    //             $lat_old = $row_dummy['gps_lat'];
    //             $lang_old = $row_dummy['gps_long'];
    //             $km_old = $row_dummy['km'];
                
    //             $km = vincentyGreatCircleDistance($lat_old,$lang_old,$lattitude, $longitude,"6371000");
                
    //             echo "kilometer   </br>".$km;
    //             $km_update = $km + $km_old ;
    //             $check_user6="INSERT INTO `location_update`(`cust_id`, `gps_lat`, `gps_long`,`timee`,`km`) VALUES ($client_id,$lattitude,$longitude,'$date','$km_update')";
	   // 	$run6=mysqli_query($dbcon,$check_user6);
	    	
	   // 	$check_update="UPDATE kilometer_store SET km = '$km_update', timee='$date' WHERE cust_id = $client_id AND DATE(timee) > CURDATE()";
	   // 	          $run_update=mysqli_query($dbcon,$check_update);
	    	
                
                
	    	
                
    //         }
                   
                    $check_user5="INSERT INTO `location_update`(`cust_id`, `gps_lat`, `gps_long`,`timee`,`km`) VALUES ($client_id,$lattitude,$longitude,'$date','0')";
	    	$run5=mysqli_query($dbcon,$check_user5);
	    	
	    	$check_user7="INSERT INTO `kilometer_store`(`cust_id`, `km`,`timee`) VALUES ($client_id,'0','$date')";
	    	$run7=mysqli_query($dbcon,$check_user7);
                } 
                  
	    	
		     }
		     echo "<br>";
		     
		 
	    	
	    

 
        echo "<br>";

	
// 		echo json_encode($run);
// 	    echo json_encode($run1);
// 		echo json_encode($run2);
// 		echo json_encode($run3);
// 		echo json_encode($run4);
// 		echo json_encode($run5);
// // 		echo json_encode($result);
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