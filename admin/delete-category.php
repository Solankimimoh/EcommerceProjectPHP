<?php

include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();

		$cat_id=$_GET['id'];
		
		
		
		$dlt_prdct_query="DELETE FROM `product` WHERE `cat_id`='$cat_id'";
		
		if(mysqli_query($db->myconn,$dlt_prdct_query))
		{
header("Location: dlt_prdctimage.php?id=".$cat_id);
		}
		else
		{
			echo "errro";
		}
?>