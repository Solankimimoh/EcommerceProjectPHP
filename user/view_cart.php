<?php
session_start(); //start session

include("config.inc.php");
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();
$shipping_cost    = 1.50; 
setlocale(LC_MONETARY,"en_US"); // US national format (see : http://php.net/money_format)
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Review Your Cart Before Buying</title>
  <link href="style/style.css" rel="stylesheet" type="text/css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.theme.min.css" rel="stylesheet">
     <link href="../admin/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    
    
  <script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>

  
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
<body style="background-color: rgb(236, 233, 233);">


  <!-- Static navbar -->
  <?php include("header.php"); ?>
    <!--End Top Navbar-->


    <h3 style="text-align:center">Cart Detail Before Buying</h3>
    <?php
    if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
     $total       = 0;
     $list_tax    = '';
     $cart_box    = '<ul class="view-cart">';
     ?>

     <div class="container">
      <form action="checkout_1.php" method="post">
       <table class="table table-condensed" style="text-align:center">
         <tr style="background:#C0C0C0;text-align:center;font-size:15px; font-weight:600">
           <td>

             IMG

           </td>
           <td>
             Product Name
           </td>
           <td>
             Product code
           </td>
           <td>
             Product Quntity
           </td>
           <td>
             Product Price
           </td>
           <td>
             Product Product Subtotal
           </td>

         </tr><?php
  foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.

    $product_id=$product["p_id"];
    $product_name = $product["p_name"];
    $product_qty = $product["p_qty"];
    $product_price = $product["p_price"];
    $product_code = $product["product_code"];

    $item_price   = sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price
    
    $cart_box .=  "<li> $product_code &ndash;  $product_name (Qty : $product_qty ) <span> $currency. $item_price </span></li>";
    
    ?>


    <tr>
      <td>



       <?php $productPhoto = $db->getproductPhoto($product_id);?>

       <img src="../admin/images/products/medium/<?=str_replace("_P","",$productPhoto)?>" width="100px" height="100px" >

     </td>
     <td>
       <?php echo $product_name;?>
     </td>
     <td>
      <?php echo $product_code;?>
    </td>
    <td>
      <?php echo $product_qty;?>
    </td>

    <td>
      <strong style="color: #54a442">  <?php echo $product_price;?></strong>
    </td>




    <?php

    $subtotal     = ($product_price * $product_qty); //Multiply item quantity * price
    ?>
    <td>
     <strong> <?php echo "Rs. ".$subtotal;?></strong>
   </td>
 </tr>
 <?php

    $total = ($total + $subtotal); //Add up to total price


  }

  $slct_shiping="SELECT * FROM shiping_charge WHERE '$total' BETWEEN `s_amount_from` AND `s_amount_to`";

  $result=mysqli_query($db->myconn,$slct_shiping);

  while ($row=mysqli_fetch_row($result)) {

    $shipping_cost=$row[3];
  }
  


    $grand_total = $total + $shipping_cost; //grand total


  foreach($taxes as $key => $value){ //list and calculate all taxes in array
   $tax_amount  = round($total * ($value / 100));
   $tax_item[$key] = $tax_amount;
   $grand_total   = $grand_total + $tax_amount; 
 }

  foreach($tax_item as $key => $value){ //taxes List
    $list_tax .= $key. "    ". $currency. sprintf("%01.2f", $value).'<br />';
  }
  
  $shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
  
  //Print Shipping, VAT and Total
  $cart_box .= "<li class=\"view-cart-total\">$shipping_cost  $list_tax <hr>Payable Amount : $currency ".sprintf("%01.2f", $grand_total)."</li>";
  $cart_box .= "</ul>";
  
  ?>




  <td colspan="5">

  </td>
  <td>
    <div style="font-weight:600; margin-bottom:10px;" align="left" ><?php echo $shipping_cost;?> </div>
    <div  style="font-weight:600; margin-bottom: 10px;" align="left"> <?php echo $list_tax;?></div>
  </td>
</tr> 

<?php



$full_final_total=$grand_total;





?>
         

<tr>
  <td colspan="5">

  </td>
  <td>
    <div  style="font-weight:600;" align="left">Promo Code Status : <?php 

      if (isset($_SESSION['promocode_session'])) 
      {
        $promocode_discount=($full_final_total*10)/100;
        $mylast_total=$full_final_total-$promocode_discount;
        echo "10 % " ;
        $_SESSION["grand_total"]=$mylast_total;

        ?>

        <tr>
          <td colspan="5">

          </td>
          <td>
            <div  style="font-weight:600;text-decoration: line-through;" align="left">Total Amount : <?php echo $currency." ".$grand_total;?></div>
          </td>
        </tr>
        <?php
      }
      else
      {
        echo "Not Used";
        $mylast_total=$full_final_total;
        $_SESSION["grand_total"]=$mylast_total;
      }

      ?>
    </div>
  </td>
</tr>


<tr>
  <td colspan="5">

  </td>
  <td>
    <div  style="font-weight:600;" align="left"> <?php echo " Total Amount : ".$currency." ".$mylast_total;?></div>
  </td>
</tr>

<tr>

  <td colspan="5">
   <input name="grand_total" hidden="true" value="<?= $grand_total ?>" />
 </td>
 <td>
  <div  style="font-weight:600;" align="left">
  <a href="login.php" class="btn btn-success" name="sbmt" value="Pay Money">Pay Money</a></div>
</td>
</tr>



<?php

//echo $cart_box;
}else{?>
<h1 style="text-align: center;"><?php echo "Your Cart is empty"; ?><h1>

  <script type="text/javascript">

   alert("Your Cart is empty");

   window.location.href="index.php";

 </script>
 <?php
}?>
    
     
         <tr >
    
             <td colspan="5"> <div class="">
                       <input id="file-0a" class="file" name="photo" type="file" placeholder="choose one image for product" required>
                     </div></td>
    </tr>
</table>
</form>

<div id="promo_code" style="margin-bottom: 60px;">
  <div id="promo_code_container">
    <form action="apply_coupon.php" method="post">
      <label>Apply Promo Code </label>
      <input type="text" placeholder="Enter promo code" name="promo_code"  required=""> </input>
      <input type="submit" class="btn btn-primary" name="promocode_check" id="promocodebtn" value="Check"></input>
    </form>
  </div>
</div>
</div>
 <div class="row">

      
      <?php include 'footer.php';  ?>


    </div>

          <script>
            $('#file-fr').fileinput({
              language: 'fr',
              uploadUrl: '#',
              allowedFileExtensions : ['jpg', 'png','gif'],
            });
            $('#file-es').fileinput({
              language: 'es',
              uploadUrl: '#',
              allowedFileExtensions : ['jpg', 'png','gif'],
            });
            $("#file-0").fileinput({
              'allowedFileExtensions' : ['jpg', 'png','gif'],
            });
            $("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions : ['jpg', 'png','gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function(filename) {
          return filename.replace('(', '_').replace(']', '_');
        }
      });
    /*
    $(".file").on('fileselect', function(event, n, l) {
        alert('File Selected. Name: ' + l + ', Num: ' + n);
    });
    */
    $("#file-3").fileinput({
      showUpload: false,
      showCaption: false,
      browseClass: "btn btn-primary btn-lg",
      fileType: "any",
      previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
    });
    $("#file-4").fileinput({
      uploadExtraData: {kvId: '10'}
    });
    $(".btn-warning").on('click', function() {
      if ($('#file-4').attr('disabled')) {
        $('#file-4').fileinput('enable');
      } else {
        $('#file-4').fileinput('disable');
      }
    });
    $(".btn-info").on('click', function() {
      $('#file-4').fileinput('refresh', {previewClass:'bg-info'});
    });
    /*
    $('#file-4').on('fileselectnone', function() {
        alert('Huh! You selected no files.');
    });
    $('#file-4').on('filebrowse', function() {
        alert('File browse clicked for #file-4');
    });
    */
    $(document).ready(function()
    {
      $("#test-upload").fileinput({
        'showPreview' : false,
        'allowedFileExtensions' : ['jpg', 'png','gif'],
        'elErrorContainer': '#errorBlock'
      });
        /*
        $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
            alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
        });
        */
      });
    </script>

    <!-- jQuery 2.1.4 -->
<!--    <script src="../admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- Bootstrap 3.3.5 -->
<!--    <script src="../admin/bootstrap/js/bootstrap.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src="../admin/dist/js/app.min.js"></script>
 <script src="../admin/js/fileinput.js" type="text/javascript"></script>
<script>
  $(document).ready(function(){
    $("#promocodebtn").click(function(){
      $("#promo_code").hide(1000);
    });
  });
</script>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>