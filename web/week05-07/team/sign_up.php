<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Sign-Up</title>
  </head>
  <body>
	<div class="container">
        <h1>Sign-Up</h1>
        <?php 
            if (isset($message)){
                echo "<div>$message</div>";
            }
        ?>
        <form action="createAccount.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
            </div>
            <div class="form-group">
                <label for="cpwd">Confirm Password:</label>
                <input type="password" class="form-control" id="cpwd" name="cpwd">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
  </body>
</html>