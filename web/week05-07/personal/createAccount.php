<?php
    require("dbConnect.php");
    $db = get_db();

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    echo $firstName."<br>".$lastName."<br>".$email."<br>".$username."<br>".$pwd."<br>".$cpwd;
?>