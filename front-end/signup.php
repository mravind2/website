<?php
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Replace with your database credentials
$host = "107.180.1.16";
$dbUsername = "sprc2023team12";
$dbPassword = "sprc2023team12";
$dbName = "sprc2023team12";

// Create a connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the username already exists in the database
$stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "Username already exists.";
    exit();
}

// Check if the email already exists in the database
$stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "Email already exists.";
    exit();
}

// Check if the password and confirm_password match
if ($password !== $confirm_password) {
    echo "Passwords do not match.";
    exit();
}


// Insert the new user into the database
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);
$stmt->execute();

echo "Sign up successful.";
exit();

$stmt->close();
$conn->close();
}
?>
