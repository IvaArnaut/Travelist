<?php
    $servername = "localhost";
    $username = "iarnaut";
    $password = "babamanda9";
    $dbname = "projekt_arnaut";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>