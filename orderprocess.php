<title>Success!</title>
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

echo "<body>
<div id='contain'>
<div id='content'>
<p>Thanks for your order!</p>
</div>
</div>
</body>";
session_destroy();
?>