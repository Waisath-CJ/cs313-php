<?php
    session_start();

    require('dbConnect.php');
    $db = get_db();

    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    if (isset($password) && $password != "")
?>