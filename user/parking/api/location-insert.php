 <?php
include '../class/myclass.php';
connection_open();
   
$response = array();
 
// check for required fields
if (isset($_POST['location_name']) ) {
 
  
        $location_name = mysql_real_escape_string($_POST['location_name']);
    
     
        
     
     $result = mysql_query("INSERT INTO `location`(`location_name`) VALUES ('{$location_name}')")or die(mysql_error());
                

             $location_id=  mysql_insert_id();  
 if ($result) { 
     $locationid=mysql_query("SELECT * FROM location where location_id='{$location_id}'") or die(mysql_error());
        $response["location"] = array();
         $location_data=  mysql_fetch_array($locationid); {
            $location = array();
            mysql_real_escape_string($location["location_id"] = $location_data["location_id"]);
              mysql_real_escape_string($location["location_id"] = $location_data["location_id"]);
           
            
            
            array_push($response["location"], $location);
        }
        // successfully inserted into database
//        $response["success"] = 1;
//        $response["message"] = "Signup successfully.";
 
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