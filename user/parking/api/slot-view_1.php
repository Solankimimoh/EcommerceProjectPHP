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
$result = mysql_query("SELECT * FROM `parkingslot`") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // areas node
    $response["parkingslot"] = array();
 
   while ($row = mysql_fetch_array($result)) {
      $parking=  mysql_query("SELECT * FROM `parking` WHERE `parking_id`='{$row['parking_id']}'");
        $parking_disp=  mysql_fetch_array($parking);
        
        
        // temp user array
        $parkingslot = array();
        mysql_real_escape_string($parkingslot["slot_id"] = $row["slot_id"]);
        mysql_real_escape_string($parkingslot["slot_name"] = $row["slot_name"]);
        mysql_real_escape_string($parkingslot["parking_id"] = $parking_disp["parking_name"]);
        
       
        
        
 
        // push single area into final response array
        array_push($response["parkingslot"], $parkingslot);
    }

    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no areas found
    $response["success"] = 0;
    $response["message"] = "No area found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>