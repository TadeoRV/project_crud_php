<?php
include 'pages/connection.php';
$connection = new connection();
$projects = $connection->request("SELECT * FROM `projects`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <script src="https://kit.fontawesome.com/23b3a40123.js" crossorigin="anonymous"></script>
    <title>Tadeo Rodriguez</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand nav-element" href="#">Tadeo Rodriguez</a>
                <button class="  navbar-light navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link nav-element" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-element" href="#about-me">About me</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-element" href="#projects">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-element" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <section id="home" class="hero">
            <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
                <div class="hero-content d-flex flex-column justify-content-around flex-sm-row align-items-center">
                    <div class="col-md-4">
                        <img class="img-fluid hero-img" src="./assets/img/Tadeo.jpeg" alt="" srcset="">
                    </div>
                    <div class="text-center col-md-5">
                        <h1 class="hero-title">Front-end Developer</h1>
                        <p class="hero-text">Hi, my name is Tadeo Rodríguez, get to know me through my projects and join my road as a developer!</p>
                        <div class="hero-skills mt-4">
                            <i class="fa-brands fa-html5 skill mx-3"></i>
                            <i class="fa-brands fa-css3 skill mx-3"></i>
                            <i class="fa-brands fa-js skill mx-3"></i>
                            <i class="fa-brands fa-php skill mx-3"></i>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- <div class="hero-skills">
                    <p>
                        <i class="fa-brands fa-html5 skill"></i>
                        <i class="fa-brands fa-css3 skill"></i>
                        <i class="fa-brands fa-js skill"></i>
                        <i class="fa-brands fa-php skill"></i>
                    </p>
                </div> -->
            </div>
        </section>

        <section id="about-me" class="about-me">
            <div class="container my-5 text-center justify-content-center align-items-center">
                <div class="col justify-content-center">
                    <img class="abm-img img-fluid" src="./assets/img/pexels-img.jpg" alt="" srcset="">
                </div>
                <h3 class="my-3 abm-title">About Me</h3>
                <h4 class="mb-2 abm-subtitle"> Web Developer from Argentina</h4>
                <p class="mb-3 abm-text">I'm Tadeo Rodríguez, a skilled and passionate web developer. I specialize in creating elegant, functional websites by leveraging my expertise in HTML5, CSS3 and JavaScript. With a strong focus on collaboration and delivering high-quality solutions, I thrive on transforming client requirements into exceptional online experiences. Let's bring your ideas to life and build outstanding websites together.</p>
            </div>
        </section>

        <section id="projects" class="projects">
            <div class=" container">
                <h2 class="text-center project-title pt-3">Check out my projects</h2>

                <div class="project-container d-flex justify-content-center flex-wrap">

                    <?php
                    foreach ($projects as $project) {
                    ?>
                        <div class="card flex-md-row col-8 mt-3 mb-4 project-card">
                            <div class="project-img col-md-7">
                                <img src="images/<?php echo $project['image']; ?>" style="max-height: 50vh" class="card-img-top card-img p-1" alt="...">
                            </div>
                            <div class="card-body d-flex flex-column justify-content-center text-center">
                                <h5 class="card-title"><?php echo $project['name']; ?></h5>
                                <p class="card-text mt-5"><?php echo $project['description']; ?></p>
                                <div class="d-flex justify-content-end mt-auto">
                                    <a class="mx-2" href="<?php echo $project['github']; ?>"><i class="fa-brands fa-github fa-lg"></i></a>
                                    <a class="mx-2" href="<?php echo $project['url']; ?>"><i class="fa-solid fa-link fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>


        <section id="contact" class="contact">
            <div class="row flex-column flex-lg-row justify-content-center align-items-center my-4">
                <div class="col-11 col-md-6 col-lg-5 container">
                    <h3 class="msg-title">Send me a message</h3>
                    <form class="msg-form">
                        <div class="col-12 mt-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control msg-input" name="name" id="name" maxlength="30">
                        </div>
                        <div class="col-12 mt-2">
                            <label for="mail" class="form-label">Mail</label>
                            <input type="mail" class="form-control msg-input" name="mail" id="mail">
                        </div>
                        <div class="col-12 mt-2">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" class="form-control msg-input" id="message" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col-12 mt-2 text-center">
                            <button class="msg-submit msg-input" type="submit">Send</button>
                        </div>
                    </form>
                </div>

                <div class="col-11 col-md-3 col-lg-5 container d-flex flex-column align-items-center align-items-md-end my-3">
                    <h4 class="socials-title">My socials</h4>
                    <h5><a class="socials" href=https://github.com/TadeoRV><i class="fa-brands fa-github fa-lg socials"></i> TadeoRV</a></h5>
                    <h5><a class="socials" href=https://www.linkedin.com/in/tadeo-rodriguez-b08a95251/><i class="fa-brands fa-linkedin fa-lg socials"></i> Tadeo Rodríguez</a></h5>
                    <h5><a class="socials" href=""><i class="fa-sharp fa-solid fa-at fa-lg socials"></i> dtgrodriguez@gmail.com</a></h5>
                    <h5><a class="socials" href=""><i class="fa-brands fa-whatsapp fa-lg socials"></i> - Whatsapp</a></h5>
                </div>

            </div>

        </section>

    </main>



    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/index.js"></script>
</body>

</html>