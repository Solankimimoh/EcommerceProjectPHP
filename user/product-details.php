<?php
include('includes/dbfunctions.php');
session_start(); //start session
$ProductID = $_GET['id'];
$db = new DB_FUNCTIONS();


$ProductDetails = $db->getProductDetails($ProductID);
$getProductPhoto = $db->getproductPhoto($ProductID);

$img= str_replace("_P","",$getProductPhoto);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href='http://fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css' />
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<style type="text/css">
.button {
		padding: 5px 10px;
		display: inline;
		background: #777 url(images/button.png) repeat-x bottom;
		border: none;
		color: #fff;
		cursor: pointer;
		font-weight: bold;
		border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		text-shadow: 1px 1px #666;
		font-family:'Cabin Condensed', serif;
		}
	.button:hover {
		background-position: 0 center;
		}
	.button:active {
		background-position: 0 top;
		position: relative;
		top: 1px;
		padding: 6px 10px 4px;
		}
	.button.red { background-color: #e50000; }
	.button.purple { background-color: #9400bf; }
	.button.green { background-color: #58aa00; }
	.button.orange { background-color: #ff9c00; }
	.button.blue { background-color: #2c6da0; }
	.button.black { background-color: #333; }
	.button.white { background-color: #fff; color: #000; text-shadow: 1px 1px #fff; }
	.button.small { font-size: 75%; padding: 3px 7px; }
	.button.small:active { padding: 4px 7px 2px; background-position: 0 top; }
	.button.large { font-size: 125%; padding: 7px 12px; }
	.button.large:active { padding: 8px 12px 6px; background-position: 0 top; }
	
	.ordernow {
	-moz-box-shadow:inset -3px 1px 10px -11px #caefab;
	-webkit-box-shadow:inset -3px 1px 10px -11px #caefab;
	box-shadow:inset -3px 1px 10px -11px #caefab;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #77d42a), color-stop(1, #5cb811) );
	background:-moz-linear-gradient( center top, #77d42a 5%, #5cb811 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77d42a', endColorstr='#5cb811');
	background-color:#77d42a;
	-moz-border-radius:23px;
	-webkit-border-radius:23px;
	border-radius:23px;
	border:1px solid #268a16;
	display:inline-block;
	color:#306108;
	font-family:arial;
	font-size:28px;
	font-weight:bold;
	padding:10px 36px;
	text-decoration:none;
	text-shadow:0px 1px 0px #aade7c;
	cursor:pointer;
}.ordernow:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #5cb811), color-stop(1, #77d42a) );
	background:-moz-linear-gradient( center top, #5cb811 5%, #77d42a 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#5cb811', endColorstr='#77d42a');
	background-color:#5cb811;
	cursor:pointer;
}.ordernow:active {
	position:relative;
	top:1px;
	cursor:pointer;
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
				alert("Item added to Cart!");
				
			
				 //alert user
				 
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
		$("#shopping-cart-results").html('<img src="images/demoloader.gif">'); //show loading image
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
<form class="form-item" method="post">
<div style="width:900px; height:480px; border:0px solid red;">

	
  	
	<div id="bigImage" style="width:360px;border:0px solid red; float:left;margin-left:5px;">
			<img src="../admin/images/products/big/<?php echo $img;?>" width="500px" height="500px" />
			<div style="clear:both;"></div>
	</div>
	
	
	<div style="border:0px solid red; margin-left:441px;" align="center">
	
		<span style="font-family:'Cabin Condensed', serif; font-size:30px;color:#0099FF;"><?=$ProductDetails['p_name']?></span><br /><br />
		<span style="font-family:'Cabin Condensed', serif; font-size:25px; color:#903;">Rs . <?=$ProductDetails['p_price']?></span><br /><br />
		
		<p style="font-family:'Cabin Condensed', serif;font-size:15px; color:#000000;  text-align:centre;">
		<?=$ProductDetails['p_desc']?>
		</p>
		<br /><br /><br />
		<span style="font-family:'Cabin Condensed', serif; font-size:25px; color:#0099FF;">Quantity</span><br /><br />
		<select name="p_qty">
        <option>1</option>
         <option>2</option>
          <option>3</option>
           <option>4</option>
                </select>
		
		<br /><br /><br />
        <input name="product_code" value="<?=$ProductDetails['p_code']?>" hidden="true">
    <button class="ordernow" type="submit">Add to Cart</button>
	
	
	</div>
	
	
	


</div>

</form>
</body>
</html>