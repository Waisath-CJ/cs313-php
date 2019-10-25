<?php
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
            <?php require('header.php'); ?>
            <h1 class="display-3 text-center">Our Baked Delights</h1>
            <p class="text-muted text-center">Check out our amazing selection of baked delights!</p>

            <?php
                echo '<div class="card-deck">';
                $statement = $db->prepare('SELECT * FROM BakedGoods');
                $statement->execute();
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    $bakedGood_id = $row['id'];
                    $bakedGood_name = $row['name'];
                    if ($bakedGood_name == 'Cookies') {
                        echo '<img src="pics/cookie.jpg" class="card-img-top" alt="Cookies">';
                    } elseif ($bakedGood_name == 'Brownies') {
                        echo '<img src="pics/brownies.jpg" class="card-img-top" alt="Brownies">';
                    } elseif ($bakedGood_name == 'Cupcakes') {
                        echo '<img src="pics/cupcakes.jpg" class="card-img-top" alt="Cupcakes">';
                    } elseif ($bakedGood_name == 'Cakes') {
                        echo '<img src="pics/cake.jpg" class="card-img-top" alt="Cake">';
                    } elseif ($bakedGood_name == 'Pies') {
                        echo '<img src="pics/pie.jpg" class="card-img-top" alt="Pie">';
                    }
                    echo '<div class="card" style="width: 18rem;">';
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
            <p class="h3">Looking to buy some?</p>
            <button type="button" class="btn btn-outline-dark btn-block">Schedule a Consultation</button>
        </div>
    </body>
</html>