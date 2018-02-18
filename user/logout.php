<?php
session_start();
?>


<?php

unset($_SESSION['user_loged']);
if(isset($_SESSION["user_loged"])) // Destroying All Sessions
{

}
else
{
	unset($_SESSION['promocode_session']);


	if(isset($_SESSION["user_loged"]))
	{

	}
	else
	{
		?>
		<script type="text/javascript">
			
			window.location.href="index.php";
		</script>

		<?php
	}
}
?>