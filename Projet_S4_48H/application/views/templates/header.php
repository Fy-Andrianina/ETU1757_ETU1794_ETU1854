<link rel="stylesheet" href="<?php echo site_url('assets/css/landing/classy-nav.css')?>" >
<link rel="stylesheet" href="<?php echo site_url('assets/css/landing/bootstrap.min.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/landing/font-awesome.min.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/landing/landing.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/landing/animate.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/landing/owl.carousel.css')?>" >
    <!-- Preloader 
     <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div> -->

    <!-- Subscribe Modal -->
    <div class="subscribe-newsletter-area">
        <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-body">
                        <h5 class="title">Regime routine</h5>
                        <form action="#" class="newsletterForm" method="post">
                            <input type="email" name="email" id="subscribesForm2" placeholder="Your e-mail here">
                            <button type="submit" class="btn original-btn">Suiver nous</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Breaking News Area -->
                    <div class="col-12 col-sm-8">
                        <div class="breaking-news-area">
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="#">Bonjour!</a></li>
                                    <li><a href="#">Hello !</a></li>
                                    <li><a href="#">Gutten tag!</a></li>
                                    <li><a href="#">Salama!</a></li>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Top Social Area -->
                    <div class="col-12 col-sm-4">
                        <div class="top-social-area">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Behance"><i class="fa fa-behance" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo Area -->
        <div class="logo-area text-center">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <a href="index.html" class="original-logo"><img src="img/core-img/logo.png" alt="not found"></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nav Area -->
        <div class="original-nav-area" id="stickyNav">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between">

                        <!-- Subscribe btn -->
                        <div class="subscribe-btn">
                            <a href="#" class="btn subscribe-btn" data-toggle="modal" data-target="#subsModal">Regime</a>
                        </div>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" id="originalNav">
                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="<?php echo site_url('landing_con'); ?>">Home</a></li>
                                    <li><a href=" <?php echo site_url('achat_code_con'); ?>">Achat des codes</a></li>
                                    <li><a href="<?php echo site_url('profil_con'); ?>">Profil</a></li>
                                
                                    <li><a href="<?php echo site_url('Sign_con') ?>">Sign</a></li>
                                    <li><a href="#">Megamenu</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>

                                <!-- Search Form  -->
                                <div id="search-wrapper">
                                    <form action="#">
                                        <input type="text" id="search" placeholder="Search something...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        
      <!-- jQuery (Necessary for All JavaScript Plugins) -->
      <script src="<?php echo site_url('assets/js/jquery/jquery-2.2.4.min.js');?>"></script>
    <!-- Popper js -->
    <script src="<?php echo site_url('assets/js/popper.min.js'); ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo site_url('assets/js/bootstrap.min.js')?>"></script>
    <!-- Plugins js -->
    <script src="<?php echo site_url('assets/js/plugins.js')?>"></script>
    <!-- Active js -->
    <script src="<?php echo site_url('assets/js/active.js'); ?>"></script>

    </header>