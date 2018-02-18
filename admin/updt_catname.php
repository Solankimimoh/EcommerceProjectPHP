<?php
include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();

if(isset($_REQUEST['btnsbmt']))
{
	
	$cat_id=$_POST['cat_id'];
	$new_cat_name=$_POST['new_cat_name'];
	
	
	
	$cat_name_updt="UPDATE `category` SET `cat_name`='$new_cat_name' WHERE `cat_id`='$cat_id'";
	
	if(mysqli_query($db->myconn,$cat_name_updt))
	{
		?>
        
        <script type="text/javascript">
		
		alert("Category name successfully updated..");
		
		window.location.href = "view-category.php";
		
		</script>
        
        <?php
	}
	
}

?>
