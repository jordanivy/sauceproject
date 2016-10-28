<style>
body {
	background-image: url("images/pagebg.jpg");
	background-repeat: repeat;
	font:10pt tahoma; 
	margin:0;
	padding:0;
}
</style>
<?php
session_start();
require_once 'headerFooter.php';
require_once 'dbOperations.php';
pageHeader("Hello!");
logIn();
$col=4;

$connection=connectDB("sauce");
if($connection->connect_error) die("Unable to connect to database".$connection->connect_error);

$email=$_POST['email'];
$password=$_POST['pwd'];
if(!isset($_SESSION['email']))
{
	$_SESSION['email'] = $email;
}

$query="SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
$result=$connection->query($query);
if(!$result) die(" Query failed!".$connection->connect_error);



if($result)
{
	if(!isset($_SESSION['userLogin']))
	{
		$_SESSION['userLogin']="yes";
	}
	echo "<body>
		  <div id='contain'>
		  <div id='content'>
		  <h3>Welcome back, <font color='red'>$email</font>!</h3>
		  </div>
		  </div>
		  </body>";
}
?>