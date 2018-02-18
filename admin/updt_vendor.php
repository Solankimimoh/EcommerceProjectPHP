<?php 

	include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();

if(isset($_REQUEST['btnsbmt']))
{
		$vendor_id=$_POST['vendor_id'];
		$vendor_name=$_POST['new_vendor_name'];
		$vendor_pwd=$_POST['new_vendor_pwd'];


		$update_vendor_detail="UPDATE `vendor` SET `v_name`='$vendor_name',`v_pwd`='$vendor_pwd' WHERE `v_id`='$vendor_id'";

		if(mysqli_query($db->myconn,$update_vendor_detail))
		{
			?>


				 	<script type="text/javascript">

   			alert("Vendor Detail UPDATED");

   			window.location.href="view_vendor.php";

   	</script>



			<?php
		}


}
 ?>