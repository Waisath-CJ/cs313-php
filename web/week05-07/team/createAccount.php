<?php
    require("dbConnect.php");
    $db = get_db();
    
    echo "Hello";

    $username = $_POST['username'];
    echo $username;
?>