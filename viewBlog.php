<?php
// Check if session has been started and start if not
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecs417";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$month = isset($_GET['month']) ? $_GET['month'] : '';

if (!empty($month)) {
    $sql = "SELECT post_date, post_time, title, body_text FROM BLOGPOSTS WHERE MONTH(post_date) = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $month);
} else {
    $sql = "SELECT post_date, post_time, title, body_text FROM BLOGPOSTS";
    $stmt = $conn->prepare($sql);
}

// Execute the prepared statement
$stmt->execute();
$result = $stmt->get_result();

$posts = [];
while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
}

// Sort the posts by date and time using PHP
// Implementing bubble sort for descending order by date and time
for ($i = 0; $i < count($posts) - 1; $i++) {
    for ($j = 0; $j < count($posts) - $i - 1; $j++) {
        $dt1 = strtotime($posts[$j]['post_date'] . ' ' . $posts[$j]['post_time']);
        $dt2 = strtotime($posts[$j+1]['post_date'] . ' ' . $posts[$j+1]['post_time']);
        if ($dt1 < $dt2) {
            // Swap the posts
            $temp = $posts[$j];
            $posts[$j] = $posts[$j+1];
            $posts[$j+1] = $temp;
        }
    }
}
$stmt->close();
$conn->close();
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
    <title>Hashir's Portfolio</title>
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
            <h4>Blog Posts</h4>
            <form action="viewBlog.php" method="GET">
                <select name="month" onchange="this.form.submit();">
                    <option value="">All Posts</option>
                    <?php
                    $months = [
                        '01' => 'January', '02' => 'February', '03' => 'March',
                        '04' => 'April', '05' => 'May', '06' => 'June',
                        '07' => 'July', '08' => 'August', '09' => 'September',
                        '10' => 'October', '11' => 'November', '12' => 'December'
                    ];
                    foreach ($months as $num => $name) {
                        echo "<option value='$num'" . ($month === $num ? " selected" : "") . ">$name</option>";
                    }
                    ?>
                </select>
                <?php
                // Check if user is logged in and set the button link accordingly
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '<a href="addEntry.php" class="add-post-button">Add Post</a>';
                } else {
                    echo '<a href="login.html" class="add-post-button">Add Post</a>';
                }
                ?>
            </form>
        </section>
        <?php
        if (count($posts) > 0) {
            foreach ($posts as $post) {
                echo "<section class='container'>";
                echo "<h6 class='date-align'>" . date("d F Y, H:i", strtotime($post['post_date'] . ' ' . $post['post_time'])) . " BST</h6>";
                echo "<h5>" . htmlspecialchars($post['title']) . "</h5>";
                echo "<div class='education-text'>";
                echo "<p>" . nl2br(htmlspecialchars($post['body_text'])) . "</p>";
                echo "</div>";
                echo "</section>";
            }
        } else {
            echo "<p>No blog posts found for the selected month.</p>";
        }
        ?>
    </article>
    <footer>
        <p>&copy; h45h1r</p>
    </footer>
</body>
</html>
