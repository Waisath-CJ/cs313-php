<?php
    require("dbConnect.php");
    $db = get_db();
    
    $username = $_POST['username'];
    echo $username;
    $pwd = $_POST['pwd'];
    echo $pwd;
    $cpwd = $_POST['cpwd'];
    echo $cpwd;

    if ($username == "" || $pwd == "" $cpwd == "") {
        $message = "Invalid inputs";
        header("Location: sign_up.php?message=$message");
        die();
    }

    if ($pwd != $cpwd) {
        $message = "Passwords do not match!";
        header("Location: sign_up.php?message=$message");
        die();
    }


?>