<?php
 require '../class/myclass.php';
 connection_open();
    // connecting to db
    
/*
 * Following code will list all the areas
 */
 
// array for JSON response
$response = array();
 
// include db connect class
 
 
// connecting to db

 
// get all areas from areas table
$result = mysql_query("SELECT * FROM `reservation`") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // areas node
    $response["reservation"] = array();
 
   while ($row = mysql_fetch_array($result)) {
      $parking=  mysql_query("SELECT * FROM `parking` WHERE `parking_id`='{$row['parking_id']}'");
        $parking_disp=  mysql_fetch_array($parking);
      $slot=  mysql_query("SELECT * FROM `parkingslot` WHERE `slot_id`='{$row['slot_id']}'");
       $slot_disp=  mysql_fetch_array($slot);
      $user=  mysql_query("select * from user where user_id='{$row['user_id']}'");
       $user_disp=  mysql_fetch_array($user);
        
        
        // temp user array
        $reservation = array();
        mysql_real_escape_string($reservation["reservation_id"] = $row["reservation_id"]);
             mysql_real_escape_string($reservation["reservation_date"] = $row["reservation_date"]);
             mysql_real_escape_string($reservation["parking_id"] = $parking_disp["parking_name"]);
             mysql_real_escape_string($reservation["slot_id"] = $slot_disp["slot_name"]);
             mysql_real_escape_string($reservation["reservation_charges"] = $row["reservation_charges"]);
             mysql_real_escape_string($reservation["r_in_time"] = $row["r_in_time"]);
             mysql_real_escape_string($reservation["r_out_time"] = $row["r_out_time"]);
             mysql_real_escape_string($reservation["r_check_out_time"] = $row["r_check_out_time"]);
             mysql_real_escape_string($reservation["user_id"] = $user_disp["user_name"]);
             mysql_real_escape_string($reservation["reservation_status"] = $row["reservation_status"]);
       
        
        
 
        // push single area into final response array
        array_push($response["reservation"], $reservation);
    }

    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no areas found
    $response["success"] = 0;
    $response["message"] = "No Reservation found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>