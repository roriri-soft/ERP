<?php
// Connect to your database (assuming MySQL)
    $servername = "localhost";
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "roriri_it_park"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>