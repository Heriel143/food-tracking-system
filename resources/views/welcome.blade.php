<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />
    <!-- site metas -->
    <title>Heado</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- owl carousel style -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.2.4/assets/owl.carousel.min.css" />
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="landing_page/css/bootstrap.min.css" />
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="landing_page/css/style.css" />
    <!-- Responsive-->
    <link rel="stylesheet" href="landing_page/css/responsive.css" />
    <!-- fevicon -->
    <link rel="icon" href="landing_page/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="landing_page/css/jquery.mCustomScrollbar.min.css" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="landing_page/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="landing_page/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen" />
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

</head>

<body>
    <!--header section start -->
    <div class=" header_section">
        <div class="container py-8">
            <nav class="flex justify-between bg-white bg-dark">
                <div>

                    <a class="inline-block logo" href="index.html"><img src="landing_page/images/logo.png" /></a>
                </div>
                <!-- <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarsExample01"
            aria-controls="navbarsExample01"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button> -->
                <div class="flex" id="">
                    <ul class="flex text-xl font-semibold text-black">
                        <li class="nav-item">
                            <a class="nav-link hover:text-white" href="#banner_section">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover:text-white" href="#about_section">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover:text-white" href="#services_section">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover:text-white" href="#blog_section">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover:text-white" href="#newsletter_section">Client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover:text-white" href="contact.html">Contact Us</a>
                        </li>
                        @auth
                            <li class="-m-1 nav-item read_bt">
                                <a class="nav-link hover:text-white" href="{{ url('/dashboard') }}">Dashboard</a>
                            </li>
                        @else
                            <li class="-mt-1 nav-item read_bt">
                                <a class="nav-link hover:text-white " href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth


                    </ul>
                </div>
            </nav>
        </div>
        <!--banner section start -->
        <section class="banner_section" id="banner_section">
            <div class="banner_section layout_padding">
                <div id="my_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="taital_main">
                                            <h4 class="banner_taital">Web Agency</h4>
                                            <p class="banner_text">
                                                It is a long established fact that a reader will be
                                                distracted by the readable content of a page when
                                                looking at its layout. The point of using Lorem I
                                            </p>
                                            <div class="read_bt"><a href="#">Read More</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div><img src="landing_page/images/img-1.png" class="image_1" /></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="taital_main">
                                            <h4 class="banner_taital">Web Agency</h4>
                                            <p class="banner_text">
                                                It is a long established fact that a reader will be
                                                distracted by the readable content of a page when
                                                looking at its layout. The point of using Lorem I
                                            </p>
                                            <div class="read_bt"><a href="#">Read More</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div><img src="landing_page/images/img-1.png" class="image_1" /></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="taital_main">
                                            <h4 class="banner_taital">Web Agency</h4>
                                            <p class="banner_text">
                                                It is a long established fact that a reader will be
                                                distracted by the readable content of a page when
                                                looking at its layout. The point of using Lorem I
                                            </p>
                                            <div class="read_bt"><a href="#">Read More</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div><img src="landing_page/images/img-1.png" class="image_1" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                        <i class=""><img src="landing_page/images/left-icon.png" /></i>
                    </a>
                    <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                        <i class=""><img src="landing_page/images/right-icon.png" /></i>
                    </a>
                </div>
            </div>
        </section>
        <!--banner section end -->
    </div>
    <!--header section end -->
    <!--about section start -->
    <section class="about_section" id="about_section">
        <div class="about_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="image_2"><img src="/landing_page/images/img-2.png" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="about_taital">
                            About <span class="us_text">Us</span>
                        </h1>
                        <p class="about_text">
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.
                            The point of using Lorem
                        </p>
                        <div class="read_bt_1"><a href="#">Read More</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about section end -->
    <!--services section start -->
    <section id="services_section" class="services_section">
        <div class="services_section layout_padding">
            <div class="container">
                <h1 class="service_taital">
                    <span class="our_text">Our</span> Services
                </h1>
                <p class="service_text">
                    There are many variations of passages of Lorem Ipsum available, but
                    the majority have suffered
                </p>
                <div class="services_section_2">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="icon_1"><img src="landing_page/images/icon-1.png" /></div>
                            <h4 class="design_text">Logo Design</h4>
                            <p class="lorem_text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing
                            </p>
                            <div class="icon_1"><img src="landing_page/images/icon-2.png" /></div>
                            <h4 class="design_text">Web Development</h4>
                            <p class="lorem_text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <div class="icon_3"><img src="landing_page/images/icon-3.png" /></div>
                            <h4 class="design_text">Web Design</h4>
                            <p class="lorem_text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing
                            </p>
                            <div class="read_bt_2"><a href="#">Read More</a></div>
                        </div>
                        <div class="col-sm-4">
                            <div class="icon_1"><img src="landing_page/images/icon-4.png" /></div>
                            <h4 class="design_text">Banner Design</h4>
                            <p class="lorem_text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing
                            </p>
                            <div class="icon_1"><img src="landing_page/images/icon-5.png" /></div>
                            <h4 class="design_text">Social Media Work</h4>
                            <p class="lorem_text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--services section end -->
    <!--blog section start -->
    <section id="blog_section" class="blog_section">
        <div class="blog_section layout_padding">
            <div class="container">
                <h1 class="blog_taital"><span class="our_text">Our</span> Blog</h1>
                <p class="blog_text">
                    There are many variations of passages of Lorem Ipsum available, but
                    the majority have suffered
                </p>
                <div class="services_section_2 layout_padding">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box_main">
                                <div class="student_bg">
                                    <img src="landing_page/images/img-3.png" class="student_bg" />
                                </div>
                                <div class="image_15">19<br />Feb</div>
                                <h4 class="hannery_text">There are many variations</h4>
                                <p class="fact_text">
                                    dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box_main">
                                <div class="student_bg">
                                    <img src="landing_page/images/img-4.png" class="student_bg" />
                                </div>
                                <div class="image_15">19<br />Feb</div>
                                <h4 class="hannery_text">There are many variations</h4>
                                <p class="fact_text">
                                    dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box_main">
                                <div><img src="landing_page/images/img-5.png" class="student_bg" /></div>
                                <div class="image_15">19<br />Feb</div>
                                <h4 class="hannery_text">There are many variations</h4>
                                <p class="fact_text">
                                    dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog section end -->
    <!--newsletter section start -->
    <section id="newsletter_section" class="newsletter_section">
        <div class="newsletter_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="newsletter_text">Subscribe Now</h1>
                        <p class="tempor_text">
                            dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="mail_bt_main">
                            <input type="text" class="mail_text" placeholder="Enter Tour Mail"
                                name="Enter Tour Mail" />
                            <div class="subscribe_bt"><a href="#">SUBSCRIBE</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--newsletter section end -->
    <!--client section start -->
    <div class="client_section layout_padding">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="blog_taital">
                            <span class="tes_text">Tes</span>timonial
                        </h1>
                        <div class="client_section_2 layout_padding">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="client_box active">
                                        <div class="left_main">
                                            <div class="image_6">
                                                <img src="landing_page/images/img-6.png" />
                                            </div>
                                        </div>
                                        <div class="right_main">
                                            <h6 class="magna_text active">Magna</h6>
                                            <p class="consectetur_text active">
                                                Consectetur adipiscing
                                            </p>
                                            <div class="quote_icon active"></div>
                                        </div>
                                        <p class="ipsum_text active">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua. Ut enim ad minim veniam, quis nostrudLorem
                                            ipsum
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="client_box">
                                        <div class="left_main">
                                            <div class="image_6">
                                                <img src="landing_page/images/img-6.png" />
                                            </div>
                                        </div>
                                        <div class="right_main">
                                            <h6 class="magna_text">Magna</h6>
                                            <p class="consectetur_text">Consectetur adipiscing</p>
                                            <div class="quote_icon"></div>
                                        </div>
                                        <p class="ipsum_text">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua. Ut enim ad minim veniam, quis nostrudLorem
                                            ipsum
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <h1 class="blog_taital">
                            <span class="tes_text">Tes</span>timonial
                        </h1>
                        <div class="client_section_2 layout_padding">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="client_box active">
                                        <div class="left_main">
                                            <div class="image_6">
                                                <img src="landing_page/images/img-6.png" />
                                            </div>
                                        </div>
                                        <div class="right_main">
                                            <h6 class="magna_text active">Magna</h6>
                                            <p class="consectetur_text active">
                                                Consectetur adipiscing
                                            </p>
                                            <div class="quote_icon active"></div>
                                        </div>
                                        <p class="ipsum_text active">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua. Ut enim ad minim veniam, quis nostrudLorem
                                            ipsum
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="client_box">
                                        <div class="left_main">
                                            <div class="image_6">
                                                <img src="landing_page/images/img-6.png" />
                                            </div>
                                        </div>
                                        <div class="right_main">
                                            <h6 class="magna_text">Magna</h6>
                                            <p class="consectetur_text">Consectetur adipiscing</p>
                                            <div class="quote_icon"></div>
                                        </div>
                                        <p class="ipsum_text">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua. Ut enim ad minim veniam, quis nostrudLorem
                                            ipsum
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <h1 class="blog_taital">
                            <span class="tes_text">Tes</span>timonial
                        </h1>
                        <div class="client_section_2 layout_padding">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="client_box active">
                                        <div class="left_main">
                                            <div class="image_6">
                                                <img src="landing_page/images/img-6.png" />
                                            </div>
                                        </div>
                                        <div class="right_main">
                                            <h6 class="magna_text active">Magna</h6>
                                            <p class="consectetur_text active">
                                                Consectetur adipiscing
                                            </p>
                                            <div class="quote_icon active"></div>
                                        </div>
                                        <p class="ipsum_text active">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua. Ut enim ad minim veniam, quis nostrudLorem
                                            ipsum
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="client_box">
                                        <div class="left_main">
                                            <div class="image_6">
                                                <img src="landing_page/images/img-6.png" />
                                            </div>
                                        </div>
                                        <div class="right_main">
                                            <h6 class="magna_text">Magna</h6>
                                            <p class="consectetur_text">Consectetur adipiscing</p>
                                            <div class="quote_icon"></div>
                                        </div>
                                        <p class="ipsum_text">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                            sed do eiusmod tempor incididunt ut labore et dolore
                                            magna aliqua. Ut enim ad minim veniam, quis nostrudLorem
                                            ipsum
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--client section end -->
    <!--footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="address_main">
                <div class="address_text">
                    <a href="#"><img src="landing_page/images/map-icon.png" /><span
                            class="padding_left_15">Loram Ipusm
                            hosting web</span></a>
                </div>
                <div class="address_text">
                    <a href="#"><img src="landing_page/images/call-icon.png" /><span
                            class="padding_left_15">+7586656566</span></a>
                </div>
                <div class="address_text">
                    <a href="#"><img src="landing_page/images/mail-icon.png" /><span
                            class="padding_left_15">demo@gmail.com</span></a>
                </div>
            </div>
            <div class="footer_section_2">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <h4 class="link_text">Useful link</h4>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h4 class="link_text">web design</h4>
                        <p class="footer_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscinaliquaL
                            oreadipiscing
                        </p>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h4 class="link_text">social media</h4>
                        <div class="social_icon">
                            <ul>
                                <li>
                                    <a href="#"><img src="landing_page/images/fb-icon.png" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="landing_page/images/twitter-icon.png" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="landing_page/images/linkedin-icon.png" /></a>
                                </li>
                                <li>
                                    <a href="#"><img src="landing_page/images/youtub-icon.png" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h4 class="link_text">Our Branchs</h4>
                        <p class="footer_text_1">
                            Lorem ipsum dolor sit amet, consectetur
                            adipiscinaliquaLoreadipiscing
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--client section end -->
    <!--copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">
                Copyright 2023 All Right Reserved By
                <a href="https://html.design">Free Html Templates</a> Distributed by:
                <a href="https://themewagon.com">ThemeWagon</a>
            </p>
        </div>
    </div>
    <!--copyright section end -->
    <!-- Javascript files-->
    <script src="landing_page/js/jquery.min.js"></script>
    <script src="landing_page/js/popper.min.js"></script>
    <script src="landing_page/js/bootstrap.bundle.min.js"></script>
    <script src="landing_page/js/jquery-3.0.0.min.js"></script>
    <script src="landing_page/js/plugin.js"></script>
    <!-- sidebar -->
    <script src="landing_page/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="landing_page/js/custom.js"></script>
    <!-- javascript -->
    <script src="landing_page/js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script
      type="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2//2.0.0-beta.2.4/owl.carousel.min.js"
    ></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery ||
            document.write(
                '<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>'
            );
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
</body>

</html>
