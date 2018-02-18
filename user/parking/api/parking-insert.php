 <?php
include '../class/myclass.php';
connection_open();
   
$response = array();
 
// check for required fields
if (isset($_POST['parking_name']) && isset($_POST['parking_add']) && isset($_POST['parking_latitude']) 
        && isset($_POST['parking_longitude']) && isset($_POST['owner']) && isset($_POST['location'])) {
 
  
    $parking_name = mysql_real_escape_string($_POST['parking_name']);
    $parking_address = mysql_real_escape_string($_POST['parking_add']);
    $parking_latitude = mysql_real_escape_string($_POST['parking_latitude']);
    $parking_longitude = mysql_real_escape_string($_POST['parking_longitude']);
    $parking_pic = ("../upload/".mysql_real_escape_string($_FILES['file123']['name']));
    $owner = mysql_real_escape_string($_POST['owner']);
    $location = mysql_real_escape_string($_POST['location']);
    
        
     
     $result = mysql_query("INSERT INTO `parking`(`parking_name`, `parking_address`, `parking_latitude`, "
             . "`parking_longitude`, `parking_pic`, `owner_id`, `location_id`) VALUES"
             . "('{$parking_name}','{$parking_address}','{$parking_latitude}','{$parking_longitude}',"
             . "'{$parking_pic}','{$owner}','{$location}')")or die(mysql_error());

    $parking_id= mysql_insert_id();
                
 if ($result) {
      move_uploaded_file($_FILES["file123"]["tmp_name"],$parking_pic);
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "User  Inserted successfully.";

         $parking=  mysql_query("SELECT * FROM `parking` WHERE `parking_id`='$parking_id'");
        $parking_disp=  mysql_fetch_array($parking);
 
  $parking_disp = array();
        mysql_real_escape_string($parkingslot["parking_id"] = $row["slot_id"]);
       
        
       
        
        
 
        // push single area into final response array
        array_push($response["parking"], $parkingslot);
        // echoing JSON response
        echo json_encode($response);
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