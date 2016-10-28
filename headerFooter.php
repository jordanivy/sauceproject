<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
</html>
<?php
function logIn()
{
	if(isset($_SESSION['adminLogin']) || isset($_SESSION['userLogin']))
	{
		if(isset($_SESSION['username']))
		{	$_SESSION['loggedIn']="yes";
			echo "<div id='login'><p align='right'>You are logged in as: <b>".$_SESSION['username']." </b>";
			echo " (<a href='logout.php'>Log Out</a>)</p><hr /></div>";
		}
	}
}


function pageHeader($pt)
{
	echo "
	<div id='topbanner'>
	<div id='contain'>
	<div id='title'>
	<img src='images/logo.png' height='100px' width='700px' alt='logo'>
	</div>
	<div id='menu'>
	<ul id='nav'>
		<li>
		<a href='jordanivy.com'>Home</a>
		</li>
		<li>
		<a href='about.php'>About</a>
		</li>
		<li>
		<a href='shop.php'>Shop</a>
		</li>
		<li>
		<a href='formLogin.php'>Log In</a>
		</li>
		<li>
		<a href='signup.php'>Sign Up</a>
		</li>
		<li>
		<a href='view_cart.php'>Cart</a>
		</li>
	</ul>
	</div>
	</div>
	</div>";	
}

function pageFooter(){
	echo "<div id='footer'>
	<center>
	You can find us online at:  
	<img src='images/fb.png' height='15px' width='15px' alt='Facebook'> 
	<img src='images/twitter.png' height='15px' width='15px' alt='Twitter'> 
	<img src='images/instag.png' height='15px' width='15px' alt='Instagram'>
	<br>
	Jack Mixon's Old South © 2016
	</center>
	</div>";
}

function generateTable($arr, $colNames)
{
	echo "<center><table>";
	echo "<tr>";
	
	foreach($colNames as $col)
	{
		echo"<th>$col</th>";
	}
	echo "</tr>";
	
	//print_r($arr);
	
	/*for($row = 0; $row < $count($arr); $row ++)
	{
		echo "<tr>";
		$record = $arr[$row];
		foreach($record as $col)
			echo"<td>$col</td>";
		echo "</tr>";
		
	}*/
	foreach($arr as $record)
	{
		echo"<tr>";
		foreach($record as $col)
			echo "<td>$col</td>";
			echo"</tr>";
	}
	echo"</table></center>";
}

?>