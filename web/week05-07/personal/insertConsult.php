<?php
    session_start();
    
    require("dbConnect.php");
    $db = get_db();

    function errorMessage($type) {
        $message;

        if ($type == 1) {
            $message = "All fields required!";
        } elseif ($type == 2) {
            $message = "Database error! Please try again later.";
        } elseif ($type == 3) {
            $message = "Date and Time are already taken!";
        }

        header("Location: consult.php?message=$message&type=$type");
        die();
    }
    
    $consultType = (int) $_POST['consultType'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    if (!empty($consultType) && !empty($date) && !empty($time)) {
        try {
            $query = 'SELECT * FROM Consultations';
            $stmt = $db->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($date == $row['date'] && $time == $row['time']) {
                    errorMessage(3);
                }
            }
        }   
        catch (Exception $ex) {

        }
        
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
    } else {
        errorMessage(1);
    }

?>