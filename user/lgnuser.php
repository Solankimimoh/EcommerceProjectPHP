<?php
include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();

session_start(); // Starting Session

if (isset($_REQUEST['btnlgn'])) 
{
// Define $username and $password
$username=$_POST['email'];
$password=$_POST['password'];

$query = mysqli_query($db->myconn,"SELECT * FROM `registration` WHERE `r_email`='$username' AND `r_password`='$password'");

$rows = mysqli_num_rows($query);

if ($rows == 1) {
$_SESSION['user_loged']=$username; // Initializing Session
header("location: view_cart.php"); // Redirecting To Other Page
}
 else 
 {
		
	?>

<script type="text/javascript">

	alert("Username or Password not matched try again");

	window.location.href="login.php";

</script>

<?php

}

}
else
{



}

?>