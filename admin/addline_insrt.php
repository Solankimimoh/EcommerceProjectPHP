<?php

if(isset($_REQUEST['btnsbmt']))
{


	include('includes/dbfunctions.php');
	include("includes/resize-class.php");

	$db = new DB_FUNCTIONS();

	$line=$_POST['tagline'];

	$update_line="UPDATE `addline` SET `line`='$line' WHERE `addline_id`='1'";

	mysqli_query($db->myconn,$update_line);

	?>

	<script type="text/javascript">

	alert("Tag line update");

		window.location.href="product.php";

	</script>
	<?php

}

?>
