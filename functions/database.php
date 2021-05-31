<?php

    $servername = "80.109.151.142";
    $username = "votinguser";
    $password = "Vote*123";
    $dbname = "voting";
	
	$username_err = $password_err = $confirm_password_err = "";
	
	try 
	{
		$pdo = new PDO("mysql:host=".$servername.";dbname=".$dbname.";charset=utf8", $username, $password);
	} 
	catch (PDOException $e) 
	{
		print "<br/>Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	
	function login($username_db,$password_db)
	{
		global $pdo;
		
		$sql = "SELECT * FROM users WHERE User = '$username_db' AND Password = '$password_db';";
		
		$mem_var = $pdo -> query($sql);
		
		$return_var = $mem_var -> fetch(PDO::FETCH_ASSOC);
		
		$id = $return_var["ID"];
        $username_cache = $return_var["User"];
        $password_chache = $return_var["Password"];
        if($password_db === $password_chache)
		{
            session_start();
                            
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username_cache;                            
                            
            header("location: choose.php");
        } 
		else
		{
			$login_err = "Falscher Benutzer oder Passwort.";
        }
	}
	
	function register($username_db,$password_db,$password_db_correction)
	{
		global $pdo;
		if($password_db === $password_db_correction)
		{
			$sql = "SELECT * FROM users ORDER BY ID DESC LIMIT 0,1;";
			$mem_var = $pdo -> query($sql);
			$return_var = $mem_var -> fetch(PDO::FETCH_ASSOC);
			$id = $return_var["ID"];
			$username_cache = $return_var["User"];
			$password_chache = $return_var["Password"];
			$id++;
			
			if($username_cache === $username_db)
			{
                $username_err = "This username is already taken.";
            } 
			else
			{
                $sqldata = array();
				$sqldata['ID'] = $id;
				$sqldata['User'] = $username_db;
				$sqldata['Password'] = $password_db;
				var_dump($sqldata);
				$statement = $pdo->prepare("INSERT INTO users (ID, User, Password) VALUES (:ID, :User, :Password)");
				var_dump($statement);
				$statement->execute($sqldata);
				
				session_start();
                            
				$_SESSION["loggedin"] = true;
				$_SESSION["id"] = $id;
				$_SESSION["username"] = $username_db;  
				
				header("location: choose.php");
            }
		}
	}
	
	function logout()
	{
		session_start();
 
		$_SESSION = array();
 
		session_destroy();
 
		header("location: index.php");
	}
	
	function add_image_to_db($uuid,$name_custom)
	{
		global $pdo;
		$sqldata = array();
		$sqldata['UUID'] = $uuid;
		$sqldata['Name'] = $name_custom;
		$sqldata['votes_up'] = 0;
		$sqldata['votes_down'] = 0;
		$sqldata['views'] = 0;
		var_dump($sqldata);
		$statement = $pdo->prepare("INSERT INTO pictures (UUID, Name, votes_up, votes_down, views) VALUES (:UUID, :Name, :votes_up, :votes_down ,:views)");
		var_dump($statement);
		$statement->execute($sqldata);
}
?>