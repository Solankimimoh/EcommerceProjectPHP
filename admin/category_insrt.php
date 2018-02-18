<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php

		if(isset($_REQUEST['btnsbmt']))
		{
			
		
			
			$cat_name=$_POST['cat_name'];
			
			$insert_query="INSERT INTO `category`(`cat_id`, `cat_name`) VALUES ('','$cat_name')";
			
			mysqli_query($db->myconn,$insert_query);
			
		
		?>
        		<script type="text/javascript">
						
						alert("Catefory Inserted ..");
						
				window.location.href = "view-category.php";
				
				</script>
        <?php
			
			
			
			
		}
		else
		{
			echo("Error");
		}
?>
</head>

<body>

</body>
</html>