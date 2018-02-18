<?php
error_reporting(E_ALL ^ E_DEPRECATED);

session_start(); //start session
 //include config file
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();

$id=$_GET['id'];


if(isset($_SESSION["user_loged"]))
{
	$username=$_SESSION['user_loged'];

}
else
{

	?>

	<script type="text/javascript">

		window.location.href="index.php";

	</script>

	<?php

}

?>
<!DOCTYPE html>
<html>
<head>

	<title>picsquare :: My order</title>

	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.theme.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>


<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?4iqyoffYOKmBe53ADL87WqQZ8HOBFPLo";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

</head>
<body style="background-color: rgb(236, 233, 233);">

	<!-- Static navbar -->
 <?php include("header.php"); ?>
    <!--End Top Navbar-->

		<div class="container">

			<div class="row">

				<div class="col-lg-12">

					<table class="table table-hover">
						<thead>

							<tr>

								<th>Product Image</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Total</th>

							</tr>

						</thead>

						<tbody>

							<?php

							$get_order_detail="SELECT * FROM `user_order_product_detail` WHERE `o_id`='$id'";

							$result=mysqli_query($db->myconn,$get_order_detail);

							while ($row=mysqli_fetch_row($result))
							{

								?>
								<tr>
									<td>
										<?php $productPhoto = $db->getproductPhoto($row[5]);?>

										<img src="../admin/images/products/medium/<?=str_replace("_P","",$productPhoto)?>" width="100px" height="100px" ></td>
										<td><?php echo $row[1]; ?></td>
										<td><?php echo $row[2]; ?></td>
										<td><?php echo $row[3]; ?></td>
									</tr>
									<?php
								}
								?>
							</tbody>

						</table>

					</div>

				</div>

			</div>


			<script src="js/jquery.js"></script>
			<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>

		</body>
		</html>
