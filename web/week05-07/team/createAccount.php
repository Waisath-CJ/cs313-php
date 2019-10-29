<?php
	require("dbConnect.php");
	$db = get_db();
​
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    echo $username . "<br>";
    echo $pwd . "<br>";
    echo $cpwd . "<br>";

/*
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
    
    echo $username . " - " . $password . " - " . $confirmPassword . "<br>";
​
	if ($password != "" && $confirmPassword != "" && $username != "")
	{   
        echo "Made it into the first conditional<br>";
		if ($password != $confirmPassword)
		{   
			sendErrorMessage();
        }
        
        echo "Made it past the second conditional<br>";
​
		$hash = password_hash($password);
​       
        echo "Hashed password<br>";

        $sql = 'INSERT INTO People (username, password) VALUES(:username, :password)';
        echo "Created query<br>";
        $stmt = $db->prepare($sql);
        echo "DB Prepared Successfully<br>";
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        echo "Bound username<br>";
        $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
        echo "Bound password<br>";
        $stmt->execute();
        echo "Executed query<br>"
​
		//header("Location: sign-in.php");
		//die();
	}
	else 
	{
		sendErrorMessage();
	}
*/
?>