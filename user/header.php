<div style="width:100%;height:5px; background-color:#0c1a1e;"></div>
<!-- Static navbar -->
<nav style="z-index:99;" class="navbar navbar-primary navbar-static-top" style="background-color:cadetblue !important;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
            <a class="navbar-brand" style="font-size: 30px;color: rgb(87, 48, 232);" href="index.php"><img src="images/logo.jpg" /> </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

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

                <li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>


            <?php


						}

						?>



        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<!--End Top Navbar-->


<!-- Static navbar -->
<nav style="z-index:0;" class="navbar navbar-default navbar-static-top" style="background-color:cadetblue !important;">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>


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

                            <li>
                                <a href="category.php?id=<?php echo $row[0]; ?>">
                                    <?php echo $row[1]; ?>
                                </a>
                            </li>
                            <?php
								}
								?>
                    </ul>
                </li>

                
                <li class=""><a href="aboutus.php">About us</a></li>
                <li class=""><a href="service.php">Service</a></li>
                <li class=""><a href="feedback.php">Feedback</a></li>

                <li class=""><a href="contactus.php">Contact us</a></li>


            </ul>

            <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">

                <li style="margin-right:0px;">
                    <div class="col-lg-4">
                        <h3>
                            <a style="text-decoration:none;color: white" href="#" class="cart-box" id="cart-info" title="View Cart">
                                <?php
										if(isset($_SESSION["products"])){
											echo count($_SESSION["products"]);
										}else{
											echo 0;
										}
										?>
                            </a>
                        </h3>
                       
                    </div>
                </li>
 <div class="shopping-cart-box" style="z-index:99;">
                            <a href="#" class="close-shopping-cart-box">Close</a>
                            <h3>Your Shopping Cart</h3>
                            <div id="shopping-cart-results">
                            </div>
                        </div>
            </ul>





        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<!--End Top Navbar-->
