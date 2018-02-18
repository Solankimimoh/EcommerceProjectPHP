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
$result = mysql_query("SELECT * FROM `guard`") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // citys node
    $response["guard"] = array();
 
   while ($row = mysql_fetch_array($result)) {
        
        
        // temp user array
        $guard = array();
             mysql_real_escape_string($guard["guard_id"] = $row["guard_id"]);
             mysql_real_escape_string($guard["guard_name"] = $row["guard_name"]);
             mysql_real_escape_string($guard["guard_address"] = $row["guard_address"]);
             mysql_real_escape_string($guard["guard_mobile"] = $row["guard_mobile"]);
             mysql_real_escape_string($guard["guard_email"] = $row["guard_email"]);
             mysql_real_escape_string($guard["guard_password"] = $row["guard_password"]);
             mysql_real_escape_string($guard["guard_pic"] = $row["guard_pic"]);
             mysql_real_escape_string($guard["is_admin"] = $row["is_admin"]);
        
       
        
        
 
        // push single city into final response array
        array_push($response["guard"], $guard);
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