<div id="loaderID" style="position:absolute; top:60%; left:53%; z-index:2; opacity:0"><img src="images/ajax-loader.gif" /></div>
<div id="productContainer">
	<?php
	$products = $db->allProducts();
	if(count($products)>0) {
		foreach($products as $pro) {
			$productPhoto = $db->getproductPhoto($pro['p_id']);
			?>
			
			<div class="divbox" class="" onclick="tb_show('<?=$pro['p_name']?>','product-details.php?id=<?=$pro['p_id']?>&keepThis=true&TB_iframe=true&height=500&width=900','thickbox');">
				
				
				<div style="width: 202px;height: 186px;background:url(../admin/images/products/medium/<?=str_replace("_P","",$productPhoto)?>) no-repeat;" alt="<?=$pro['p_name']?>">
					<div class="image-hover"></div>
				</div>

				
				<div class="product_name" align="center">
					<a href="#"><span style="font-size:16px;" class="productname"><?=$pro['p_name']?></span></a>
					<div class="price">
						
						<span class="product_price"><a href="#">Rs. <?=$pro['p_price']?></a></span>         			                  
					</div>
					
				</div>
			</div>
			
			
			<?php
		}
	}
    else
    {
        ?>
    <h2>Tempoary no products avaiable AND Category</h2>
    
    <?php
    }
	?>
</div>