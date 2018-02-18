<?php
error_reporting(E_ALL ^ E_DEPRECATED);

session_start(); //start session
 //include config file
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  
  <title>Grocery | Home</title>
  
  <link href="style/style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/styles.css" />
  <link rel="shortcut icon" href="images/icon.ico" type="image/ico" />
  <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
  <script type="text/javascript" src="js/thickbox.js"></script>
  <link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
  <link href='http://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css' />

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.theme.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <style type="text/css">
    
    a:hover
    {
      

    }
    
  </style>
  
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <script>
    $(document).ready(function(){ 
      $(".form-item").submit(function(e){
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
      button_content.html('Adding...'); //Loading button text 

      $.ajax({ //make ajax request to cart_process.php
        url: "cart_process.php",
        type: "POST",
        dataType:"json", //expect json value from server
        data: form_data
      }).done(function(data){ //on Ajax success
        $("#cart-info").html(data.items); //total items in cart-info element
        button_content.html('Add to Cart'); //reset button text to original text
        alert("Item added to Cart!"); //alert user
        if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
          $(".cart-box").trigger( "click" ); //trigger click to update the cart box.
        }
      })
      e.preventDefault();
    });

  //Show Items in Cart
  $( ".cart-box").click(function(e) { //when user clicks on cart box
    e.preventDefault(); 
    $(".shopping-cart-box").fadeIn(); //display cart box
    $("#shopping-cart-results").html('<img src="images/loading.gif">'); //show loading image
    $("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
  });
  
  //Close Cart
  $( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
    e.preventDefault(); 
    $(".shopping-cart-box").fadeOut(); //close cart-box
  });
  
  //Remove items from cart
  $("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
    e.preventDefault(); 
    var pcode = $(this).attr("data-code"); //get product code
    $(this).parent().fadeOut(); //remove item element from box
    $.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
      $("#cart-info").html(data.items); //update Item count in cart-info
      $(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
    });
  });

});
</script>

</head>

<body>
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
        <a class="navbar-brand" href="index.php">Grocery</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="../admin/index.php">Admin</a></li>
          
          <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              Category <span class="caret"></span>
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

<script type="text/javascript">
  
  $('.carousel').carousel({
  interval: 2000
})
</script>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/slider1.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="images/slider2.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<div class="container-fluid">

  <div class="mainDiv">
    <br />
    <div class="row">
      <div class="col-lg-8">
        <h3 align="center" style="font-size:28px;font-family: 'Cabin Condensed', sans-serif;"><a href="index.php" target="_blank" style="text-decoration: none; color:#F09;">Grocery</a> </h3>
      </div>
      <div class="col-lg-4">
        <h3><a style="text-decoration:none;color: white" href="#" class="cart-box" id="cart-info" title="View Cart"><?php 
          if(isset($_SESSION["products"])){
            echo count($_SESSION["products"]); 
          }else{
            echo 0; 
          }
          ?>
        </a></h3>
        <div class="shopping-cart-box" style="z-index:99;">
          <a href="#" class="close-shopping-cart-box" >Close</a>
          <h3>Your Shopping Cart</h3>
          <div id="shopping-cart-results">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3">
        <div class="divbox divbox1">
          <div style="display:none;" class="productCategoryLeftPanel"></div>
          <form name="frm_filter" id="frm_filter" method="post" action="">
            <div class="productCategoryLeftPanel" id="productCategoryLeftPanel">

              <?php //include_once 'pageportion/search-box.php';  ?>

              <div class="pro_cat_title">                   
                <h1 style="cursor:pointer;"><a>Category</a><span class="spanbrandcls" style="float:right; visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span></h1>           
              </div>
              <div id="branddivID"><?php include 'pageportion/category.php';  ?></div>

              <div class="pro_cat_title">
                <h1 style="cursor:pointer;"><a>Product Type</a><span class="spancolorcls" style="float:right; visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span></h1>
              </div>             

              <?php include 'pageportion/product_type.php';  ?>                    



              <div class="pro_cat_title">
                <h1 style="cursor:pointer;"><a>Price</a><span class="spanpricecls" style="float:right; visibility:hidden;"><a href="javascript:;"><img src="images/reset.png" alt="reset" title="reset" /></a></span></h1>
              </div>          
              <?php include 'pageportion/prices.php';  ?>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="">
          <?php include 'pageportion/show-filters.php';  ?>        
          <?php include 'products.php';  ?>
          <div style="clear:both;"></div>
        </div>      
      </div>
    </div>
  </div>
</div>
<script type="application/javascript" src="js/productfilter.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>