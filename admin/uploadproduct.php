<?php 
session_start();
?>

<?php

include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();



if(isset($_SESSION["login_user"]))
{

}
else
{
	?>

	<script type="text/javascript">
		window.location.href="index.php";
	</script>

	<?php
}


if(isset($_POST['submit'])) 

{

	$maxsize    = 2097152;

	if (($_FILES['photo']['size'] >= $maxsize) || ($_FILES["photo"]["size"] == 0)) 
	{ 
		?>

		<script type="text/javascript">

			alert("Image size must be less than 2 MB");

			window.location.href="product.php";

		</script>

		<?php
	}
	else
	{


		$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$p_code = "";

		for ($i = 0; $i < 6; $i++)
		{
			$p_code .= $chars[mt_rand(0, strlen($chars)-1)];
		} 

		
		$p_name = $_POST['p_name'];


		$p_desc = $_POST['p_desc'];

		
		$cat_id = $_POST['cat_id'];
		$p_price = $_POST['p_price'];

		$sql = "INSERT INTO `product`(`p_id`, `p_name`, `p_code`, `p_desc`, `cat_id`, `p_price`) VALUES ('','$p_name','$p_code','$p_desc','$cat_id','$p_price')";
		$result3=mysqli_query($db->myconn,$sql) or die(mysql_error());
		$last_ID = mysqli_insert_id($db->myconn);






		$fileupload=$_FILES['photo']['name'];
		$filesize=$_FILES['photo']["size"];






		$filetmpnam=$_FILES['photo']['tmp_name'];




		$sepext = explode('.', $fileupload);
		$type = end($sepext);
		//$uniqueID = md5(uniqid());
		$newFileName = $sepext[0].'.'.$type;
		$RnewFileName = $sepext[0].'_P.'.$type;
		
		if(move_uploaded_file($filetmpnam,"images/products/big/".$newFileName)) 
		{

			$resizeObj = new resize("images/products/big/".$newFileName);	
			$resizeObj -> resizeImage(66, 91, 'crop');	
			$resizeObj -> saveImage("images/products/thumbs/".$newFileName, 100);		
			
			$resizeObj -> resizeImage(202, 186, 'crop');	
			$resizeObj -> saveImage("images/products/medium/".$newFileName, 100);		
			
			if(mysqli_query($db->myconn,"INSERT INTO `product_image`(`p_img_id`, `p_id`, `p_img_name`, `cat_id`) VALUES ('','$last_ID','$RnewFileName','$cat_id')"))
			{
				?>

				<script type="text/javascript">

					alert("Product detail successfully stored");

					window.location.href="view-product.php";

				</script>

				<?php	

			}
			else
			{
				?>

				<script type="text/javascript">

					alert("Product detail not INSERT error");

					window.location.href="product.php";

				</script>

				<?php			
			}
			
			
			
		}


	}

}
?>