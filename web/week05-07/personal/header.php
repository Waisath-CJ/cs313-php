<?php
    session_start();

    echo '<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF98E3;">
    <a class="navbar-brand" href="index.php">Whit\'s Baked Delights</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="index.php">Home</a>
        <a class="nav-item nav-link" href="delights.php">Baked Delights</a>';

        if (isset($_SESSION['userId'])) {
          echo '<a class="nav-item nav-link" href="consult.php">Schedule a Consultation</a>';
        }

        echo '<a class="nav-item nav-link" href="about.php">About</a>'

        if (!isset($_SESSION['userId'])) {
          echo '<a class="nav-item nav-link" href="logout.php">Logout</a>';
        } else {
          echo '<a class="nav-item nav-link" href="login.php">Login</a>';
        }
        echo '</div></div></nav>';
?>