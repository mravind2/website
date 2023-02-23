<?php
header("Access-Control-Allow-Methods: POST");

$host = "107.180.1.16"; 
$username = "sprc2023team12";
$password = "sprc2023team12";
$dbname = "sprc2023team12";

// Create a new MySQLi object and establish a connection to the database server
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$comments = $_POST["comments"];

// Insert the form data into the contact_form table
$sql = "INSERT INTO contact_form (name, email, phone, comments)
        VALUES ('$name', '$email', '$phone', '$comments')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
