<?php
 

 
// include db connect class
    require '../class/myclass.php';
    connection_open();

    session_start();

// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['user_email']) && isset($_POST['user_password'])) {
    
    
    $email= mysql_real_escape_string($_POST['user_email']);
    $pass= mysql_real_escape_string($_POST['user_password']);
    
    
    $query=mysql_query("SELECT * FROM `user` WHERE `user_email`='{$email}' and `user_password`='{$pass}'");
     
    $result=  mysql_fetch_array($query);
     
 
    // check if row inserted or not
    if ($result) {
        $response["user"] = array();
        $userid=mysql_query("SELECT * FROM user where user_id='{$result['user_id']}'") or die(mysql_error());
        
         $user_data=  mysql_fetch_array($userid);  
            $user = array();
            mysql_real_escape_string($user["user_id"] = $user_data["user_id"]);
              mysql_real_escape_string($user["user_name"] = $user_data["user_name"]);
            mysql_real_escape_string($user["is_owner"] = $user_data["is_owner"]);
           
            
            array_push($response["user"], $user);
        
        // successfully inserted into database
//        $response["success"] = 1;
//        $response["message"] = "login sucess";
//        
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Enter Valid Email Or Password";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>
