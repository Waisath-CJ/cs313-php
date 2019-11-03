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
                        <a class="nav-item nav-link active" href="consult.php">Schedule a Consultation</a>
                        <a class="nav-item nav-link" href="myConsults.php">My Consultations</a>
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
            <h1 class="display-3 text-center">Get your own Baked Delights!</h1>
            <p class="text-muted text-center">Schedule your consultation today so you can get your own delicions Baked Delights!</p>
            <img src="pics/bakedGoods.jpg" class="rounded mx-auto d-block" alt="Assorted Baked Goods"><br>
            <?php 
                try {
                    $query = 'SELECT firstName, lastName FROM Customers WHERE id = :id';
                    $stmt = $db->prepare($query);
                    $stmt->bindValue(':id', $_SESSION['userId'], PDO::PARAM_INT);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo $_SESSION['userId']."<br>";
                    echo $row['firstName']." - First Name<br>";
                    echo $row['lastName']." - Last Name<br>";
                    echo "<b>Requesting a consultation for: ".$row['firstName']." ".$row['lastName']."</b>";
                }
                catch (Exception $ex) {
                    echo $ex;
                }
            ?>
            <form action="insertConsult.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="consultType">Consultation Type</label>
                        <select name="consultType" class="custom-select">
                            <option selected disabled hidden>Choose a consult type...</option>
                            <option value="1">Cookies</option>
                            <option value="2">Brownies</option>
                            <option value="3">Cupcakes</option>
                            <option value="4">Cakes</option>
                            <option value="5">Pies</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" name="date">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="time">Time</label>
                        <select name="time" class="custom-select">
                            <option selected disabled hidden>Choose a time...</option>
                            <option value="10:00 AM">10:00 AM</option>
                            <option value="10:45 AM">10:45 AM</option>
                            <option value="11:30 AM">11:30 AM</option>
                            <option value="12:15 PM">12:15 PM</option>
                            <option value="1:00 PM">1:00 PM</option>
                            <option value="1:45 PM">1:45 PM</option>
                            <option value="2:30 PM">2:30 PM</option>
                            <option value="3:15 PM">3:15 PM</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-dark btn-block">Submit</button>
            </form>
        </div>
    </body>
</html>