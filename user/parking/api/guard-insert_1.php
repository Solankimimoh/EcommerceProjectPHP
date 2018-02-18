 <?php
include '../class/myclass.php';
connection_open();
   
$response = array();
 
// check for required fields
if (isset($_POST['guard_name']) && isset($_POST['guard_add']) && isset($_POST['guard_email']) 
        && isset($_POST['guard_password']) && isset($_POST['guard_mobile']) && isset($_POST['admin'])) {
 
  
    $guard_name = mysql_real_escape_string($_POST['guard_name']);
    $guard_address = mysql_real_escape_string($_POST['guard_add']);
    $guard_mobile = mysql_real_escape_string($_POST['guard_mobile']);
    $guard_email = mysql_real_escape_string($_POST['guard_email']);
    $guard_password = mysql_real_escape_string($_POST['guard_password']);
    $guard_pic = ("upload/".mysql_real_escape_string($_FILES['file123']['name']));
    $admin = mysql_real_escape_string($_POST['admin']);
    
        
     
     $result = mysql_query("INSERT INTO `guard`(`guard_name`, `guard_address`, `guard_mobile`, `guard_email`, `guard_password`, `guard_pic`, `is_admin`) VALUES"
             . "('{$guard_name}','{$guard_address}','{$guard_mobile}','{$guard_email}','{$guard_password}','{$guard_pic}','{$admin}')")or die(mysql_error());
                
 if ($result) {
      move_uploaded_file($_FILES["file123"]["tmp_name"],$guard_pic);
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