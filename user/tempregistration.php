
<html >
<head>
  <title>Grocery | Home</title>


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

  <?php


  if(isset($_POST['submit']))
  {
  ?>
  <script type="text/javascript">

    alert("registration Succeed");

    window.location.href="tempregistration.php";

  </script>


  <?php
}

?>

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
        <a class="navbar-brand" style="font-size: 30px;color: rgb(87, 48, 232);" href="index.php">picsquare</a>
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

                $result=mysql_query($promocode);

                echo mysql_result($result,0);
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
  <h1>Registratin Detail</h1>
  <p>Registratin Page</p>
</div>

<div class="container">
  <div class="row">

    <div class="col-lg-12" style="">
     <h2>User Details</h2>


     <form action="#" method="post" name="payuForm">


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
        <td><input name="firstname" required="" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>"/></td>
        <td>Last Name: </td>
        <td><input name="lastname" required="" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>

        <td></td>

      </tr>
      <tr>
        <td>Email: </td>



        <td><input required="" type="email" required name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>
        <td>Phone: </td>
        <td><input required="" required="" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" /></td>
      </tr>

      <tr>
        <td><b>Test Registraion</b></td>
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
        <td>Registration Type </td>
        <td><select>
          <option>User</option>
          <option>Vendor</option>
        </select></td>
        <td> </td>
        <td></td>
      </tr>
      <tr>

        <td colspan="4"><input class="btn btn-primary" name="submit" type="submit" value="Pay with PayUmoney" /></td>

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
