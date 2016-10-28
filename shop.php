<?php
session_start(); //start session
include("config.inc.php"); //include config file
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Shop</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
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
		$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
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
<style>
body {
	background-image: url("images/pagebg.jpg");
	background-repeat: repeat;
	font:10pt tahoma; 
	margin:0;
	padding:0;
}

.products-wrp {
	padding: 0;
}

.cart-box, .shopping-cart-box, .shopping-cart-results {
	font-family: "Verdana, Geneva, sans-serif";
	font-size: 20px;
}

.cart-box {
	padding-right: 12px;
}

.shopping-cart-box {
	padding-right: 7px;
}

.item-box {
	font-family: "Verdana, Geneva, sans-serif";
	font-size: 18px;
}

a {
	text-decoration: none;
}
</style>
<body>
<?php
require_once "headerFooter.php";
pageHeader("Shop");
?>
<div id="contain">
<div id="content">
<h4>Shop</h4>
<!--Begin cart-->
	<div class="cart">
	<img src="images/sc.png" alt="Shopping Cart" height="30px" width="30px">
	<br>
		<a href="#" class="cart-box" id="cart-info" title="View Cart">
			<?php 
				if(isset($_SESSION["products"])){
					echo count($_SESSION["products"]); 
				}else{
					echo 0; 
				}
			?>
		</a>
	<div class="shopping-cart-box">
		<a href="#" class="close-shopping-cart-box">Close Cart</a>
		<br>
    <div id="shopping-cart-results">
    </div>
	</div>
	</div>
<!--End cart-->
<?php
//List products from database
$results = $mysqli_conn->query("SELECT product_name, product_desc, product_code, product_image, product_price FROM products_list");
//Display fetched records as you please

$products_list =  '<ul class="products-wrp">';

while($row = $results->fetch_assoc()) {
$products_list .= 
<<<EOT
<form class="form-item">
<h2>{$row["product_name"]}</h2>
<center>
<div>
	<img src="images/{$row["product_image"]}" id="round" height="300px" width="400px"></div>
	<div class="item-box">
	<div>Price: <b>{$currency}{$row["product_price"]}.00</b><div>
	<div>
    Qty:
    <select name="product_qty">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
	</div>
	
	<div>
    Size:
    <select name="product_size">
	<option value="18oz">18oz</option>

    </select>
	</div>
    <input name="product_code" type="hidden" value="{$row["product_code"]}">
	<div id="buttons">
		<button type="submit" class="btn red">Add to Cart</button>
	</div>
</div>
<br>
</center>
</form>
EOT;
}
$products_list .= '</ul></div>';

echo $products_list;
pageFooter();
?>
</div>
</div>
</body>
</html>