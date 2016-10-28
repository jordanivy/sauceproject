<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css">
</head>
</html>
<?php
session_start();
require_once 'headerFooter.php';
pageHeader("Log Out");

if(isset($_SESSION['username']))
{
	session_destroy();
	echo "You have been logged out.";
}

?>