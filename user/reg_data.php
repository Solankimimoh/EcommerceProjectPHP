<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

 //start session

include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();



if(isset($_REQUEST['submit']))
{	

	$r_fullname=$_POST['r_fullname'];
	$r_email=$_POST['r_email'];
	$r_pwd=$_POST['r_pwd'];
	$r_repwd=$_POST['r_repwd'];
	$r_number=$_POST['r_number'];
	$r_address1=$_POST['r_address1'];
	$r_address2=$_POST['r_address2'];
	$r_city=$_POST['r_city'];
	$r_state=$_POST['r_state'];
	$r_country=$_POST['r_country'];


	$r_address=$r_address1.$r_address2;


	// $subject="Verbazon.net - Password Request"; 
	// $header="From: solankimimoh@gmail.com"; 
	// $content="Your password is ".$r_repwd; 
	//mail($r_email, $subject, $content, $header); 


	$find_user=mysqli_query($db->myconn,"SELECT * FROM `registration` WHERE `r_email`='$r_email'");


	$rows = mysqli_num_rows($find_user);

	

	if ($rows == 1) 
	{
		?>

		<script type="text/javascript">

			alert("Your Email ID already Registrated");

			window.location.href="login.php";

		</script>


		<?php
	}
	else
	{
		
		$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$promo_code = "";

		for ($i = 0; $i < 6; $i++)
		{
			$promo_code .= $chars[mt_rand(0, strlen($chars)-1)];
		} 




		$reg_insert="INSERT INTO `registration`(`r_id`, `r_fullname`, `r_email`, `r_password`, `r_promo_code`, `r_number`, `r_address`, `r_city`, `r_state`, `r_country`) VALUES ('','$r_fullname','$r_email','$r_pwd','$promo_code','$r_number','$r_address','$r_city','$r_state','$r_country')";


		if(mysqli_query($db->myconn,$reg_insert))
		{
			?>


			<script type="text/javascript">


				alert("Registration Successfully");

				window.location.href="login.php";

			</script>

			<?php
		}




	}

}


?>