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
                        <a class="nav-item nav-link active" href="delights.php">Baked Delights</a>
                        <a class="nav-item nav-link" href="consult.php">Schedule a Consultation</a>
                        <a class="nav-item nav-link" href="about.php">About</a>
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
                </div>
            </nav>
            <h1 class="display-3 text-center">Our Baked Delights</h1>
            <p class="text-muted text-center">Check out our amazing selection of baked delights!</p>

            <?php
                echo '<div class="card-deck">';
                $statement = $db->prepare('SELECT * FROM BakedGoods');
                $statement->execute();
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $bakedGood_id = $row['id'];
                    $bakedGood_name = $row['name'];
                    
                    echo '<div class="card" style="width: 18rem;">';
                    if ($bakedGood_name == 'Cookies') {
                        echo '<img src="pics/cookies.jpg" class="card-img-top img-thumbnail" alt="Cookies">';
                    } elseif ($bakedGood_name == 'Brownies') {
                        echo '<img src="pics/brownies.jpg" class="card-img-top img-thumbnail" alt="Brownies">';
                    } elseif ($bakedGood_name == 'Cupcakes') {
                        echo '<img src="pics/cupcakes.jpg" class="card-img-top img-thumbnail" alt="Cupcakes">';
                    } elseif ($bakedGood_name == 'Cakes') {
                        echo '<img src="pics/cake.jpg" class="card-img-top img-thumbnail" alt="Cake">';
                    } elseif ($bakedGood_name == 'Pies') {
                        echo '<img src="pics/pie.jpg" class="card-img-top img-thumbnail" alt="Pie">';
                    }
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.$bakedGood_name.'</h5>';
                    echo '<p class="card-text">';

                    $statement2 = $db->prepare('SELECT * FROM Flavors WHERE bakedGood_id = :bgid');
                    $statement2->bindValue(':bgid', $bakedGood_id);
                    $statement2->execute();
                    while ($row2 = $statement2->fetch(PDO::FETCH_ASSOC)) {
                        $flavor = $row2['flavor'];
                        echo $flavor . '<br>';
                    }
                    echo '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            ?>
            <br>
            <p class="h4 text-center">Looking to buy some?</p>
            <button type="button" class="btn btn-outline-dark btn-block" onclick="window.location.href='consult.php'">Schedule a Consultation</button>
        </div>
    </body>
</html>