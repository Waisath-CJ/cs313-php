<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $consultType = $_POST['consultType'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $comments = $_POST['comments'];

    echo $firstName.' '.$lastName.' - '.$email.' - '.$phoneNumber.' - '.$consultType.' - '.$date.' '.$time.' - '.$comments;
?>