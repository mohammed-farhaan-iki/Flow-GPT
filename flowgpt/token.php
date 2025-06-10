<?php
session_start();

if (isset($_SESSION['currentNumber'])) {
    $currentNumber = $_SESSION['currentNumber'];
} else {
    $currentNumber = 0;
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== BOXICONS ===============-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!-- =============== CSS =============== -->
        <link rel="stylesheet" href="styles.css">

        <title>Token Gen</title>

        <!-- =============== FAVICON =============== -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
       <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
            <div class="progress-container">
                <div class="progress-bar" id="myBar"></div>
              </div>  
            <nav class="nav container">
                <a href="#" class="nav__logo"> Token Gen </a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="#home" class="nav__link active-link">Home</a>
                        </li>
                        <li class="nav__item">
                            <a href="#about" class="nav__link">Check Queue</a>
                        </li>
                        <li class="nav__item">
                            <a href="gen.html" class="nav__link">Generate</a>
                        </li>
                        <li class="nav__item">
                            <a href="#contact" class="nav__link">Contact Us</a>
                        </li>

                        <i class='bx bx-toggle-left change-theme' id="theme-button"></i>
                        <div class="dropdown">
        <i class='bx bxs-user-circle' id="profile"></i>
        <ul class="dropdown-menu">
            
       <!-- Check the user's role and show options accordingly -->
<?php if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === true) : ?>
    <?php if ($_SESSION["userRole"] === "Admin") : ?>
        <!-- Show options only for users with the role "Admin" -->
        <li><a href="mainreport.php">Report</a></li>
        <li><a href="b.php">Waiting List</a></li>
    <?php endif; ?>
<?php endif; ?>

            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>

                <a href="gen.html" class="button button__header">try now!</a>
            </nav>
        </header>

        <main class="main">
            <!--=============== HOME ===============-->
            <section class="home section" id="home">
                <div class="home__container container grid">
                    <dotlottie-player  src="https://lottie.host/25e1546d-1966-40c1-bdf6-efd252a43f4b/r7DtwkaHzK.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" mode="normal" loop autoplay></dotlottie-player>

                    <div class="home__data">
                        <h1 class="home__title">Get Your Queue Number with Ease<br>  </h1>
                        <p class="home__description">No more waiting in long lines. Get your queue number and save valuable time.</p>

                        <a href="gen.html" class="button">Generate!</a>

                    </div>   
                </div>
            </section>

            <!--=============== ABOUT ===============-->
            <br>
            <br>
            <br>
            <br>
            <section class="about section container" id="about">
                <div class="about__container grid">
                    <div class="about__data">
                          
                      <div class="queue-display">
        <h1 class="q_text">Token Status</h1>
        <div class="current-number">
            <p class="q_text">Current Number</p>
            <h1 id="current-number"><?php echo $currentNumber; ?></h1>
        </div>
        <div class="queue" style="display: none">
            <div class="queue-item">
                <h1 class="token-number">0</h1>
                
            </div>
       
             </div>

            <!-- Add more queue items dynamically using JavaScript -->
       
                          
                    </div>

                       

                </div>
                         
                    <dotlottie-player src="https://lottie.host/2737b33b-6cb2-4d62-aa16-2f8f12f10f9e/Z15iDzvH0S.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" mode="normal" loop autoplay></dotlottie-player>
                </div>
            </section>


            <!--=============== APP ===============-->
            <section class="app section container">
                <div class="app__container grid">
                    
<dotlottie-player src="https://lottie.host/4f8d1096-29aa-493f-9b07-b6b935ba190e/tdOJcxwydE.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" mode="normal" loop autoplay></dotlottie-player>
                    <div class="app__data">
                        <h2 class="section__title-center"> Track Your <br> Queue Status</h2> <br>
                        <p class="app__description">With a quick visit to this section, you can effortlessly check your token number and stay informed about your place in the queue.
                        </p>
                        <div class="app__buttons">
                            <a href="status.php " class="button button-flex">
                                <i class='bx bx-hourglass'></i>View Your Token Number
                            </a>
                        </div>
                    </div>

                </div>
            </section>

            <!--=============== CONTACT US ===============-->
            <section class="contact section container" id="contact">
                <div class="contact__container grid">
                    <div class="contact__content">
                        <h2 class="section__title-center">Contact us From <br> Here</h2> <br>
                        <p class="contact__description">We're here to assist you with any questions, concerns, or feedback you may have. Please don't hesitate to get in touch with us. Your input is valuable to us, and we look forward to hearing from you.</p>
                    </div>

                    <ul class="contact__content grid">
                        <li class="contact__address">Telephone: <span class="contact__information">999 - 888 - 777</span></li>
                        <li class="contact__address">Email:  <span class="contact__information">anonymous@gmail.com</span></li>
                        <li class="contact__address">Location: <span class="contact__information">Mangalore - India</span></li>
                    </ul>

                    <div class="contact__content">
                        <a href="" class="button">Contact Us</a>
                    </div>
                </div>
            </section>
        </main>

        <!--=============== FOOTER ===============-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">Token Gen</a>
                    <p class="footer__description">Generate Token <br> Get Your Queue Number with Ease</p>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Our Services</h3>
                    <ul class="footer__links">
                        <li><a href="" class="footer__link">Support </a></li>
                        <li><a href="#" class="footer__link">Donate </a></li>
                        <li><a href="#" class="footer__link">Report a bug</a></li>
                        <li><a href="#" class="footer__link">Terms of Service</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Our Company</h3>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link">Blog</a></li>
                        <li><a href="#" class="footer__link">Our mision</a></li>
                        <li><a href="#" class="footer__link">Get in touch</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Community</h3>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link">Support</a></li>
                        <li><a href="" class="footer__link">Questions</a></li>
                        <li><a href="#" class="footer__link">Usage help</a></li>
                    </ul>
                </div>

                <div class="footer__social">
                    <a href="#" class="footer__social-link"><i class='bx bxl-facebook-circle '></i></a>
                    <a href="" class="footer__social-link"><i class='bx bxl-github'></i></a>
                    <a href="" class="footer__social-link"><i class='bx bxl-instagram-alt'></i></a>
                </div>
            </div>

            <p class="footer__copy">&#169; Token Gen. All right reserved</p>
        </footer>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-up-arrow-alt scrollup__icon'></i>
        </a>

        <!--=============== MAIN JS ===============-->
        <script src="script.js"></script>
        
        
            
    </body>
</html>
