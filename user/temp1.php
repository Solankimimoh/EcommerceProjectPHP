
<?php
session_start();
?>

<?php 

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$address=$_POST['address1'];
$email=$_POST["email"];
$salt="pwhlS8e6";

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
<!DOCTYPE html>
<html>
<head>
  <title></title>


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
      background: #81C784;
      
    }
    .shadow
    {
      -webkit-box-shadow: 0px 8px 5px 0px rgba(204,204,204,1);
      -moz-box-shadow: 0px 8px 5px 0px rgba(204,204,204,1);
      box-shadow: 0px 8px 5px 0px rgba(204,204,204,1);
    }

  </style>


  <!-- Static navbar -->
  <nav style="z-index:99;" class="navbar navbar-default navbar-static-top shadow">
    <div class="">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Grocery</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="../admin/index.php">Admin</a></li>
          
          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Our Product <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <?php
              $category="SELECT * FROM `category`";

              $results=mysql_query($category);

              while ($row=mysql_fetch_row($results)) {
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
          ?>
          <ul class="nav navbar-nav pull-right" style="margin-right: 20px;">
            <li role="presentation" class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['user_loged']; ?><span class="caret"></span><span style="margin-right: 20px;" class="glyphicon glyphicon-user pull-left btn-md"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href=""> My Promo Code</a></li>
                <li><a href="view_cart.php"> My Cart</a></li>
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
          <h2 style="color: white;">Thank You. Your order status is success.</h2

          <?php
                echo "<h3>Thank You. Your order status is ". $status .".</h3>";
                echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
                echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped at ".$address."</h4>";
              }


       
     //unset($_SESSION["products"]);

          
          ?>
          <img src="images/success.png" alt="...">
          <div class="caption">
            <h3 style="color: crimson;">Home Delivery</h3>
            <p><a href="payment.php" class="btn btn-lg" role="button" style="background-color: rgba(249, 138, 138, 0.53);"> View My Order</a></p>
          </div>
        </div>

      </div>


    </div>

    <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>