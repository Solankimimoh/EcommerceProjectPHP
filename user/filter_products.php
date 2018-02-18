<?php
include('includes/dbfunctions.php');
$db = new DB_FUNCTIONS();

$bcheck = $_REQUEST['bcheck'];
$scheck = $_REQUEST['scheck'];
$ccheck = $_REQUEST['ccheck'];
$price_range = $_REQUEST['price_range'];

$WHERE = array();
 $inner = $w = '';

if(!empty($price_range)) {
	$data3 = explode('-',$price_range);
	$WHERE[] = "(t1.p_price between $data3[0] and $data3[1])";
}

if(!empty($bcheck)) {		
	
	if(strstr($bcheck,',')) 
	{
		$data1 = explode(',',$bcheck);
		$barray = array();
		foreach($data1 as $c)
		 {
			$barray[] = "t1.cat_id = $c";
		}
		$WHERE[] = '('.implode(' OR ',$barray).')';
	}
	 else 
	{
		$WHERE[] = '(t1.cat_id = '.$bcheck.')';
	}
}

if(!empty($ccheck))
 {
	if(strstr($ccheck,',')) 
	{
		$data2 = explode(',',$ccheck);
		$carray = array();
		foreach($data2 as $c) 
		{
			$carray[] = "t1.p_type = $c";
		}
		$WHERE[] = '('.implode(' OR ',$carray).')';
	} else 
	{
		$WHERE[] = '(t1.p_type = '.$ccheck.')';
	}
}


	$w = implode(' AND ',$WHERE);
	if(!empty($w)) $w = 'WHERE '.$w;
	
	
	
	//echo "SELECT DISTINCT  t1 . * FROM  `tbl_products` AS t1 $inner $w";
	$query = mysqli_query($db->myconn,"SELECT DISTINCT  t1 . * FROM  `product` AS t1 $inner $w");
	if(mysqli_num_rows($query)>0) {
		while($pro = mysqli_fetch_assoc($query)) {
			$productPhoto = $db->getproductPhoto($pro['p_id']);
		?>
		
		<!-- -->	
			<div class="divbox" onclick="tb_show('<?=$pro['p_name']?>','product-details.php?id=<?=$pro['p_id']?>&keepThis=true&TB_iframe=true&height=500&width=900','thickbox');">
			
			
				<div style="width: 202px;height: 186px;background:url(../admin/images/products/medium/<?=str_replace("_P","",$productPhoto)?>) no-repeat;" alt="<?=$pro['p_name']?>">
					<div class="image-hover"></div>
				</div>
	
				
				<div class="product_name" align="center">
					<a href="#"><span class="productname"><?=$pro['p_name']?></span></a>
					<div class="price">
						<span class="product_price"><a href="#">Rs. <?=$pro['p_price']?></a></span>                            
					</div>
					
				</div>
			</div>
		
		<!--  -->
		
			
		<?php
		}
	} else {
		?>
        <div align="center"><h2 style="font-family:'Arial Black', Gadget, sans-serif;font-size:30px;color:#0099FF;">No Results with this filter</h2></div>
        <?php	
	}
?>