<?php session_start() ?>

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
//start page data


if(isset($_REQUEST['submit']))
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
		$old_img=$_SESSION['pro'];
		$product_id=$_SESSION['product_id'];

		$new_img =str_replace("_P","",$old_img);

		$p_name = $_POST['p_name'];
		
		$p_desc = $_POST['p_desc'];
		
		
		$cat_id = $_POST['cat_id'];
		$p_price = $_POST['p_price'];

		$sql = "UPDATE `product` SET `p_name`='$p_name',`p_desc`='$p_desc',`cat_id`='$cat_id',`p_price`='$p_price' WHERE  `p_id`='$product_id'";
		
		$result3=mysqli_query($db->myconn,$sql);
		$last_ID = mysqli_insert_id($db->myconn);
		

		unlink("images/products/medium/$new_img");
		
		unlink("images/products/big/$new_img");
		
		unlink("images/products/thumbs/$new_img");
		
		$fileupload=$_FILES['photo']['name'];

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
			
			if(mysqli_query($db->myconn,"UPDATE `product_image` SET `p_img_name`='$RnewFileName',`cat_id`='$cat_id' WHERE `p_id`='$product_id'"))
			{
				?>

				<script type="text/javascript">

					alert("Product detail successfully UPDATE");

					window.location.href="view-product.php";

				</script>

				<?php	

				

			}
			else
			{
				?>

				<script type="text/javascript">

					alert("Product detail successfully Not UPDATE");

					window.location.href="view-product.php";

				</script>

				<?php				
			}
			
			
		}
		else
		{
			echo "Filetmp not found";
		}



		
	}
}
else
{
	?>

	<script type="text/javascript">
				//window.location.href="index.php"
			</script>

			<?php
		}
		

		?>