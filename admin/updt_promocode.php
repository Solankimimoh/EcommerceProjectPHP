<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

 //start session

include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();


if(isset($_REQUEST['btnsbmt']))
{

	$user_id=$_POST['user_id'];
	$user_new_promocode=$_POST['user_new_promocode'];



	$update_promocode="UPDATE `registration` SET `r_promo_code`='$user_new_promocode' WHERE `r_id`='$user_id'";


	if(mysqli_query($db->myconn,$update_promocode))
	{
		?>
		<script type="text/javascript">

			alert("User Promocode Successfully Update");

			window.location.href="user_detail.php";

		</script>

		<?php
	}


}

?>

