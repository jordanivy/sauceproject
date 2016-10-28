<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css">
</head>
</html>
<?php
session_start();
require_once 'headerFooter.php';
pageHeader("Cart");
logIn();

if(isset($_SESSION['cart']))
{
	session_destroy();
	echo "Your cart has been emptied.";
}

?>