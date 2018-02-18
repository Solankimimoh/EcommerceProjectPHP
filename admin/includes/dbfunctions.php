<?php

define("DBHOST","localhost");
define("DBUSER","root");
define("DBPWD","");
define("DB","digitalprinting");

class DB_FUNCTIONS {

	var $myconn;

	public function __construct() {
        
		$conn = mysqli_connect(DBHOST,DBUSER,DBPWD,DB);

		$this->myconn = $conn;

        return $this->myconn;

	}
    
    
//       function connect() {
//        $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DB);
//        if (!$con) 
//        {
//            die('Could not connect to database!');
//        }
//        else 
//        {
//            $this->myconn = $con;
//            
//        }
//        return $this->myconn;
//    }

	public function getResults($table)
	{
		$data = array();
		$query = mysqli_query($this->myconn,"SELECT * FROM $table") or die(mysql_error());
		$num_rows = mysqli_num_rows($query);
		if($num_rows>0) {
			while($row=mysqli_fetch_assoc($query))
				$data[]=$row;
		}
		return $data;
	}

	public function allProducts()
	{
		$query = mysqli_query($this->myconn,"SELECT * FROM `product`");
		while($row=mysqli_fetch_assoc($query))
		{
			$data[]=$row;
		}
		if (empty($data))
		{
			?>
			<script type="text/javascript">

				alert("No product are available insert new product");

				window.location.href="product.php";

			</script>

			$data="no data";

			<?php
		}
		else
		{
			return $data;
		}

	}

	public function productofCategory($id)
	{
		$query = mysqli_query($this->myconn,"SELECT * FROM `product` WHERE `cat_id`='$id'");
		while($row=mysqli_fetch_assoc($query))
		{
			$data[]=$row;
		}
		if (empty($data))
		{
			?>


			<h1 style="font-family:'Arial Black', Gadget, sans-serif;font-size:30px;color:#0099FF;text-align:center;">No Results with this filter
			<?php
		}
		else
		{
			return $data;
		}
	}

	public function getproductPhoto($id)
	{
		$photo = mysqli_query($this->myconn,"SELECT `p_img_name` FROM `product_image` WHERE `p_id` = '$id' LIMIT 1");
        
        $row=mysqli_fetch_row($photo);
		
		
		return $row[0];

	}


	public function getProductDetails($id)
	{
		$query = mysqli_query($this->myconn,"SELECT * FROM product where p_id = $id");
		while($row=mysqli_fetch_assoc($query))
			$data=$row;

		return $data;

	}

	public function getAvailableSize($id)
	{
		$query = mysqli_query($this->myconn,"SELECT sizeID from tbl_productsizes where ProductID = $id");
		while($row=mysqli_fetch_assoc($query))
			$data[]=$row;

		return $data;
	}

}
?>
