<?php
session_start();
?>


 <!DOCTYPE html>
 <html>
 <head>
<?php 



$status=$_POST["status"];
$firstname=$_POST["firstname"];
$lastname=$_POST['lastname'];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$address=$_POST['address1'];
$address2=$_POST['address2'];
$state=$_POST['state'];
$email=$_POST["email"];
$salt="gBaWMfKVdD";

If (isset($_POST["additionalCharges"])) {
 $additionalCharges=$_POST["additionalCharges"];
 $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

}
else {    

  $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

}
$hash = hash("sha512", $retHashSeq);

if ($hash != $posted_hash) {
 echo "Invalid Transaction. Please try again";
}
else {
 ?>
 <?php
 include('includes/dbfunctions.php');
 $db = new DB_FUNCTIONS();
 ?>
  <?php



  if(isset($_SESSION["user_loged"]))
  {

    $lgn_email=$_SESSION['user_loged'];

    $main_address=$address."".$address2;
    //

    if(isset($_SESSION["products"]) && count($_SESSION["products"])>0)
    {


      $order_detail_insert="INSERT INTO `user_order_detail`(`o_id`, `o_lgn_email`, `o_u_email`, `o_total_amount`, `o_u_address`) VALUES ('','$lgn_email','$email','$amount','$main_address')";

      $result3=mysqli_query($db->myconn,$order_detail_insert) or die(mysql_error());

      $last_ID = mysqli_insert_id($db->myconn);


      foreach($_SESSION["products"] as $product)
      { 
  //Print each item, quantity and price.

        $product_id=$product["p_id"];
        $product_name = $product["p_name"];
        $product_qty = $product["p_qty"];
        $product_price = $product["p_price"];
        $product_code = $product["product_code"];

   // echo $product_name;



        $item_price   = sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price

        $order_product_insert="INSERT INTO `user_order_product_detail`(`p_id`, `p_qty`, `p_price`, `p_total_price`, `o_id`,`pro_id`) VALUES ('','$product_qty','$product_price','$item_price','$last_ID','$product_id')";
    //echo $item_price;


        mysqli_query($db->myconn,$order_product_insert);


      }

    }

  }
  else if (isset($_SESSION["guest_user"])) 
  {
    

    $main_address=$address."".$address2;
    //

    if(isset($_SESSION["products"]) && count($_SESSION["products"])>0)
    {


      $order_detail_insert="INSERT INTO `guest_order_detail`(`g_o_id`, `g_o_email`, `g_o_total_amount`, `g_o_address`) VALUES ('','$email','$amount','$main_address')";

      $result3=mysqli_query($db->myconn,$order_detail_insert) or die(mysql_error());

      $last_ID = mysqli_insert_id($db->myconn);


      foreach($_SESSION["products"] as $product)
      { 
  //Print each item, quantity and price.

        $product_id=$product["p_id"];
        $product_name = $product["p_name"];
        $product_qty = $product["p_qty"];
        $product_price = $product["p_price"];
        $product_code = $product["product_code"];

   // echo $product_name;



        $item_price   = sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price

        $order_product_insert="INSERT INTO `guest_order_product_detail`(`g_p_id`, `g_p_qty`, `g_p_price`, `g_p_total_price`, `g_o_id`, `pro_id`) VALUES ('','$product_qty','$product_price','$item_price','$last_ID','$product_id')";
    //echo $item_price;


        mysqli_query($db->myconn,$order_product_insert);


      }

    }

  }
  



  ?>



  <title>Grocery :: Success</title>


  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" >

  <!-- Optional theme -->
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" >

  <!-- Latest compiled and minified JavaScript -->
  <script src="js/bootstrap.min.js" ></script>

</head>
<body>

  <style type="text/css">

    body
    {
      background-color: rgb(206, 206, 206);
      
    }
    .shadow
    {
      -webkit-box-shadow: 0px 8px 5px 0px rgba(204,204,204,1);
      -moz-box-shadow: 0px 8px 5px 0px rgba(204,204,204,1);
      box-shadow: 0px 8px 5px 0px rgba(204,204,204,1);
    }

  </style>

  <!-- Static navbar -->
  <nav style="z-index:99;" class="navbar navbar-default navbar-static-top">
    <div class="">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" style="font-size: 30px;color: rgb(87, 48, 232);" href="index.php">Grocery Deal</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li ><a href="index.php">Home</a></li>
          
          
          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Our Products<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <?php
              $category="SELECT * FROM `category`";

              $results=mysqli_query($db->myconn,$category);

              while ($row=mysqli_fetch_row($results)) {
                ?>

                <li><a href="category.php?id=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></a></li>
                <?php
              }
              ?>
            </ul>
          </li>

        </ul>
        <?php


        if(isset($_SESSION["user_loged"]))
        {
          $username=$_SESSION["user_loged"];
          ?>
          <ul class="nav navbar-nav pull-right" style="margin-right: 20px;">
            <li role="presentation" class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['user_loged']; ?><span class="caret"></span><span style="margin-right: 20px;" class="glyphicon glyphicon-user pull-left btn-md"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href=""> My Promo Code |  <?php

                    $promocode="SELECT `r_promo_code` FROM `registration` WHERE `r_email`='$username'";

                    $result=mysqli_query($db->myconn,$promocode);

                    $row=mysqli_fetch_row($result);
		
		
		            echo $row[0];

                    ?>
                  </a></li>
                  <li><a href="view_cart.php"> My Cart</a></li>
                  <li><a href="my_order.php">My Orders</a></li>
                  <li><a href="logout.php"> Logout </a></li>

                </ul>
              </li>
            </ul>
            <?php
          }
          else
          {
            ?>

            <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
            <li><a href="../vendor/index.php"><span class="glyphicon glyphicon-user"></span> Vendor</a></li>
              <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>


            <?php


          }

          ?>



        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!--End Top Navbar-->

    <div class="container">


      <div class="row" style="text-align: center;">

        <div class="col-lg-12 col-md-12 col-xs-12">

          <div class="" style="text-align: center;">

            <?php
            echo "<h4 style='color: black;'>Thank You. Your order status is ". $status .".</h4>";
            echo "<h4 style='color: black;'>Your Transaction ID for this transaction is ".$txnid.".</h4>";
            echo "<h4 style='color: black;'>We have received a payment of Rs. " . $amount ."</h4>" ;
            echo "<h4 style='color: black;'> Your order will soon be shipped at ".$address."</h4>";
          }



          unset($_SESSION["products"]);
          unset($_SESSION["promocode_session"]);
          unset($_SESSION['grand_total']);



          ?>
          <img src="images/success.png" alt="...">
          <div class="caption">
            <h3 style="color: black;">Home Delivery</h3>
            <p><a href="my_order.php" class="btn btn-lg" role="button" style="color: black; background-color: #43A047"> Home</a></p>
          </div>
        </div>

      </div>


    </div>

    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>