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
							<h1 align="center" style=" color:black; font-size:38px;font-family: 'Cabin Condensed', sans-serif;">
								Contact Us
									 </h1>
								</div>
								
								</div>
                    
                    <div class="fluid-container">
    
    <div class="jumbotron jumbotron-sm" style="background:none;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                 <h3>For any assistance or problems, you can contact us.
Our entire team is dedicated to provide you with a memorable	experience of sharing your memories with your friends and family. We would like to hear your suggestion, comments or new feature request.</h3>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            </form>
        </div>
    </div>
</div>

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
