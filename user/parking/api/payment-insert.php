 <?php
include '../class/myclass.php';
connection_open();
   
$response = array();
 
// check for required fields
if (isset($_POST['payment_date']) &&  isset($_POST['payment_charges'])&&  isset($_POST['reservation_id'])) {
 
  
        $payment_date = mysql_real_escape_string($_POST['payment_date']);
        $payment_charges = mysql_real_escape_string($_POST['payment_charges']);
        $reservation_id = mysql_real_escape_string($_POST['reservation_id']);
    
     
        
     
     $result = mysql_query("INSERT INTO `payment`(`payment_date`, `payment_charges`, `reservation_id`) VALUES "
             . "('{$payment_date}','{$payment_charges}','{$reservation_id}')")or die(mysql_error());
                
 if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Payment Complete.";
 
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