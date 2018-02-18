<?php
error_reporting(E_ALL ^ E_DEPRECATED);

session_start(); //start session
 //include config file
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();


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

	<title>digitalprinting :: My order</title>

	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.theme.min.css" rel="stylesheet">

</head>
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?4iqyoffYOKmBe53ADL87WqQZ8HOBFPLo";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

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

							<th>Your Cart</th>
							<th>Email ID</th>
							<th>Amount</th>
							<th>Shiping Address</th>
							<th>Product Details</th>

						</tr>

					</thead>

					<tbody>

						<?php

						$get_order_detail="SELECT * FROM `user_order_detail` WHERE `o_lgn_email`='$username'";

						$result=mysqli_query($db->myconn,$get_order_detail);

                        if(mysqli_num_rows($result)>0)
                        {

                        }
                        else
                        {
                            ?>

                        <tr>

                        <td> <h1>No Order History </h1>
                            </td></tr>

                        <?php
                        }

						while ($row=mysqli_fetch_row($result))
						{

							?>
							<tr>
								<td><img src="images/order_cart.png" width="50px" height="50px"></td>
								<td><?php echo $row[2]; ?></td>
								<td><?php echo $row[3]; ?></td>
								<td><?php echo $row[4]; ?></td>
								<td><a class="btn btn-success" href="product_detail.php?id=<?php echo $row[0]; ?>">View Detail </a></td>
							</tr>
							<?php
						}
						?>
					</tbody>

				</table>

			</div>

		</div>

	</div>

	<script src="js/bootstrap.min.js"></script>


</body>
</html>
