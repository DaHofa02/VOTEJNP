<?php

session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: choose.php");
    exit;
}

require 'functions.php';

if(isset($_POST['btlogin']))
{
   login($_POST["uBN"],$_POST["uPW"]);
} 
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Einloggen</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	</head>
	
	<body>
		<div class="login">
			<h2>Einloggen</h2>
			<form method="post">
				Benutzername: 
				<br/>
				<input type="text" name="uBN"/>
				<br/>
				Passwort: 
				<br/>
				<input type="password" name="uPW"/>
				<br/>
				<br/>
				<input type="submit" value="Login" name="btlogin"/>
				<br/>
				<br/>
				Sie haben keinen Account? <a href="register.php">Registrieren sie sich jetzt.</a>
			</form>
		</div>
	</body>
</html>