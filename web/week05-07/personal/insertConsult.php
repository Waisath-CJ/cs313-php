<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $consultType = $_POST['consultType'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    require("dbConnect.php");
    $db = get_db();

    try
    {
        $query = 'INSERT INTO Consultations(firstName, lastName, email, phoneNumber, consult_type, date, time) VALUES(:firstName, :lastName, :email, :phoneNumber, :consultType, :date, :time)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $statement->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':phoneNumber', $phoneNumber, PDO::PARAM_BIGINT);
        $statement->bindValue(':consult_type', $consultType, PDO::PARAM_INT);
        $statement->bindValue(':date', $date, PDO::PARAM_STR);
        $statement->bindValue(':time', $time, PDO::PARAM_STR);
        $statement->execute();
    }
    catch (Exception $ex)
    {
        echo "Error with DB. Details: $ex";
        die();
    }

    header("Location: confirmation.php");
    die();
?>