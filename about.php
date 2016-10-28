<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<title>About</title>
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
<?php
session_start();
require_once "headerFooter.php";
pageHeader("About");
logIn();

echo "
<body>
<div id='contain'>
<div id='content'>
<h4>About</h4>
<p>
<img src='images/dad.png' id='round' alt='Tracy Mixon' height='320px' width='240px' align='right'>
<h5>Semester Project-Web Programming</h5>
<ol>
At minimum, you must create a real-world website that supports satisfy the following requirements: <br><br>
<li>
Your site must require that a user log in with a username and password first in order to do anything.
</li>
<li>
Your site must allow a user to register for an account. A user’s username must be a syntactically valid email address. A user’s password must be at least six characters, and it cannot be entirely alphabetic or entirely numeric.
</li>
<li>
Your site must allow a user to see/view/alter/delete the items stored in MySQL (Do not hard-code your data in the scripts. For example, the items shown on your menu must be retrieved from the database).
</li>
<li>
Your site must implement JavaScript functions to maintain the menu layout and the shopping cart/bag.
</li>
<li>
Your site must perform client-side validation of user input.
</li>
<li>
Your site must be attractive, and responsive by using CSS and JavaScript.
</li>
</ol>
</p>
</div>";

pageFooter();

echo "
</div>
</body>";
?>
</html>