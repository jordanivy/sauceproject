<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<style>
body {
	background-image: url("http://knowledgeoverflow.com/wp-content/uploads/2013/03/graphic-14.jpg");
	background-repeat: repeat;
	font:10pt verdana; 
	margin:0;
	padding:0;
}
</style>
</html>
<?php
session_start();
require_once 'dbOperations.php';
require_once 'headerFooter.php';
pageHeader("Cart");
logIn();

echo "<body>
<div id='contain'>
<div id='content'>
<h4>Cart</h4>";

if(isset($_POST['name']))
{
	$name = $_POST["name"];
	$price = $_POST["price"];
	$itemID = null;

if(!isset($_SESSION['totalPrice']))
	$_SESSION['totalPrice'] = $price;
else 
	$_SESSION['totalPrice'] += $price;

if(!isset($_SESSION['cart'][$itemID]))
{
	$_SESSION['cart'][$itemID]["name"] = $name;
	$_SESSION['cart'][$itemID]["quantity"] = 1;
	$_SESSION['cart'][$itemID]["price"] = "$".$price.".00";
}
else 
{
	$_SESSION['cart'][$itemID]["quantity"]+=1;
}
echo "<br>";
}
if(isset($_SESSION['cart']))
{
	$colNames = array("name","quantity", "price");
	generateTable($_SESSION['cart'], $colNames);
	echo "<h3> Total Price: $".$_SESSION['totalPrice'].".00<h3>";
	echo "<form action='checkout.php' method='post'>
	<button>Check Out</button>
	</form>
	<br>
	<form action='clear.php' method='post'>
  	<button>Empty Cart</button></form>";
}

else
{
	echo "<p style='font-size:14px;'>
	The cart is empty!
	</p>";
}

echo "
</div>
</div>
</body>";
?>