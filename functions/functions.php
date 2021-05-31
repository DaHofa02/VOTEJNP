<?php

	require 'database.php';

	function upload()
	{
		header("location: upload.php");
	}
	
	function vote()
	{
		header("location: vote.php");
	}
	
	function upload_file()
	{
	$uuid = random_bytes(64);
	$uuid = (string)bin2hex($uuid);

	$target_dir = "uploads/";
	
	$max_size = 10*1024*1024; //10MB
	if($_FILES["image"]["size"] > $max_size)
		$_FILES["image"]["error"]=2;
	
	$file_extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
	$extensions = array('png', 'jpg', 'jpeg', 'gif');
	
	if(!in_array($file_extension, $extensions))
	{
		echo "Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt";
	}
	
	if($_POST["tbcustomname"] == "") 
	{
		$customname = explode(".", $_FILES["image"]["name"]);
		$extension = array_pop($customname);
		$name_custom = implode($customname);
	}
	else 
	{
		$customname = explode(".", $_FILES["image"]["name"]);
		$extension = array_pop($customname);
		$name_custom = $_POST["tbcustomname"];
	}
	
	if(!$_FILES["image"]["error"])
	{
		$uuid = "$uuid"."."."$extension";
		move_uploaded_file($_FILES["image"]["tmp_name"], "$target_dir/$uuid");
		add_image_to_db($uuid,$name_custom);
		header("Location: choose.php");
	}
	else 
	{
		$phpFileUploadErrors = array(
			0 => 'There is no error, the file uploaded with success',
			1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
			2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form (max Upload 10MB)',
			3 => 'The uploaded file was only partially uploaded',
			4 => 'No file was uploaded',
			6 => 'Missing a temporary folder',
			7 => 'Failed to write file to disk.',
			8 => 'A PHP extension stopped the file upload.',
		);
		echo "ERROR:".$phpFileUploadErrors[$_FILES["image"]["error"]];
	}
	
}
?>