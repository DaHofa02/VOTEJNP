<?php

require '../functions/functions.php';

if(isset($_POST['btupload']))
{
   upload_file();
} 
?>

<html>
	<head>
		<title>Upload</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	</head>
	
	<body>
		<h1>Upload</h1>
		<form	method="POST" enctype="multipart/form-data">
			<input type="text" name="tbcustomname" placeholder="Name des Bildes"/>
			<input type="file" name="image"/>
			</br></br>
			<input type="submit" name="btupload" value="Datei hochladen"/>
		</form>
	</body>
</html>