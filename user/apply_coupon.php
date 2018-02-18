<?php session_start(); 

include("config.inc.php");
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();
?>

<?php

if(isset($_SESSION["user_loged"]))
{

	$username=$_SESSION["user_loged"];

	if (isset($_REQUEST['promocode_check']))
	{

		if (isset($_SESSION['promocode_session']))
		{
			?>

			<script type="text/javascript">

				alert("You can use only once on each order");

				window.location.href="view_cart.php";

			</script>
			<?php

		}


		$promo_code=$_POST['promo_code'];

		$discount=10;


		$check_auth_user_code="SELECT * FROM `registration` WHERE `r_promo_code`='$promo_code' AND `r_email`='$username'";


		$check_auth=mysqli_query($db->myconn,$check_auth_user_code);

		$check_code=mysqli_num_rows($check_auth);

		if ($check_code>0)
		{



			$count_use_promocode="SELECT * FROM `promocode_apply` WHERE `promo_code`='$promo_code' AND `promo_owner`='$username'";

			$result=mysqli_query($db->myconn,$count_use_promocode)  or die(mysql_error());

			$count=mysqli_num_rows($result);



			if ($count==0)
			{


				$apply_promocode="INSERT INTO `promocode_apply`(`promo_id`, `promo_code`, `promo_discount`, `promo_owner`) VALUES ('','$promo_code','$discount','$username')";


				if(mysqli_query($db->myconn,$apply_promocode) or die(mysql_error()))
				{

					$_SESSION['promocode_session']=$promo_code;
					?>

					<script type="text/javascript">



						window.location.href="view_cart.php";

					</script>

					<?php
				}


			}
			else if ($count<=1)
			{


				$apply_promocode1="INSERT INTO `promocode_apply`(`promo_id`, `promo_code`, `promo_discount`, `promo_owner`) VALUES ('','$promo_code','$discount','$username')";


				if(mysqli_query($db->myconn,$apply_promocode1) or die(mysql_error()))
				{

					$_SESSION['promocode_session']=$promo_code;
					?>

					<script type="text/javascript">


						window.location.href="view_cart.php";

					</script>

					<?php
				}

			}
			elseif ($count>=1)
			{


				?>

				<script type="text/javascript">


					alert("Your Promocode Validity Finished ! Sorry");
					window.location.href="view_cart.php";

				</script>

				<?php


			}

		}
		else
		{

			?>

			<script type="text/javascript">

				alert("Promocode not matched");
				window.location.href="view_cart.php";

			</script>

			<?php
		}



	}
}
else
{
	?>

	<script type="text/javascript">


	alert("You are not authorized User for Promo Code");
		window.location.href="view_cart.php";

	</script>
	<?php
}


?>
