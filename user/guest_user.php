<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

 //start session

include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();


if(isset($_REQUEST['guest_user']))
{
	$guest_user="guest_user";

	$_SESSION['guest_user']=$guest_user;

	?>

	<script type="text/javascript">


	window.location.href="payment.php";

	</script>
	<?php
}


?>