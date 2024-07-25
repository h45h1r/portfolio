<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

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

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data either from POST or session
    $title = isset($_POST['title']) ? $_POST['title'] : (isset($_SESSION['preview_title']) ? $_SESSION['preview_title'] : '');
    $text = isset($_POST['text']) ? $_POST['text'] : (isset($_SESSION['preview_text']) ? $_SESSION['preview_text'] : '');

    if (!empty($title) && !empty($text)) {
        $post_date = date("Y-m-d"); 
        $post_time = date("H:i:s");

        $stmt = $conn->prepare("INSERT INTO BLOGPOSTS (post_date, post_time, title, body_text) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die('MySQL prepare error: ' . $conn->error);
        }

        $stmt->bind_param("ssss", $post_date, $post_time, $title, $text);
        if ($stmt->execute() === false) {
            die('Execute error: ' . $stmt->error);
        }

        $stmt->close();
    } else {
        echo "Error: Missing title or text";
        exit;
    }

    // Clear the session variables to prevent resubmission
    unset($_SESSION['preview_title']);
    unset($_SESSION['preview_text']);

    // Redirect to a confirmation page or back to the blog list
    header("Location: viewBlog.php");
    exit();
} else {
    echo "Invalid request method.";
}
?>
