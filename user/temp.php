<?php 
session_start(); //start session
include("config.inc.php");
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>



  <?php
  if(isset($_SESSION["products"]) && count($_SESSION["products"])>0)
  {


  foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.

    $product_id=$product["p_id"];
    $product_name = $product["p_name"];
    $product_qty = $product["p_qty"];
    $product_price = $product["p_price"];
    $product_code = $product["product_code"];

    echo $product_name;

   

    $item_price   = sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price
    
  
  echo $item_price;
    
   
  }




}
?>

</body>
</html>
