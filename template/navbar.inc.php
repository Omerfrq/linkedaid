<?php require_once 'head.inc.php' ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="img/logo-final.png" width="250" height="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarResponsive">

            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a href="index.php" class="nav-link waddaFont active"> Home</a>
                
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waddaFont" data-hover="dropdown" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>Profiles</a>
                    <div class="dropdown-menu">
                      <?php if ($_SESSION['user_type'] == 1): ?>
                        <a class="dropdown-item " href="ngoProfilepublic.php">My Ngo Page</a>
                      <?php endif; ?>
                      <?php if ($_SESSION['user_type'] == 2): ?>
                        <a class="dropdown-item " href="publicprofilePage.php">My Profile</a>
                        <?php endif; ?>
                        <a class="dropdown-item " href="logout.php">Logout</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waddaFont" data-hover="dropdown" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'> LinkedAID</a>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" href="aboutus.html">About us</a>
                        <a class="dropdown-item" href="travelAid.html">TravelAID</a>
                        <a class="dropdown-item" href="faqs.html">FAQs</a>
                        <a class="dropdown-item" href="privacyPolicy.html">Privacy Policy</a>
                        <a class="dropdown-item" href="terms.html">Terms & Conditions</a>
                    </div>
                </li>

                <li class="nav-item">
                      <a href="contactus.php" class="nav-link waddaFont"> Contact us</a>
                </li>

                <li class="nav-item">
                      <a href="messages-ngo.php" class="nav-link waddaFont"> Messages</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waddaFont" data-hover="dropdown" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false" tabindex='1'>
                        <i class="fa fa-language" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item " href="ngoProfilepublic.html">
                            <img src="img/us.png"> en</a>
                        <a class="dropdown-item " href="publicprofilePage.html">
                            <img src="img/fr.png"> fr</a>
                        <a class="dropdown-item " href="publicprofilePage.html">
                            <img src="img/spi.png"> sp</a>
                    </div>
                </li>

                <li class="close-responsive-menu js-close-responsive-menu">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="header-spacer--standard"></div>
