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
    <link rel="stylesheet" href="css/experience.css">
    <link rel="stylesheet" type="text/css" href="css/index-mobile.css" media="only screen and (max-width: 768px)">
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
        <section>
            <h4>Experience</h4>
        </section>
        <section class="container">
            <h4>Junior Software Engineer</h4>
            <div class="education-text">
                <p><strong>Organisation: </strong>Hyperlink</p>
                <p><strong>Location: </strong>London, UK</p>
                <p><strong>Duration: </strong>September 2023 - Current</p>
                <p><strong>Role: </strong>Worked as part of the software team in a student-led research group with the aim of building the first hyperloop pod in London.</p>
            </div>
    </article>
    <footer>
        <p>&copy h45h1r</p>
    </footer>
</body>
</html>