<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store post data in session to keep it through the editing if needed
    $_SESSION['preview_title'] = $_POST['title'];
    $_SESSION['preview_text'] = $_POST['text'];
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

// Fetch posts from database
$sql = "SELECT post_date, post_time, title, body_text FROM BLOGPOSTS ORDER BY post_date DESC, post_time DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/viewBlog.css">
    <link rel="stylesheet" type="text/css" href="css/viewBlog-mobile.css" media="only screen and (max-width: 768px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&family=Jolly+Lodger&display=swap" rel="stylesheet">
    <title>Preview Blog Post</title>
</head>
<body>
    <header>
        <a class="name" href="index.php">Hashir Hamid</a>
        <nav>
            <ul>
                <li><a href="projects.php">Projects</a></li> 
                <li><a href="experience.php">Experience</a></li> 
                <li><a href="viewBlog.php">Blog</a></li> 
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <li class="light-button"><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="light-button"><a href="login.html">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <article>
        <section class="blog-header">
            <h4>Preview Blog Post</h4>
            <div class='edit-confirm-container'>
                <a href="editEntry.php" class="add-post-button">Edit</a>
                <a href="submitPost.php" class="add-post-button">Confirm</a>
            </div>
        </section>
        <section class='container'>
            <h6 class='date-align'>Preview Post - <?php echo date("d F Y, h:i a"); ?></h6>
            <h5><?php echo htmlspecialchars($_SESSION['preview_title']); ?></h5>
            <div class='education-text'>
                <p><?php echo nl2br(htmlspecialchars($_SESSION['preview_text'])); ?></p>
            </div>
        </section>
    </article>
    <footer>
        <p>&copy; h45h1r</p>
    </footer>
</body>
</html>
