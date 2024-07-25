<?php
// Check if session has been started and start if not
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/addEntry.css">
    <link rel="stylesheet" type="text/css" href="css/addEntry-mobile.css" media="only screen and (max-width: 768px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&family=Jolly+Lodger&display=swap" rel="stylesheet">
    <script src="js/addEntry.js" defer></script>
    <title>Hashir's Portfolio</title>
</head>
<body>
    <header>
        <a class="name" href="index.php">Hashir Hamid</a>
        <nav>
            <ul>
                <li><a href="index.php#About">About</a></li> 
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
    <div class="container">
        <h4>Add Blog Post</h4>
        <form id="blogForm" method="POST" action="submitPost.php" novalidate>
            <input type="text" id="title" name="title" placeholder="Title" value="<?php echo isset($_SESSION['preview_title']) ? htmlspecialchars($_SESSION['preview_title']) : ''; ?>" required><br><br>
            <textarea id="text" name="text" placeholder="Text" required><?php echo isset($_SESSION['preview_text']) ? htmlspecialchars($_SESSION['preview_text']) : ''; ?></textarea><br><br>
            <div class="button-container">
                <button type="button" id="clearButton" onclick="clearForm();">Clear</button>
                <input type="button" id="previewButton" value="Preview" onclick="previewPost();">
                <input type="submit" value="Post">
            </div>
        </form>
    </div>
    <footer>   
        <p>&copy h45h1r</p>
    </footer>
</body>
</html>
