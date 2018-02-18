<?php

include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();


	$cat_id=$_GET['id'];
	
	$dlt_prdctimg="DELETE FROM `product_image` WHERE `cat_id`='$cat_id'";
	
	mysqli_query($db->myconn,$dlt_prdctimg);

	header("Location: dlt_cat.php?id=".$cat_id);
		

?>
