<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="plugins/lineawesome/css/line-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/metisMenu.min.css" />
    <link rel="stylesheet" href="css/lightgallery.min.css" />
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
</head>
<body>


    <div class="header-top">
        <div class="container">
            <div class="th-wrap">
                <div class="th-left">
                    <ul>
                        <li><a href="#"><i class="las la-tty"></i> +977 123 456 789</a></li>
                        <li><a href="#"><i class="las la-envelope-open-text"></i> +977 123 456 789</a></li>
                    </ul>
                </div>
                <div class="th-right">
                    <ul>
                        <li class="facebook"><a href="#"><i class="lab la-facebook-f"></i></a></li>
                        <li class="twitter"><a href="#"><i class="lab la-twitter"></i></a></li>
                        <li class="linkedin"><a href="#"><i class="lab la-linkedin-in"></i></a></li>
                        <li class="instagram"><a href="#"><i class="lab la-instagram"></i></a></li>
                        <li class="youtube"><a href="#"><i class="lab la-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header id="header">
        <div class="container">
            <div class="h-wrap">
                <div class="logo">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/logo_brand.png" alt="">
                    </a>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent" id="navigation_bar">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="about.php">About Us</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="gallery.php">Gallery</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="single-gallery.php">Gallery Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Blog
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="blog.php">Blog</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="single-blog.php">Blog Details</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            School Life
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="sub-menu">
                                <a class="dropdown-item" href="#">Message From Chairman</a>
                                <ul class="dropdown-menu sub-dropdown" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Message From Chairman</a></li>
                                    <li><a class="dropdown-item" href="#">Curriculam Activities</a></li>
                                    <li><a class="dropdown-item" href="#">School Sports</a></li>
                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="#">Curriculam Activities</a></li>
                            <li><a class="dropdown-item" href="#">School Sports</a></li>
                        </ul>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <div class="sift_menu_bar">
                    <i class="las la-search"></i>
                </div>
                <div class="toggle-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </nav>
</div>
</div>
</header>


<!-- Mobile Menu -->
<div id="mySidenav" class="sidenav">
    <div class="mobile-logo">
        <a href="index.html"><img src="images/logo_brand.png" alt="logo"></a>
        <a href="javascript:void(0)" id="close-btn" class="closebtn">&times;</a>
    </div>
    <div class="no-bdr1">
        <ul id="menu1">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Teaching & Learning</a></li>
            <li>
                <a href="#" class="has-arrow">School Life</a>
                <ul>
                    <li>
                        <a href="#">Message from Chairman</a>
                    </li>
                    <li>
                        <a href="#">Curriculam Activities</a>
                    </li>
                    <li>
                        <a href="#">School Sports</a>
                    </li>
                </ul>
            </li>
            <li><a href="#">Adminitions</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </div>
</div>
<!-- Mobile Menu End -->

