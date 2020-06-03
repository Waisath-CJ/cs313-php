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

    //echo $firstName."<br>".$lastName."<br>".$email."<br>".$subject."<br>".$comments;
    
    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($subject) && !empty($comments)) {
        $fullSubject = $firstName.' '.$lastName.' - '.$subject;
        $msg = wordwrap($comments, 100);
        mail($email, $fullSubject, $msg);
        header("Location: about.php");
        die();
    } else {
        errorMessage(1);
    }
?>