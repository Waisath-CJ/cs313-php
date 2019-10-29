<?php
    require("dbConnect.php");
    $db = get_db();
    
    $username = $_POST['username'];
    echo $username;
    $pwd = $_POST['pwd'];
    echo $pwd;
    $cpwd = $_POST['cpwd'];
    echo $cpwd;

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

        $hash = password_hash($pwd);
        echo $hash;

        /* try 
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
        } */
    }

?>