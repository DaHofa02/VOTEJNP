<?php

require 'functions.php';

if(isset($_POST['btregister']))
{
   register($_POST["uBN"],$_POST["uPW1"],$_POST["uPW2"],);
} 
?>
 
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>
    <div class="register">
        <h2>Registration</h2>
        Bitte füllen Sie alles aus um sich zu registrieren.
		<br/>
		<br/>
        <form method="post">
			Benutzername: 
			<br/>
			<input type="text" name="uBN"/>
			<span class="invalid-feedback"><?php echo $username_err; ?></span>
			<br/>
			Passwort: 
			<br/>
			<input type="password" name="uPW1"/>
			<span class="invalid-feedback"><?php echo $password_err; ?></span>
			<br/>
			Bestätige Passwort: 
			<br/>
			<input type="password" name="uPW2"/>
			<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
			<br/>
			<br/>
			<input type="submit" value="Registrieren" name="btregister"/>
			<br/>
			<br/>
            Sie haben schon einen Account? <a href="index.php">Hier einloggen.</a>
        </form>
    </div>    
</body>
</html>