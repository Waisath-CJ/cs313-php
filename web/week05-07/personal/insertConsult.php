<?php
    session_start();
    
    require("dbConnect.php");
    $db = get_db();
    
    $consultType = (int) $_POST['consultType'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    try
    {
        $query = 'INSERT INTO Consultations(customer_id, consult_type, date, time) VALUES(:customer_id, :consultType, :date, :time)';
        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $_SESSION['userId'], PDO::PARAM_INT);
        $statement->bindValue(':consultType', $consultType, PDO::PARAM_INT);
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