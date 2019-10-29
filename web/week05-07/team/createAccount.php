<?php
    require("dbConnect.php");
    $db = get_db();
    
    echo "Hello";

    $username = $_POST['username'];
    echo $username;
    $pwd = $_POST['pwd'];
    echo $pwd;
    $cpwd = $_POST['cpwd'];
    echo $cpwd;
?>