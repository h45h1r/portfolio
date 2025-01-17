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
    <link rel="stylesheet" href="css/index.css">
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
        <section class="special-container border-gradient" id="About">
            <h4 class="about-name">Hi, I'm Hashir</h4>
            <div class="about-description">
                <p>A Computer Science and Artificial Intelligence student at Queen Mary University of London.</p>
                <p>I am interested in robotics, automation and AI and aspire to contribute innovative solutions to make a lasting positive impact.</p>
            </div>
        </section>
        <section class="container">
            <div class="align-pic">
                <div>
                    <h4>Education</h4>
                    <div class="education-text">
                        <p><strong>BSc Computer Science and Artificial Intelligence</strong></p>
                        <p><em>Queen Mary University of London</em></p>
                        <p>2023 - 2026</p>
                    </div>
                    <br>
                    <div class="education-text">
                        <p><strong>Computer Science Diploma</strong></p>
                        <p><em>Stonebridge Colleges</em></p>
                        <p>2022 - 2023</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container">
            <h4>Skills</h4>
            <ul class="skills-grid">
                <li>Java</li>
                <li>Python</li>
                <li>Bash</li>
                <li>HTML</li>
                <li>CSS</li>
                <li>PHP</li>
                <li>SQL</li> 
                <li>Git</li>
                <li>ROS</li>
                <li>Linux</li>
                <li>Scripting</li>
                <li>Operating Systems</li>
            </ul>
        </section>
        <section class="container contact" >
            <h4>Contact</h4>
            <ul>
                <li></li>
                <li><a href="mailto:hashirh03@gmail.com"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/></svg></a></li>
                <li><a href="tel:+447311726013"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg></a></li>
                <li><a href="https://www.linkedin.com/in/hashirhh/"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" class="bi bi-linkedin" viewBox="0 0 16 16"><path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"></path></svg></a></li>
                <li><a href="github.com/h45h1r"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"></path></svg></a></li>
            </ul>
        </section>
    </article>
    <footer>
        <p>&copy h45h1r</p>
    </footer>
</body>
</html>