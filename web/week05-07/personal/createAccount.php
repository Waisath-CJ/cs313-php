<?php
    require("dbConnect.php");
    $db = get_db();

    function errorMessage($type) {
        $message;

        if ($type == 0) {
            $message = "All fields are required!";
        } elseif ($type == 1) {
            $message = "Username is already taken!";
        } elseif ($type == 2) {
            $message = "Passwords do not match!";
        } elseif ($type == 3) {
            $message = "Password must be at least 8 characters long and contain at least one number!";
        }

        if (!empty($message)) {
            header("Location: signUp.php?message=$message&type=$type");
            die();
        }
    }

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    //echo $firstName."<br>".$lastName."<br>".$email."<br>".$username."<br>".$pwd."<br>".$cpwd;

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($username) && !empty($pwd) && !empty($cpwd)) {
        $query = 'SELECT id FROM Customers WHERE username = :username';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            errorMessage(1);
        }
        if (strlen($pwd) < 8 || !preg_match('/[0-9]/', $pwd)) {
            errorMessage(3);
        }
        if ($pwd != $cpwd) {
            errorMessage(2);
        }

        $hash = password_hash($pwd, PASSWORD_BCRYPT);

        $query = 'INSERT INTO Customers (firstName, lastName, email, username, password) VALUES (:firstName, :lastName, :email, :username, :password)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
        $stmt->execute();

        header("Location: login.php");
        die();
    } else {
        errorMessage(0);
    }
?>