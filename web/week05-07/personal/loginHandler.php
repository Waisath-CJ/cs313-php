<?php
    session_start();
    require('dbConnect.php');
    $db = get_db();

    function errorMessage($type) {
        $message;

        if ($type == 1) {
            $message = "Incorrect username or password!";
        } elseif ($type == 2) {
            $message = "Database error! Please try again later.";
        } elseif ($type == 3) {
            $message = "All fields required!";
        }

        header("Location: login.php?message=$message&type=$type");
        die();
    }

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    //echo $username."<br>".$pwd;

    if (!empty($username) && !empty($pwd)) {
        try {
            $query = 'SELECT id, username, password FROM Customers WHERE username = :username';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($row && password_verify($pwd, $row['password'])) {
                $_SESSION['userId'] = $userId;
                header("Location: index.php");
                die();
            } else {
                errorMessage(1);
            }
        }
        catch (Exception $ex) {
            errorMessage(2);
        }
    } else {
        errorMessage(3);
    }
?>