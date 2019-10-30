<?php
    require("dbConnect.php");
    $db = get_db();
    
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    if (empty($username) || empty($pwd) || empty($cpwd)) {
        $message = "Please fill missing fields!";
        header("Location: sign_up.php?message=$message");
        die();
    }
    else {
        if ($pwd != $cpwd) {
            $message = "Passwords do not match!";
            header("Location: sign_up.php?message=$message");
            die();
        }

        try
        {
            $query = 'SELECT username FROM People';
            $stmt = $db->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($username == $row) {
                    $message = "Username already taken. Please choose another!";
                    header("Location: sign_up.php?message=$message");
                    die();
                }
            }
        }
        catch (Exception $ex)
        {
            echo "Error with DB. Details: $ex";
            die();
        }

        $hash = password_hash($pwd, 1);

        try 
        {
            $query = 'INSERT INTO People (username, password) VALUES (:username, :password)';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch (Exception $ex)
        {
            echo "Error with DB. Details: $ex";
            die();
        }
    }

?>