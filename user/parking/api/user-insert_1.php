 <?php
include '../class/myclass.php';
connection_open();
   
$response = array();
 
// check for required fields
if (isset($_POST['user_name']) && isset($_POST['user_add']) && isset($_POST['user_email']) 
        && isset($_POST['user_password']) && isset($_POST['user_mobile']) && isset($_POST['location'])&& isset($_POST['owner'])) {
 
  
    $user_name = mysql_real_escape_string($_POST['user_name']);
        $user_address = mysql_real_escape_string($_POST['user_add']);
    $user_email = mysql_real_escape_string($_POST['user_email']);
    $user_password = mysql_real_escape_string($_POST['user_password']);
    $user_mobile = mysql_real_escape_string($_POST['user_mobile']);
    $location_id = mysql_real_escape_string($_POST['location']);
    $owner = mysql_real_escape_string($_POST['owner']);
     
        
     
     $result = mysql_query("INSERT INTO `user`(`user_name`, `location_id`, `user_mobile`, `user_email`, `user_password`, `is_owner`) VALUES"
             . "('{$user_name}','{$location_id}','{$user_mobile}','{$user_email}','{$user_password}','{$owner}')")or die(mysql_error());
                
 if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "User  Inserted successfully.";
 
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