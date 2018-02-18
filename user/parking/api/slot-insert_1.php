 <?php
include '../class/myclass.php';
connection_open();
   
$response = array();
 
// check for required fields
if (isset($_POST['slot_name']) &&  isset($_POST['parking_id'])) {
 
  
        $slotname = mysql_real_escape_string($_POST['slot_name']);
        $parking_id = mysql_real_escape_string($_POST['parking_id']);
    
     
        
     
     $result = mysql_query("INSERT INTO `parkingslot`(`slot_name`, `parking_id`) VALUES ('{$slotname}','{$parking_id}')")or die(mysql_error());
                
 if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "slot Inserted successfully.";
 
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