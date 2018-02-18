 <?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
require '../class/myclass.php';
connection_open();
 mysql_connect("localhost", "root","")or die(mysql_error());
    mysql_select_db("parking")or die(mysql_error());
   
$response = array();
 
// check for required fields





if (isset($_POST['user_name']) && isset($_POST['user_add']) && isset($_POST['user_email']) 
        && isset($_POST['user_password']) && isset($_POST['user_mobile'])) 
{
 
  
    $user_name = mysql_real_escape_string($_POST['user_name']);
        $user_address = mysql_real_escape_string($_POST['user_add']);
    $user_email = mysql_real_escape_string($_POST['user_email']);
    $user_password = mysql_real_escape_string($_POST['user_password']);
    $user_mobile = mysql_real_escape_string($_POST['user_mobile']);
   
    $owner = mysql_real_escape_string($_POST['owner']);

    

    if($owner==1)
    {
        $owner="YES";
         $location_id = mysql_real_escape_string($_POST['location']);


    }
    elseif ($owner==0) 
    {
      $owner="NO";
      $location_id="NO Available";
    }


//     $slctlocation="SELECT `location_id` FROM `location` WHERE `location_name`='$location_id'";

//     $result=mysql_query($slctlocation);

// while ($row=mysql_fetch_row($result))
//  {
//  $location_id=$row[0];
// }




    
     $emailcheck=mysql_query("SELECT * FROM user where user_email='{$user_email}'") or die(mysql_error());
     $emaildata= mysql_fetch_row($emailcheck);
     
         if ($emaildata > 0) 
        {                                              
                   $response["success"] = 0;
                    $response["message"] = "Email Id Already Exist";
 
        // echoing JSON response
        echo json_encode($response);  
                 
        }
        else
        {

     
  $result = mysql_query("INSERT INTO `user`(`user_name`, `location_id`, `user_mobile`, `user_email`, `user_password`, `is_owner`) VALUES"
             . "('{$user_name}','{$location_id}','{$user_mobile}','{$user_email}','{$user_password}','{$owner}')")or die(mysql_error());
             $user_id=  mysql_insert_id();         
 
    // check if row inserted or not
    if ($result) {
        
        $userid=mysql_query("SELECT * FROM user where user_id='{$user_id}'") or die(mysql_error());
        $response["user"] = array();
         $user_data=  mysql_fetch_array($userid); {
            $user = array();
            mysql_real_escape_string($user["user_id"] = $user_data["user_id"]);
              mysql_real_escape_string($user["user_name"] = $user_data["user_name"]);
              mysql_real_escape_string($user["is_owner"] = $user_data["is_owner"]);
            
            
            array_push($response["user"], $user);
        }
        //successfully inserted into database
       $response["success"] = 1;
       $response["message"] = "Signup successfully.";
 
        //echoing JSON response
        echo json_encode($response);
    }
     else
      {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
        }


} 
else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>