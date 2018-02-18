<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<title>Checkout | picsquare</title>


  <!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?4iqyoffYOKmBe53ADL87WqQZ8HOBFPLo";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" >

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js" ></script>

	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<script src="js/jquery.js"></script>

	<?php
	include('includes/dbfunctions.php');
	include("includes/resize-class.php");
	$db = new DB_FUNCTIONS();


	if(isset($_SESSION["user_loged"]))
	{
   ?>

   <script type="text/javascript">

    window.location.href="payment.php";

  </script>

  <?php
}
else
{

}

?>

</head>
<body style="background-color: rgb(206, 206, 206);">
  <!-- Static navbar -->
   <?php include("header.php"); ?>
    
    <!--End Top Navbar-->


    <div class="container">

      <h1 style="text-align: center;margin-bottom: 20px;">Choose your way </h1>

      <div class="row" style="text-align: center;">

       <div class="col-lg-6">

        <form method="post" action="guest_user.php">

          <div class="thumbnail" style="text-align: center;background-image: url('images/bg_one.jpg');background-position-x: -350px;background-position-y: -290px;">
           <img src="images/guest.png" alt="...">
           <div class="caption">
            <h3 style="color: white;">Pay as Guest</h3>
            <p style="color: white; font-size: 15px;">No Password require. Just fill address and pay amount</p>
            <p><input type="submit" class="btn btn-lg" name="guest_user" value="Getting Started" style="background-color: rgba(255, 255, 255, 0.92);"></input></p>
          </div>
        </div>
      </form>
    </div>


    <div class="col-lg-6">
      <div class="thumbnail" style="text-align: center;background-image: url('images/bg_one.jpg');background-position-x: -350px;background-position-y: -290px;">
       <img src="images/user.png" alt="...">
       <div class="caption">
        <h3 style="color: white;">Pay with Account</h3>
        <p style="color: white; font-size: 16px;">Login your account and easily pay amount with your account</p>
        <p><a href="login.php" class="btn btn-lg" role="button" style="background-color: rgba(255, 255, 255, 0.92);"> Getting Started</a></p>
      </div>
    </div>
  </div>



</div>

</div>
<div class="row">


  <?php include 'footer.php';  ?>


</div>
</body>
</html>
