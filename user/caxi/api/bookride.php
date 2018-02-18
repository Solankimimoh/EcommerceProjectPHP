<?php



require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['pickup']) && isset($_POST['drop']) && isset($_POST['car_type'])  && isset($_POST['pick_date']) && isset($_POST['pick_time']) &&  isset($_POST['user_id'])) {

    // receiving the post params
    
    $pickup = $_POST['pickup'];
    $drop = $_POST['drop'];
    $car_type = $_POST['car_type'];
//    $pick_date = $_POST['pick_date'];
//    $pick_time = $_POST['pick_time'];
    $user_id = $_POST['user_id'];
    
    $pick_date = date('Y-m-d', strtotime($_POST['pick_date']));
    $pick_time = date('H:i:s', strtotime($_POST['pick_time']));
    

  
        // create a new user
        $user = $db->bookRide($pickup, $drop, $car_type , $pick_date , $pick_time , $user_id);
        if ($user) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["bookid"] = $user["book_id"];
            $response["booking"]["pick_loc"] = $user["pick_loc"];
            $response["booking"]["drop_loc"] = $user["drop_loc"];
            $response["booking"]["car_type"] = $user["car_type"];
            $response["booking"]["pick_date"] = $user["pick_date"];
            $response["booking"]["pick_time"] = $user["pick_time"];
            $response["booking"]["user_id"] = $user["user_id"];
            
            
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    
    
    
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (Location , Date or Time ) is missing!";
    echo json_encode($response);
}
?>
