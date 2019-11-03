<?php
    session_start();

	require("dbConnect.php");
	$db = get_db();
?>
<!doctype html>
<html>
    <head>
        <title>Whit's Baked Delights</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF98E3;">
                <a class="navbar-brand" href="index.php">Whit's Baked Delights</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">Home</a>
                        <a class="nav-item nav-link" href="delights.php">Baked Delights</a>
                        <a class="nav-item nav-link" href="consult.php">Schedule a Consultation</a>
                        <a class="nav-item nav-link active" href="myConsults.php">My Consultations</a>
                        <a class="nav-item nav-link" href="about.php">About</a>
                    </div>
                    <span class="navbar-text">
                        <?php 
                            if (isset($_SESSION['userId'])) {
                                echo '<a class="nav-item nav-link" href="logout.php">Logout</a>';
                            } else {
                                echo '<a class="nav-item nav-link" href="login.php">Login</a>';
                            }
                        ?>
                    </span>
                </div>
            </nav>

            <h1 class="display-3 text-center">My Consultations</h1>
            <p class="text-muted text-center">Here are your scheduled consultations:</p><br>
            <?php
                echo '<table class="table table-striped">';
                echo '<thead><tr><th scope="col">Consult Type</th><th scope="col">Date</th><th scope="col">Time</th></tr></thead>';
                echo '<tbody>';
                
                $query = 'SELECT * FROM Consultations WHERE customer_id = :customer_id';
                $stmt = $db->prepare($query);
                $stmt->bindValue(':customer_id', $_SESSION['userId'], PDO::PARAM_INT);
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    
                    if ($row['consult_type'] == 1) {
                        echo '<td>Cookies</td>';
                    } elseif ($row['consult_type'] == 2) {
                        echo '<td>Brownies</td>';
                    } elseif ($row['consult_type'] == 3) {
                        echo '<td>Cupcakes</td>';
                    } elseif ($row['consult_type'] == 4) {
                        echo '<td>Cakes</td>';
                    } elseif ($row['consult_type'] == 5) {
                        echo '<td>Pies</td>';
                    }

                    echo '<td>'.$row['date'].'</td>';
                    echo '<td>'.$row['time'].'</td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            ?>
        </div>
    </body>
</html>