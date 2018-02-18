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



	$update_pwd="UPDATE `registration` SET `r_password`='$f_new_repwd' WHERE `r_email`='$f_email'";





	if(mysql_query($update_pwd))
	{
		$row=mysql_affected_rows();

		if($row==1)
		{

			?>

			<script type="text/javascript">

				alert("Your Password updated");

				window.location.href="login.php";

			</script>

			<?php
		}
		else 
		{

			?>

			<script type="text/javascript">

				alert("Email ID not found");

				window.location.href="login.php";

			</script>

			<?php

		}
	}
	
}