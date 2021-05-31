<?php
require 'functions.php';

if(isset($_POST['btupload']))
{
   upload();
} 
if(isset($_POST['btvote']))
{
   vote();
} 
if(isset($_POST['btlogout']))
{
   logout();
} 
?>

<html>
	<head>
		<title>Wähle</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	</head>
	
	<body>
		<div class="Upload">
			<form method="post">
				<input type="submit" value="Upload" name="btupload"/>
			</form>
		</div>
		<div class="Vote">
			<form method="post">
				<input type="submit" value="Vote" name="btvote"/>
			</form>
		</div>
		<div class="LogOut">
			<form method="post">
				<input type="submit" value="LogOut" name="btlogout"/>
			</form>
		</div>
	</body>
</html>