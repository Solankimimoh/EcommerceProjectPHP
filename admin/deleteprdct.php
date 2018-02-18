<?php session_start(); ?>

<?php 

include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();

	
	$product_id=$_GET['id'];


	$delete_product="DELETE FROM `product` WHERE `p_id`='$product_id'";

	if (mysqli_query($db->myconn,$delete_product)) 
	{
		
			$slct_prdctimg="SELECT * FROM `product_image` WHERE `p_id`='$product_id'";

			
			if($result=mysqli_query($db->myconn,$slct_prdctimg))
			{
		
					while($row=mysqli_fetch_row($result))
					{
						$img_name=$row[2];
						$new_img =str_replace("_P","",$img_name);
			
						unlink("images/products/medium/$new_img");
						unlink("images/products/big/$new_img");
						unlink("images/products/thumbs/$new_img");
		
					}

					$delete_product_img="DELETE FROM `product_image` WHERE `p_id`='$product_id'";

					if(mysqli_query($db->myconn,$delete_product_img))
					{
						?>

							<script type="text/javascript">

								alert("product DELETED successfully");

   								window.location.href="view-product.php";

							</script>

						<?php
					}

			}
	}



 ?>