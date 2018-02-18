<?php
session_start();
?>


<?php
if(session_destroy()) // Destroying All Sessions
{
?>
<script type="text/javascript">
	
	window.location.href="index.php"
</script>

<?php
}
?>