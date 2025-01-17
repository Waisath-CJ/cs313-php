<!DOCTYPE html>    ​
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title>Sign-In</title>
    </head>
    <body>
        <div class="container">
            <h1>Sign-In</h1>
            <?php 
                $message = $_GET['message'];
                if (isset($message)){
                    echo "<div>$message</div>";
                }
            ?>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <br><br>
            <div>Don't have an account? <a href="sign_up.php">Sign Up</a></div>
        </div>
    </body>
</html>