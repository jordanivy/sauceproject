<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
<title>Log In</title>
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
session_start();
require_once 'headerFooter.php';
pageHeader("Login");
logIn();

if(!isset($_SESSION['loggedIn']))
{
	echo "
		<body>
		<div id='contain'>
		<div id='content'>
		<h4>Log In</h4>
		<form action = 'login.php' method = 'post' class='bootstrap-frm'>
		<fieldset>
			<legend>Log in:</legend>
			Email:<br>
			<input type = 'text' name = 'email' value = ''><br>
			Password: <br>
			<input type = 'text' name = 'pwd' value = ''><br><br>
			<div class='buttons'>
			<button class='btn red'>Log In</button>
			</form>
			<form action = 'signup.php' method = 'post'>
			<button class='btn red'>New User?</button>
			</div>
			</form>
		</fieldset>
		</div>
		</div>
		</body>";
}

else
	echo "<p style='color:red;'>You must log out first to use this feature.</p>";

pageFooter();
?>