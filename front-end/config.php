<?php
$host = "107.180.1.16";
$userName = "sprc2023team12";
$password = "sprc2023team12";
$dbName = "sprc2023team12";
// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>