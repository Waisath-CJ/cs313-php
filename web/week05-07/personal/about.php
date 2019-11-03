<?php
    session_start();
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
                        <?php
                            if (isset($_SESSION['userId'])) {
                                echo '<a class="nav-item nav-link" href="consult.php">Schedule a Consultation</a>';
                                echo '<a class="nav-item nav-link" href="myConsults.php">My Consultations</a>';
                            }
                        ?>
                        <a class="nav-item nav-link active" href="about.php">About</a>
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

            <h1 class="display-3 text-center">About Me</h1>

            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                    <img src="pics/me.jpg" class="card-img" alt="Picture of myself">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text">My name is Whitney Larsen, I'm 24 years old, and I'm from Buena Vista, VA! 
                I went to culinary school right out of high school where I developed my skills in baking and eventually found a job at Sassy's Cafe & Bakery in Mesa, AZ where I strengthed those skills.
                I met my husband while I was working there and we moved out to Virginia once we were married. I continue to cook and bake and would love to provide quality Baked Delights for you! 
                Feel free to contact me if you have any questions!</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <form action="contact.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phoneNumber">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>
                </div>
                <div class="form-group">
                    <label for="comments">Comments:</label>
                    <textarea class="form-control" id="comments" name="comments"></textarea>
                </div>
                <button type="submit" class="btn btn-outline-dark btn-block">Submit</button>
            </form>
        </div>
    </body>
</html>