<?php
include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();

session_start(); // Starting Session

if (isset($_REQUEST['btnlgn'])) 
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];

$query = mysqli_query($db->myconn,"select * from `adminlogin` where `admnpwd`='$password' AND  `admnusername`='$username'");

$rows = mysqli_num_rows($query);

if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: home.php"); // Redirecting To Other Page
}
 else 
 {
		
	?>

<script type="text/javascript">

	alert("Username or Password not matched try again");

	window.location.href="index.php";

</script>

<?php

}

}
else
{



}

?>