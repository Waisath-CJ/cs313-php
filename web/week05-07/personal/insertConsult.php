<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $consultType = $_POST['consultType'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    require("dbConnect.php");
    $db = get_db();

    try
    {
        $query = 'INSERT INTO Consultations(firstName, lastName, email, consult_type, date, time) VALUES(:firstName, :lastName, :email, :consultType, :date, :time)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName, PDO::PARAM_STR);
        $statement->bindValue(':lastName', $lastName, PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':consult_type', $consultType);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':time', $time);
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