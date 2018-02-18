<?php
 
/*
 * Following code will list all the citys
 */
 require '../class/myclass.php';
 connection_open();
    // connecting to db
  
// array for JSON response
$response = array();
 
// include db connect class
 
 
// connecting to db

 
// get all citys from citys table
$result = mysql_query("SELECT * FROM `location`") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // citys node
    $response["location"] = array();
 
   while ($row = mysql_fetch_array($result)) {
        
        
        // temp user array
        $location = array();
        mysql_real_escape_string($location["location_id"] = $row["location_id"]);
       mysql_real_escape_string($location["location_name"] = $row["location_name"]);
        
       
        
        
 
        // push single city into final response array
        array_push($response["location"], $location);
    }

    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no citys found
    $response["success"] = 0;
    $response["message"] = "No Location found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>