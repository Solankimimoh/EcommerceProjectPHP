<?php 

session_start();
 ?>

<?php
include('includes/dbfunctions.php');
include("includes/resize-class.php");
$db = new DB_FUNCTIONS();

if(isset($_REQUEST['btnsbmt']))
{


		$session_user_name=$_SESSION['login_user'];
		$admin_name=$_POST['new_admin_name'];
		$admin_pwd=$_POST['new_admin_pwd'];


		$update_admin_detail="UPDATE `adminlogin` SET `admnusername`='$admin_name',`admnpwd`='$admin_pwd' WHERE `admnusername`='$session_user_name'";

		if(mysqli_query($db->myconn,$update_admin_detail))
		{
			?>

					 	<script type="text/javascript">

   			alert("Admin Detail UPDATED");

   			window.location.href="logout.php";

   	</script>



			<?php
		}

}




	?>