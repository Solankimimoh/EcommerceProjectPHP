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



	<title>Digital Pri | Home</title>

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="build.css"/>
	<link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">
	<link rel='canonical' href='http://www.cssscript.com/demo/pretty-checkbox-radio-inputs-with-bootstrap-and-awesome-bootstrap-checkbox-css/' />

	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<link rel="stylesheet" type="text/css" href="build.css">
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


<!-- Chat Window -->

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

	<body style="background-color: rgb(206, 206, 206);">
		<!--Fixed Top Navbar-->

       <?php include("header.php"); ?>


			<div class="container-fluid">



				<div class="mainDiv">

					<!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
					<div id="wowslider-container1">
						<div class="ws_images">
							<ul>
								<li><img src="data1/images/slider1.jpg" alt="slider1" title="slider1" id="wows1_0"/></li>
								<li><img src="data1/images/slider2.jpg" alt="slider2" title="slider2" id="wows1_1"/></li>
								<li><img src="data1/images/slider3.jpg" alt="wowslider.net" title="slider3" id="wows1_2"/></li>
								<li><img src="data1/images/slider4.jpg" alt="slider4" title="slider4" id="wows1_3"/></li>
							</ul>
						</div>
						<div class="ws_bullets">
							<div>
								<a href="#" title="slider1"><span><img src="data1/tooltips/slider1.jpg" alt="slider1"/>1</span></a>
								<a href="#" title="slider2"><span><img src="data1/tooltips/slider2.jpg" alt="slider2"/>2</span></a>
								<a href="#" title="slider3"><span><img src="data1/tooltips/slider3.jpg" alt="slider3"/>3</span></a>
								<a href="#" title="slider4"><span><img src="data1/tooltips/slider4.jpg" alt="slider4"/>4</span></a>
							</div>
						</div>

						<div class="ws_shadow"></div>
					</div>


					<div class="row">
						<div class="col-lg-12">
							<h3 align="center" style=" color:black; font-size:38px;font-family: 'Cabin Condensed', sans-serif;">
								Services
									 </h3>
								</div>
								
								</div>
                    
                    <div class="fluid-container">
                    					 <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Modern Business
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Bootstrap v3.3.7</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Free &amp; Open Source</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Easy to Use</h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                        <a href="#" class="btn btn-default">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
                        
                        
        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Modern Business Features</h2>
            </div>
            <div class="col-md-6">
                <p>The Modern Business template by Start Bootstrap includes:</p>
                <ul>
                    <li><strong>Bootstrap v3.3.7</strong>
                    </li>
                    <li>jQuery v1.11.1</li>
                    <li>Font Awesome v4.2.0</li>
                    <li>Working PHP contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                    <li>17 HTML pages</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

                        

                    </div>
	
					
						<div class="row">


							<?php include 'footer.php';  ?>


						</div>
					</div>

					<script type="text/javascript">
						function changeState(el) {
							if (el.readOnly) el.checked=el.readOnly=false;
							else if (!el.checked) el.readOnly=el.indeterminate=true;
						}
					</script>

					<script type="application/javascript" src="js/productfilter.js"></script>
					<script src="js/jquery.js"></script>
					<script src="js/bootstrap.min.js"></script>

					<script type="text/javascript" src="engine1/wowslider.js"></script>
					<script type="text/javascript" src="engine1/script.js"></script>



					<script>
  (function (w,i,d,g,e,t,s) {w[d] = w[d]||[];t= i.createElement(g);
    t.async=1;t.src=e;s=i.getElementsByTagName(g)[0];s.parentNode.insertBefore(t, s);
  })(window, document, '_gscq','script','//widgets.getsitecontrol.com/76409/script.js');
</script>

				</body>
				</html>
