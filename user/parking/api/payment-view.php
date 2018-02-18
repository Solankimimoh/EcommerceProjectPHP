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
$result = mysql_query("SELECT * FROM `payment`") or die(mysql_error());
 
// check for empty result
if (mysql_num_rows($result) > 0) {
    // looping through all results
    // areas node
    $response["payment"] = array();
 
   while ($row = mysql_fetch_array($result)) {
      $reservation=  mysql_query("SELECT * FROM `reservation` WHERE `reservation_id`='{$row['reservation_id']}'");
        $reservation_disp=  mysql_fetch_array($reservation);
        
        
        // temp user array
        $payment = array();
        mysql_real_escape_string($payment["payment_id"] = $row["payment_id"]);
        mysql_real_escape_string($payment["payment_date"] = $row["payment_date"]);
        mysql_real_escape_string($payment["payment_charges"] = $row["payment_charges"]);
        mysql_real_escape_string($payment["reservation_id"] = $reservation_disp["reservation_date"]);
        
       
        
        
 
        // push single area into final response array
        array_push($response["payment"], $payment);
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
?><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

