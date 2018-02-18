<?php

include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();


	$cat_id=$_GET['id'];
	
	
	$dlt_category="DELETE FROM `category` WHERE `cat_id`='$cat_id'";


	if(mysqli_query($db->myconn,$dlt_category))
	{
	
	?>
    
    <script type="text/javascript">
		
		alert("Category Deleted successfully with products"
		);
		
		window.location.href="view-category.php";
		
	
	</script>
    <?php
	
	}
	else
	{
		echo "Error";
	}
	?>
	