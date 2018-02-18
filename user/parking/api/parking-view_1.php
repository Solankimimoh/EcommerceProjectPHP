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
$result = mysql_query("SELECT * FROM `parking`") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // areas node
    $response["parking"] = array();
 
   while ($row = mysql_fetch_array($result)) {
      $location=  mysql_query("select * from location where location_id='{$row['location_id']}'");
        $location_disp=  mysql_fetch_array($location);
      $owner=  mysql_query("select * from user where user_id='{$row['owner_id']}'");
       $owner_disp=  mysql_fetch_array($owner);
        
        
        // temp user array
        $parking = array();
        mysql_real_escape_string($parking["parking_id"] = $row["parking_id"]);
             mysql_real_escape_string($parking["parking_name"] = $row["parking_name"]);
             mysql_real_escape_string($parking["parking_address"] = $row["parking_address"]);
             mysql_real_escape_string($parking["parking_latitude"] = $row["parking_latitude"]);
             mysql_real_escape_string($parking["parking_longitude"] = $row["parking_longitude"]);
             mysql_real_escape_string($parking["parking_pic"] = $row["parking_pic"]);
             mysql_real_escape_string($parking["user_id"] = $owner_disp["user_name"]);
             mysql_real_escape_string($parking["location_id"] = $location_disp["location_name"]);
       
        
        
 
        // push single area into final response array
        array_push($response["parking"], $parking);
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