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
        }

        header("Location: login.php?message=$message&type=$type");
        die();
    }

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    echo $username."<br>".$pwd;
?>