<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

 //start session

include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();



if(isset($_REQUEST['submit']))
{	

	$f_email=$_POST['f_email'];
	$f_new_pwd=$_POST['f_new_pwd'];
	$f_new_repwd=$_POST['f_new_repwd'];



	$update_pwd="UPDATE `adminlogin` SET `admnpwd`='$f_new_repwd' WHERE `admnusername`='$f_email'";





	if(mysqli_query($db->myconn,$update_pwd))
	{
		$row=mysqli_affected_rows($db->myconn);

		if($row==1)
		{

			?>

			<script type="text/javascript">

				alert("Your Password updated");

				window.location.href="index.php";

			</script>

			<?php
		}
		else 
		{

			?>

			<script type="text/javascript">

				alert("Email ID not found");

				window.location.href="forgotpwd.php";

			</script>

			<?php

		}
	}
	
}