<?php
    function errorMessage($type) {
        $message;

        if ($type == 1) {
            $message = "All fields required!";
        } elseif ($type == 2) {
            $message = "Server Error! Please try again later.";
        }

        header("Location: about.php?message=$message&type=$type");
        die();
    }
    
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $comments = $_POST['comments'];

    echo $firstName."<br>".$lastName."<br>".$email."<br>".$subject."<br>".$comments;
?>