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
$result = mysql_query("SELECT * FROM `user`") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // areas node
    $response["user"] = array();
 
   while ($row = mysql_fetch_array($result)) {
        
        // temp user array
        $user = array();
        mysql_real_escape_string($user["user_id"] = $row["user_id"]);
             mysql_real_escape_string($user["user_name"] = $row["user_name"]);
             mysql_real_escape_string($user["user_mobile"] = $row["user_mobile"]);
             mysql_real_escape_string($user["user_email"] = $row["user_email"]);
             mysql_real_escape_string($user["user_password"] = $row["user_password"]);
             mysql_real_escape_string($user["is_owner"] = $row["is_owner"]);
       
        
        
 
        // push single area into final response array
        array_push($response["user"], $user);
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