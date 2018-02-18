<?php
session_start();
?>

<?php
include("config.inc.php");
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();
// Merchant key here as provided by Payu
$MERCHANT_KEY = "G4y92B5T";


// Merchant Salt as provided by Payu
$SALT = "gBaWMfKVdD";

if (isset($_SESSION['user_loged']))
{

  if (isset($_SESSION['guest_user']))
  {
    unset($_SESSION['guest_user']);
  }

}


if(isset($_SESSION["grand_total"]))
{


  $total=$_SESSION["grand_total"];
}
else
  {?>
<script type="text/javascript">


  window.location.href="view_cart.php";

</script>
<?php
}

$final=$total;
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {
    $posted[$key] = $value;

  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
    empty($posted['key'])
    || empty($posted['txnid'])
    || empty($posted['amount'])
    || empty($posted['firstname'])
    || empty($posted['email'])
    || empty($posted['phone'])
    || empty($posted['productinfo'])
    || empty($posted['surl'])
    || empty($posted['furl'])
    || empty($posted['service_provider'])
    ) {
    $formError = 1;
} else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
  $hashVarsSeq = explode('|', $hashSequence);
  $hash_string = '';
  foreach($hashVarsSeq as $hash_var) {
    $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
    $hash_string .= '|';
  }

  $hash_string .= $SALT;


  $hash = strtolower(hash('sha512', $hash_string));
  $action = $PAYU_BASE_URL . '/_payment';
}
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
<head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  <title>Digitalprinting | Home</title>


  <!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?4iqyoffYOKmBe53ADL87WqQZ8HOBFPLo";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

      <link rel="shortcut icon" href="images/icon.ico" type="image/ico" />
      <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
      <link href='http://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css' />

      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap.theme.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">


      <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
      <script>
        var hash = '<?php echo $hash ?>';
        function submitPayuForm() {
          if(hash == '') {
            return;
          }
          var payuForm = document.forms.payuForm;
          payuForm.submit();
        }
      </script>

    </head>

    <body onLoad="submitPayuForm()" style="background-color: rgb(206, 206, 206);">
      <style type="text/css">
        .table-borderless tbody tr td, .table-borderless tbody tr th, .table-borderless thead tr th {
          border: none;
        }

      </style>
      <!--Fixed Top Navbar-->

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
            <a class="navbar-brand" style="font-size: 30px;color: rgb(87, 48, 232);" href="index.php">Digital printing</a>

          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>


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


        <div class="container" style="text-align: center;">
          <h1>Shipping Detail</h1>
          
        </div>

        <div class="container">
          <div class="row">
            <div class="col-sm-2 col-md-5" style="text-align: center;">
              <!-- here mini cart view -->
              <h2>Your Total Amount</h2>
              <br>

              <h1> Rs. <?php echo $total; ?></h1>

              <img src="images/cart.png">

            </div>
            <div class="col-sm-9 col-sm-offset-4 col-md-7 col-md-offset-0" style="">

             <br/>
             <?php if($formError) { ?>

             <span style="color:red">Please fill all mandatory fields.</span>
             <br/>
             <br/>
             <?php } ?>
             <form action="<?php echo $action; ?>" method="post" name="payuForm">

              <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
              <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
              <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
              <input hidden="" name="surl" value="<?php echo "http://localhost/picsquare/user/success.php" ?>" size="64" />
              <input hidden="true" name="furl" value="<?php echo "http://localhost/picsquare/user/failure.php"; ?>" size="64" />
              <input type="hidden" name="service_provider" value="payu_paisa" size="64" />


              <textarea hidden="" name="productinfo">
                <?php
                foreach($_SESSION["products"] as $product)
                {
                  $product_name = $product["p_name"];
                  echo $product_name;
                }
                ?>
              </textarea>

              <table class="table table-borderless ">

                <tr>
                  <td>First Name: </td>
                  <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>"/></td>
                  <td>Last Name: </td>
                  <td><input name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>

                  <td></td>

                </tr>
                <tr>
                  <td>Email: </td>



                  <td><input required="" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
                  <td>Phone: </td>
                  <td><input required="" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
                </tr>

                <tr>
                  <td><b>Shipping Address</b></td>
                  <td></td>
                </tr>
                <tr>
                  <td><input required="" hidden="" name="amount" value="<?php echo $final; ?>" /></td>
                  <td> </td>
                  <td><input name="curl" hidden="" value="" /></td>
                </tr>
                <tr>
                  <td>Address1: </td>
                  <td><input required name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
                  <td>Address2: </td>
                  <td><input required="" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
                </tr>
                <tr>
                  <td>City: </td>
                  <td><input required name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
                  <td>State: </td>
                  <td><input required name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
                </tr>
                <tr>
                  <td>Country: </td>
                  <td><input required name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
                  <td>Zipcode: </td>
                  <td><input required name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
                </tr>
                <tr>
                  <td> </td>
                  <td><input hidden="" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
                  <td></td>
                  <td><input hidden="" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
                </tr>
                <tr>
                  <td> </td>
                  <td><input hidden="" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
                  <td> </td>
                  <td><input hidden="" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
                </tr>
                <tr>
                  <td> </td>
                  <td><input hidden="" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
                  <td> </td>
                  <td><input hidden="" name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
                </tr>
                <tr>
                  <?php if(!$hash) { ?>
                  <td colspan="4"><input class="btn btn-primary" type="submit" value="Pay with PayUmoney" /></td>
                  <?php } ?>
                </tr>
              </table>
            </form>
          </div>
        </div>

      </div>
      <div class="row">


        <?php include 'footer.php';  ?>


      </div>




      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
