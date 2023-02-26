<?php

// Database configuration
$servername = "107.180.1.16";
$username = "sprc2023team12";
$password = "sprc2023team12";
$dbname = "sprc2023team12";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email exists in database
$email = $_POST["email"];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Email exists in database
    echo "exists";
} else {
    // Email does not exist in database
    echo "not_exists";
}

$conn->close();

?>
