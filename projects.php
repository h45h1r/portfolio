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
    <link rel="stylesheet" href="css/projects.css">
    <link rel="stylesheet" type="text/css" href="css/projects-mobile.css" media="only screen and (max-width: 768px)">
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
            <h4>Projects</h4>
        </section>
        <section class="container">
            <h4>Moviescraper </h4>
            <a href="https://github.com/h45h1r/moviescraper"><svg xmlns="http://www.w3.org/2000/svg" height="30" fill="white" viewBox="0 0 640 512"><path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/></svg></a>
            <p>A bash and python script which allows movies to be conveniently searched and streamed in various resolutions using the terminal.</p>
        </section>
        <section class="container" >
            <h4>Portfolio Website</h4>
            <figure>
                <img class="portfolio-image" src="images/portfolio.png" alt="Portfolio Website">
                <figcaption>A responsive portfolio website designed using HTML, CSS and JavaScript.</figcaption>
            </figure>
        </section>
    </article>
    <footer>
        <p>&copy h45h1r</p>
    </footer>
</body>
</html>