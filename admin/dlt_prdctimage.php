<?php

include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();

		$cat_id=$_GET['id'];
		
		
		
		$slct_prdctimg="SELECT * FROM `product_image` WHERE `cat_id`='$cat_id'";
		
		
		
		$result=mysqli_query($db->myconn,$slct_prdctimg);
		
		while($row=mysqli_fetch_row($result))
		{
			$img_name=$row[2];
			$new_img =str_replace("_P","",$img_name);
			
			unlink("images/products/medium/$new_img");
			unlink("images/products/big/$new_img");
			unlink("images/products/thumbs/$new_img");
			
			
			
		}
		
		header("Location: dlt_prdctimagedetail.php?id=".$cat_id);
		
		
		

?>