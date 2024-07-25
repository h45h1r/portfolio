<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to login page
    header("Location: login.html");
    exit;
}

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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Collect title and body text from form
    $title = $_POST['title'];
    $body_text = $_POST['text']; 

    $post_date = date("Y-m-d"); 
    $post_time = date("H:i:s"); 

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO BLOGPOSTS (post_date, post_time, title, body_text) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $post_date, $post_time, $title, $body_text);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to viewBlog.php after successful insertion
        header("Location: viewBlog.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
