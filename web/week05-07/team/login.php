<?php
	session_start();
​
    require("dbConnect.php");
	$db = get_db();
​
	function sendErrorMessage() {
		$message = "Invalid username or password.";
​
		//Error "Invalid username or password."
		header("Location: sign-in.php?message=$message");
		die();
	}
​
	$username = htmlspecialchars($_POST['username']);
	$password = $_POST['pwd'];
​
	if (isset($password) && $password != "" && isset($username) && $username != "")
	{
		$sql = 'SELECT id, username, password FROM People WHERE username = :username';
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
​
		$row = $apartmentStmt->fetch(PDO::FETCH_ASSOC);
​
		if (isset($row) && password_verify($password, $row['password']))
		{
			$_SESSION['userId'] = $row['id'];
​
			header("Location: welcome.php");
			die();
		}
		else 
		{
			sendErrorMessage();
		}
	}
	else 
	{
		sendErrorMessage();
	}
?>