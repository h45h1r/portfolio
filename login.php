<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecs417";

// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve submitted email and password from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitted_email = $_POST['email'];
    $submitted_password = $_POST['password'];

    // Query to check if the email exists and the password matches
    $query = "SELECT * FROM users WHERE email = '$submitted_email' AND password = '$submitted_password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        session_start(); 
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $submitted_email;
        header("Location: addEntry.php");
        exit;
    } else {
        // Invalid credentials
        // Redirect back to the login page with an error message
        header("Location: login.html?error=invalid");
        exit;
    }
}

$conn->close();
?>
