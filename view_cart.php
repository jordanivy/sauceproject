<?php
session_start(); //start session
include("config.inc.php");
setlocale(LC_MONETARY,"en_US"); // US national format (see : http://php.net/money_format)
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Review Cart</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
</head>
<style>
body {
	background-image: url("images/pagebg.jpg");
	background-repeat: repeat;
	font:10pt tahoma; 
	margin:0;
	padding:0;
}
</style>
<body>
<?php
require_once "headerFooter.php";
pageHeader("Review Cart");
?>
<div id="contain">
<div id="content">
<h4>Review Cart</h4>
<?php
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '<ul class="view-cart">';

	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$product_name = $product["product_name"];
		$product_qty = $product["product_qty"];
		$product_price = $product["product_price"];
		$product_code = $product["product_code"];
		$product_size = $product["product_size"];
		
		$item_price 	= sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price
		
		$cart_box 		.=  "$product_code &ndash;  $product_name (Qty : $product_qty | $product_size) <span> <b>$currency$item_price</b> </span>";
		
		$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
	}
	
	$grand_total = $total + $shipping_cost; //grand total
	
	foreach($taxes as $key => $value){ //list and calculate all taxes in array
			$tax_amount 	= round($total * ($value / 100));
			$tax_item[$key] = $tax_amount;
			$grand_total 	= $grand_total + $tax_amount; 
	}
	
	foreach($tax_item as $key => $value){ //taxes List
		$list_tax .= $key. ' '. $currency. sprintf("%01.2f", $value).'<br />';
	}
	
	$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
	
	//Print Shipping, VAT and Total
	$cart_box .= "<div class=\"view-cart-total\">$shipping_cost  $list_tax <hr>Payable Amount : $currency ".sprintf("%01.2f", $grand_total)."</div>";
	$cart_box .= "</ul>";
	
	echo $cart_box;
	
	echo "<form action='orderprocess.php' method='post'>
		<div class='buttons'>
			<center>
			<button class='btn red'>Submit</button>
			</center>
		</div>
	</form>";
		
}else{
	echo "<p>
	Your cart is empty!
	</p>";
}

?>
</div>
</div>
<?php

pageFooter();

?>
</body>
</html>