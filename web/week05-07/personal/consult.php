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
            <h1 class="display-3 text-center">Get your own Baked Delights!</h3>
            <p class="text-muted text-center">Schedule your consultation today so you can get your own delicions Baked Delights!</p>
            <form action="insertConsult.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" name="firstName" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number">
                    </div>
                </div>
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
                <div class="form-row">
                    <div class="input-group">
                        <label>Additional Comments:</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-dark">Submit</button>
            </form>
        </div>
    </body>
</html>