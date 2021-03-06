<?php
    include 'includes/dbHelper.php';
    $blogPosts = execute("SELECT * FROM blogposts ORDER BY id DESC");
    $projects = execute("SELECT * FROM projects ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Alice Roherty's Portfolio</title>
    <link rel="stylesheet" type="text/css" href="styles/fousc.css" />
    <script src="lib/jquery-3.4.1.min.js" defer></script>
    <script src="lib/bootstrap.min.js" defer></script>
    <script src="lib/fullpage.min.js" defer></script>
    <script src="lib/particles.js" defer></script>
    <script src="https://kit.fontawesome.com/bfea4cb977.js" crossorigin="anonymous" defer></script>
    <script src="js/app.js" defer></script>
    <link rel="stylesheet" type="text/css" href="./lib/fullpage.min.css" />
    <link rel="stylesheet" type="text/css" href="./lib/animate.css" />
    <link rel="stylesheet" type="text/css" href="./lib/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="styles/main.css" />
</head>

<body>
    <?php
        include "includes/nav.php";
    ?>
    <div id="particles"></div>
    <div id="wrapper">
        <div class="section" id="homeSection">
            <div id="landingPageContainer">
                <h1>Alice Roherty-Carrier</h1>
                <h3>Web &amp; Mobile Developer</h3>
                <button onclick="window.location='#about'" id="landingPageButton">Learn More <span class="glyphicon glyphicon-chevron-down"></span></button>
            </div>
        </div>
        <div class="section" id="aboutSection">
            <div class="sectionContainer">
                <h1>About</h1>
                <div class="slide">
                    <div class="slideContainer">
                        <div class="card about">
                            <div class="card-body aboutBody">
                                <i class="fas fa-toolbox fa-5x"></i>
                                <h3 class="card-title">Frameworks and Libraries</h3>
                                <hr />
                                <p class="card-text aboutText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent feugiat est nec ex tempor, feugiat maximus arcu fringilla. Duis at lobortis ligula. Curabitur sed libero id ligula pellentesque semper. Phasellus vel metus mauris. Proin dignissim augue et lorem accumsan interdum.</p>
                            </div>
                        </div>
                        <div class="card about">
                            <div class="card-body aboutBody">
                                <i class="fas fa-code fa-5x"></i>
                                <h3 class="card-title">Programming Languages</h3>
                                <hr />
                                <p class="card-text aboutText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent feugiat est nec ex tempor, feugiat maximus arcu fringilla. Duis at lobortis ligula. Curabitur sed libero id ligula pellentesque semper. Phasellus vel metus mauris. Proin dignissim augue et lorem accumsan interdum.</p>
                            </div>
                        </div>
                        <div class="card about">
                            <div class="card-body aboutBody">
                                <i class="fab fa-html5 fa-5x"></i>
                                <h3 class="card-title">Web Technologies</h3>
                                <hr />
                                <p class="card-text aboutText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent feugiat est nec ex tempor, feugiat maximus arcu fringilla. Duis at lobortis ligula. Curabitur sed libero id ligula pellentesque semper. Phasellus vel metus mauris. Proin dignissim augue et lorem accumsan interdum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="portfolioSection">
            <div class="sectionContainer">
                <h1>Portfolio</h1>
                <?php
                    if (count($projects) > 0) {
                        for ($i = 1; $i <= count($projects); $i++) {
                            if ($i % 3 == 1) {
                                echo "<div class=\"slide\">
                                <div class=\"slideContainer\">";
                            }
    
                            $project = $projects[$i - 1];
                            $id = $project->ID;
                            $title = $project->Title;
                            $teaser = $project->Teaser;
                            $image = getProjectSkillImage($id);
    
                            echo 
                            "<div class=\"card project\" onclick=\"location.href='project.php?id=$id'\">
                                <div class=\"card-body projectBody\">
                                    <img class=\"projectIcon img-fluid\" src=\"$image\" alt=\"ProjectImage\" />
                                    <h3 class=\"card-title\">$title</h3>
                                    <hr />
                                    <p class=\"card-text projectTeaser\">$teaser</p>
                                </div>
                            </div>";
    
                            if ($i % 3 == 0 || $i == count($projects)) {
                                echo "</div>
                                </div>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <div class="section" id="blogSection">
            <div class="sectionContainer">
                <h1>Blog</h1>
                <?php
                    if (count($blogPosts) > 0) {
                        for ($i = 1; $i <= count($blogPosts); $i++) {
                            if ($i % 3 == 1) {
                                echo "<div class=\"slide\">
                                <div class=\"slideContainer\">";
                            }
    
                            $post = $blogPosts[$i - 1];
                            $id = $post->ID;
                            $title = $post->Title;
                            $date = $post->Date;
                            $image = $post->ImagePath;
                            $text = $post->Text;
    
                            if (!empty($image)) {
                                echo 
                                "<div class=\"card blogPost\" onclick=\"location.href='/blogPost.php?id=$id'\">
                                    <img class=\"card-img-top\" src=\"$image\" />
                                    <div class=\"card-body blogPostBody\">
                                        <h3 class=\"card-title\">$title</h3>
                                        <hr />
                                        <p class=\"card-text blogPostDate\">$date</p>
                                    </div>
                                </div>";
                            } else {
                                echo 
                                "<div class=\"card blogPost\" onclick=\"location.href='/blogPost.php?id=$id'\">
                                    <img class=\"card-img-top\" src=\"assets/default.jpg\" />
                                    <div class=\"card-body blogPostBody\">
                                        <h3 class=\"card-title\">$title</h3>
                                        <hr />
                                        <p class=\"card-text blogPostDate\">$date</p>
                                    </div>
                                </div>";
                            }
    
                            if ($i % 3 == 0 || $i == count($blogPosts)) {
                                echo "</div>
                                </div>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
        <div class="section" id="contactSection">
            <div class="sectionContainer">
                <h1>Contact</h1>
                <form action="contact.php" method="post" id="contactForm" class="mx-auto">
                    <input type="text" name="name" id="name" class="form-control text-center" placeholder="Name">
                    <input type="text" name="email" id="email" class="form-control text-center" placeholder="Email">
                    <textarea name="message" id="message" class="form-control text-center" placeholder="Message"></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
        <div class="section" id="resumeSection">
            <div class="sectionContainer">
                <h1>Resume</h1>
            </div>
        </div>
    </div>
</body>
</html>