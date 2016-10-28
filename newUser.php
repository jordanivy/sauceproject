<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<title>New User</title>
</head>
<style>
body {
	background-image: url("images/pagebg.jpg");
	background-repeat: repeat;
	font:10pt verdana; 
	margin:0;
	padding:0;
}
</style>
<body>
<div id='contain'>
<div id='content'>
<?php
session_start();
require_once 'headerFooter.php';
require_once 'dbOperations.php';
pageHeader("Welcome!");
logIn();

$connection=connectDB("sauce");
if($connection->connect_error) die("Unable to connect to database".$connection->connect_error);

if(!isset($_SESSION['loggedIn']))
{
	$firstName=$_POST['firstname'];
	$lastName=$_POST['lastname'];
	$email=$_POST['username'];
	$password=$_POST['pwd1'];

	$query="INSERT INTO `customers`(`firstname`, `lastname`, `email`, `password`) VALUES ('$firstName','$lastName','$email','$password')";
	$result=$connection->query($query);
	if(!$result) die(" Query failed!".$connection->connect_error);
	echo "<h3>Thank you for signing up!</h3>";


	if($result)
	{
		session_destroy();
	}
}

else
 echo "<p style='color:red;'>You are already logged in. To use this feature, please sign out.</p>";

?>
</div>
</div>
<?php
pageFooter();
?>
</body>