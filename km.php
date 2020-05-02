<?php 

    //connecting with database//
	include('db_conection.php');
	 $timee="";
	 
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
    
                  date_default_timezone_set('Asia/Kolkata');
                  $date = strval(date('Y-m-d H:i:s'));
                  
                  //Function to calculate count 
                  
                  $count = "SELECT count(*) as total from customers";
                  $result2 = mysqli_query($dbcon, $count);
                  $data=mysqli_fetch_assoc($result2);
                  echo $data['total'];
                  $total_cust_id =$data['total'];
                  
                  $sql_dum = "SELECT * from customers ";
                  $result_dum = mysqli_query($dbcon, $sql_dum);
                  
                  while ($row=mysqli_fetch_assoc($result_dum))
            {
                $cust_id= $row['cust_id'];
                echo $row['cust_id']  ; 
                echo "</br>" ; 
                
                
                $dummy = "SELECT * from dummy_data WHERE cust_id='$cust_id'";
                $result_dummy = mysqli_query($dbcon, $dummy);
                if (mysqli_num_rows($result_dummy) > 0) {
                    
                    while ($row_dummy=mysqli_fetch_assoc($result_dummy))
            {
                $lat_dum= $row_dummy['lat'];
                echo $lat_dum  ; 
                echo "</br>" ;
                $lang_dum= $row_dummy['lang'];
                echo $lang_dum  ; 
                echo "</br>" ;
                $lang_loop= $row_dummy['last_loop'];
                echo $lang_loop ; 
                echo "</br>" ;
                
                $gps = "SELECT * from location_update WHERE timee >= '$lang_loop' AND cust_id = '$cust_id'";
                $result_gps = mysqli_query($dbcon, $gps);
                
                   while ($row_gps=mysqli_fetch_assoc($result_gps))
            {
                
                $lat_now= $row_gps['gps_lat'];
                echo $lat_now  ; 
                echo "</br>" ; 
                $lang_now= $row_gps['gps_long'];
                echo $lang_now  ; 
                echo "</br>" ;
                $timee= $row_gps['timee'];
                echo $timee  ; 
                echo "</br>" ;
                
                $km = vincentyGreatCircleDistance($lat_dum, $lang_dum, $lat_now, $lang_now,"6371000");
                echo "kilometer".$km;
                 echo "</br>" ;
                 
                 $lat_dum = $lat_now;
                 $lang_dum =  $lang_now;
                
                
                
            }
            $check_user3="UPDATE dummy SET last_loop ='$timee'    WHERE cust_id = '$cust_id'";
	    	       $run3=mysqli_query($dbcon,$check_user3);
            }
                    
                }
                else {
                    
                    echo "new users exits - inserting into user_info table";
                    echo "<br>";
                    
                    $gps_usr = "SELECT * from user_info WHERE cust_id='$cust_id'";
                $result_usr = mysqli_query($dbcon, $gps_usr);
                
                
                   while ($row_usr=mysqli_fetch_assoc($result_usr))
            {
                
                $lat= $row_usr['gps_lat'];
                echo $lat  ; 
                echo "</br>" ; 
                $lang= $row_usr['gps_long'];
                echo $lang  ; 
                echo "</br>" ;
                $dum_run="INSERT INTO `dummy_data`(`cust_id`,`last_loop`, `lat`, `lang`) VALUES ('$cust_id','$date','$lat','$lang')";
	        	$dummy_run=mysqli_query($dbcon,$dum_run);
                
                
            }
                    
                
               }
               
               
               
                
                  for($i =0;$i<$total_cust_id;$i++){
                       
                       
                       
                  }
                  
                  
                   
            }


	

	
	




?>