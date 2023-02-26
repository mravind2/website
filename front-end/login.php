<?php
session_start();

if (isset($_POST["username"]) && isset($_POST["password"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

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

  // Prepare and execute the query
  $stmt = $conn->prepare("SELECT username, password FROM users WHERE username=? AND password=?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();  

  // Get the result
  $result = $stmt->get_result();

  // If the query returns a result, the login was successful
  if ($result->num_rows > 0) {
    // Start a session and store the username in the session
    $_SESSION['username'] = $username;
    echo "success";
    exit();
  } else {
    // If the query does not return a result, the login was not successful
    echo "Invalid username or password.";
  }

  $stmt->close();
  $conn->close();
}
?>
