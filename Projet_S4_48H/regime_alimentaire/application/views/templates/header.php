<link rel="stylesheet" href="<?php echo site_url('assets/css/landing/classy-nav.css')?>" >
<link rel="stylesheet" href="<?php echo site_url('assets/css/landing/bootstrap.min.css')?>" >
<script src="<?php echo site_url('assets/js/bundle_js/bootstrap.bundle.min.js')?>"></script>
    
    <link rel="stylesheet" href="<?php echo site_url('assets/css/landing/landing.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/landing/animate.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/landing/owl.carousel.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/font-awesome-4.7/font-awesome.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/font-awesome-4.7/font-awesome.min.css')?>" >
    
    <!-- Preloader  -->
     <div id="preloader">
        <div class="preload-content">
            <div id="original-load"></div>
        </div>
    </div>

    <!-- Subscribe Modal
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
    </div> -->

    <div class="modal fade" id="staticBackdropChooseGold" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title text-center" id="staticBackdropLabel">
                    Changer votre offre en <?php echo $gold['nom_status'] ?> :
                </h4>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>  
                </div>
                <h3 class="text-center" style="margin-top: 5%"> Prix : <?php echo $gold['prix'] ?> Ar </h3>
                <p class="text-center"> - <?php echo $gold['taux'] ?> % sur toutes les regimes </p>
                <div class="modal-body d-flex flex-row justify-content-center">
                    <form action = "<?php echo base_url() ?>Utilisateur_con/change_to_gold" method="POST">   
                        <input type="hidden" name="status_id" value=<?php echo $gold['id_status_client'] ?>>
                        <center><input type="submit" value="Accepter" class="btn btn-info"></center>                  
                    </form>

                </div>
                <div class="modal-footer justify-content-center">

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
                    <div class="col-5 d-none d-sm-block">
                        <div class="breaking-news-area">
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="#">Bonjour!</a></li>
                                    <li><a href="#">Hello !</a></li>
                                    <li><a href="#">Gutten tag!</a></li>
                                    <li><a href="#">Salama!</a></li>
                                    <li><a href="#">Hola!</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Top Social Area -->
                    <div class="col-lg-1 col-sm-2" style="margin-right: 5%">
                    <a data-bs-toggle="modal" data-bs-target="#staticBackdropChooseGold"> 
                        <button class="btn btn-info">
                            GOLD 
                            <span class="badge badge-danger"> -15% </span>
                        </button>
                        </a>
                    </div>
                    <div class="col-lg-1 col-sm-2" style="margin-right: 5%">
                        <a href="<?php echo base_url() ?>Login_con/login_admin/" class="text-muted"> Admininistrateur </a>
                    </div>
                    <div class="col-lg-1 col-sm-2">
                        <a href="<?php echo base_url() ?>Sign_con/deconnect/" class="text-muted"> Deconnexion </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo Area -->
        <div class="logo-area text-center">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <a href="<?php echo site_url('landing_con'); ?>" class="original-logo"><img  width="150px" height="150px" src="<?php echo site_url('assets/Image/logo.png') ?>" alt="not found"></a>
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
                                
                                    <li><a href="<?php echo site_url('sign_con') ?>">Sign</a></li>
                                    <li><a href="<?php echo site_url('regime_con'); ?>">Regimes</a></li>
                                    <li><a href="<?php echo site_url('suitable_regime_con'); ?>">IMC</a></li>
                                   
                                </ul>

                                <!-- Search Form 
                                <div id="search-wrapper">
                                    <form action="#">
                                        <input type="text" id="search" placeholder="Search something...">
                                        <div id="close-icon"></div>
                                        <input class="d-none" type="submit" value="">
                                    </form>
                                </div> -->
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