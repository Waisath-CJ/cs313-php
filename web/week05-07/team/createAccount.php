<?php
	require "dbConnect.php";
	$db = get_db();
​
	function sendErrorMessage() {
		$message = "Invalid input or passwords don't match.";
​
		//Error "Invalid username or password."
		header("Location: sign-up.php?message=$message");
		die();
	}
​
	$username = $_POST['username'];
	$password = $_POST['pwd'];
	$confirmPassword = $_POST['cpwd'];
​
	if (isset($password) && $password != "" && isset($confirmPassword) && $confirmPassword != "" && isset($username) && $username != "")
	{
		if ($password != $confirmPassword)
		{
			sendErrorMessage();
		}
​
		$hash = password_hash($password);
​
		$sql = 'INSERT INTO People (username, password) VALUES(:username, :password)';
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->bindValue(':password', $hash, PDO::PARAM_STR);
		$stmt->execute();
​
		header("Location: sign-in.php");
		die();
	}
	else 
	{
		sendErrorMessage();
	}
?>