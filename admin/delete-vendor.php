<?php 

include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();

	$vendor_id=$_GET['id'];



	$delete_vendor="DELETE FROM `vendor` WHERE `v_id`='$vendor_id'";


	if(mysqli_query($db->myconn,$delete_vendor))
	{
		?>

			 	<script type="text/javascript">

   				alert("Vendor DELETED");

   				window.location.href="view_vendor.php";

   				</script>


		<?php
	}



  ?>