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
        $userId;
        $dbPWD;
        try {
            $query = 'SELECT id, password FROM Customers WHERE username = :username';
            $stmt = $db->prepare($query);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                errorMessage(1);
            } else {
                $userId = $row['id'];
                $dbPWD = $row['password'];
            }
        }
        catch (Exception $ex) {
            errorMessage(2);
        }

        if (password_verify($pwd, $dbPWD)) {
            /* try {
                $query = 
            }
            catch (Exception $ex) {
                errorMessage(2);
            } */
            
            $_SESSION['userId'] = $userId;
            header("Location: index.php");
            die();
        } else {
            errorMessage(1);
        }
    } else {
        errorMessage(3);
    }
?>