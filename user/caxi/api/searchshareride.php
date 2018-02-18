<?php


require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);


$con = mysqli_connect("localhost", "root", "", "android_api");

if (isset($_POST['picup_loc']) && isset($_POST['drop_loc']) && isset($_POST['pickup_date'])) {

    // receiving the post params
    $picup_loc = $_POST['picup_loc'];
    $drop_loc = $_POST['drop_loc'];
    $pickup_date = $_POST['pickup_date'];
    
 
    $selctdates = "SELECT * FROM `ride_book` WHERE `pick_loc` = '$picup_loc' AND `drop_loc` = '$drop_loc' AND `pick_date` = '$pickup_date' ";
    
    
    
    $result = mysqli_query($con,$selctdates);
    
    
    $return = [];
foreach ($result as $row) {
    $return[] = [ 
        
        'error' => "FALSE",
        'pick_loc' => $row['pick_loc'],
        'drop_loc' => $row['drop_loc'],
        'car_type' => $row['car_type'],
        'pick_date' => $row['pick_date'],
        'pick_time' => $row['pick_time'],
        'user_id' => $row['user_id']
    ];
}
    
    header('Content-type: application/json');
echo json_encode(array('data' => $return),JSON_UNESCAPED_SLASHES);

} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
    echo json_encode($response);
}
?>
