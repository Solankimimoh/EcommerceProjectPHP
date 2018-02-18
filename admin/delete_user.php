<?php
session_start();
?>


 <?php
include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();
?>


   <?php
  if(isset($_SESSION["login_user"]))
  {

  }
  else
  {
    header("Location: index.php");
  }


$id=$_GET['id'];

$deleteuser="DELETE FROM `registration` WHERE `r_email`='$id'";

mysqli_query($db->myconn,$deleteuser);

$slct_id_order="SELECT `o_id` FROM `user_order_detail` WHERE `o_lgn_email`='$id'";

$result=mysqli_query($db->myconn,$slct_id_order);

 $row=mysqli_fetch_row($result);
		
		
		$order_id= $row[0];




$delete_order="DELETE FROM `user_order_detail` WHERE `o_lgn_email`='$id'";

mysqli_query($db->myconn,$delete_order);

$delete_product="DELETE FROM `user_order_product_detail` WHERE `o_id`='$order_id'";

mysqli_query($db->myconn,$delete_product);

 ?>

 <script type="text/javascript">

 alert("User Deleted with their order");

 window.location.href="product.php";

 </script>
<?php



?>
