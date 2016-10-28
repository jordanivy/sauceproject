<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css">
</head>
</html>
<?php
session_start();
require_once 'headerFooter.php';
require_once 'dbOperations.php';
pageHeader("Place Orders");
logIn();

$connection=connectDB("pizzastorehome");
if($connection->connect_error) die("Unable to connect to database".$connection->connect_error);

$firstName=$_POST['firstname'];
$lastName=$_POST['lastname'];
$email=$_POST['email'];
$address=$_POST['address'];
$cardNum=$_POST['cardnumber'];
$itemID=key($_SESSION['cart']);
$pizzaID=$_SESSION['cart'][$itemID]['pizzaID'];
$size=$_SESSION['cart'][$itemID]['size'];
$price=$_SESSION['cart'][$itemID]['price'];
$quantity=$_SESSION['cart'][$itemID]['quantity'];
$customerID=rand(6,99);
date_default_timezone_set('America/New_York');
$dateTime= date('m-d-Y');

echo "<h3>Your Orders:</h3>";

foreach($_SESSION['cart'] as $key => $item)
{
	$size = $item["size"];
	$quantity = $item["quantity"];
	$pizzaID=$_SESSION['cart'][$key]['pizzaID'];
	$size=$_SESSION['cart'][$key]['size'];
	$price=$_SESSION['cart'][$key]['price'];
	$quantity=$_SESSION['cart'][$key]['quantity'];


	echo "Pizza ID: ".$pizzaID."<br>Size: ".$size."<br>Quantity: ".$quantity."<br>Price: ".$price;

	$query = "INSERT INTO orders(`customerID`, `pizzaID`, `quantity`, `size`,`dateTime`)
		VALUES ('$customerID','$pizzaID', '$quantity','$size', '$dateTime')";
	
	echo "<br><br>";
	
	$result = $connection->query($query);

	if(!$result) die ("Query failed".$connection->connect_error);
}

if($result)
{
	session_destroy();
}

?>