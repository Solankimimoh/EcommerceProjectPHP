 <?php
include '../class/myclass.php';
connection_open();
   
$response = array();
 
// check for required fields
if (isset($_POST['reservation_date']) && isset($_POST['parking_id']) && isset($_POST['slot_id']) 
        && isset($_POST['reservation_charges']) && isset($_POST['r_in_time']) && isset($_POST['r_out_time']) 
        && isset($_POST['user_id'])) {
 
  
    $reservation_date = mysql_real_escape_string($_POST['reservation_date']);
    $parking_id = mysql_real_escape_string($_POST['parking_id']);
    $slot_id = mysql_real_escape_string($_POST['slot_id']);
    $reservation_charges = mysql_real_escape_string($_POST['reservation_charges']);
    $r_in_time = mysql_real_escape_string($_POST['r_in_time']);
    $r_out_time = mysql_real_escape_string($_POST['r_out_time']);
    $user_id = mysql_real_escape_string($_POST['user_id']);

    
    
        
     
     $result = mysql_query("INSERT INTO `reservation`(`reservation_date`, `parking_id`, `slot_id`, `reservation_charges`, `r_in_time`, `r_out_time`, `user_id`, `reservation_status`) VALUES"
             . "('{$reservation_date}','{$parking_id}','{$slot_id}','{$reservation_charges}','{$r_in_time}',"
             . "'{$r_out_time}','{$user_id}','{$reservation_status}')")or die(mysql_error());
            
             $reservation_id=  mysql_insert_id();  
 if ($result) { 
     $reservationid=mysql_query("SELECT * FROM reservation where reservation_id='{$reservation_id}'") or die(mysql_error());
        $response["reservation"] = array();
         $reservation_data=  mysql_fetch_array($reservationid); {
            $reservation = array();
            mysql_real_escape_string($reservation["reservation_id"] = $reservation_data["reservation_id"]);
              mysql_real_escape_string($reservation["reservation_date"] = $reservation_data["reservation_date"]);
            mysql_real_escape_string($reservation["parking_id"] = $reservation_data["parking_id"]);
              mysql_real_escape_string($reservation["slot_id"] = $reservation_data["slot_id"]);
            mysql_real_escape_string($reservation["r_in_time"] = $reservation_data["r_in_time"]);
              mysql_real_escape_string($reservation["r_out_time"] = $reservation_data["r_out_time"]);
            mysql_real_escape_string($reservation["user_id"] = $reservation_data["user_id"]);
              mysql_real_escape_string($reservation["slot_id"] = $reservation_data["user_name"]);
            
            
            array_push($response["reservation"], $reservation);
               $response["success"] = 1;
       $response["message"] = "Signup successfully.";
 
        // echoing JSON response
        echo json_encode($response);
        }
        // successfully inserted into database
    
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>