<?php

include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();

	if (isset($_REQUEST['btnsbmt'])) 
	{
		
		$vendor_name=$_POST['vendor_name'];
		$vendor_pwd=$_POST['vendor_pwd'];



			$insert_data="INSERT INTO `vendor`(`v_id`, `v_name`, `v_pwd`) VALUES ('','$vendor_name','$vendor_pwd')";


			if(mysqli_query($db->myconn,$insert_data))
			{
				?>

					<script type="text/javascript">

					alert("New Vendor ID created");

   			window.location.href="view_vendor.php";


   					</script>

				<?php
			}
	}

?>