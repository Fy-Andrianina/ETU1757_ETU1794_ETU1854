<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>login</title>
    	<!-- CSS here -->
	<link rel="stylesheet" href="<?php echo site_url('assets/css/login/bootstrap.min.css')?>" >
	<link rel="stylesheet" href="<?php echo site_url('assets/css/login/owl.carousel.min.css')?>" >
	<link rel="stylesheet" href="<?php echo site_url('assets/css/login/slicknav.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/login/flaticon.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/login/progressbar_barfiller.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/login/gijgo.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/login/animate.min.css')?>" >
    <link rel="stylesheet" href="<?php echo site_url('assets/css/login/animated-headline.css')?>" >
	<link rel="stylesheet" href="<?php echo site_url('assets/css/login/magnific-popup.css')?>" >
	<link rel="stylesheet" href="<?php echo site_url('assets/css/login/fontawesome-all.min.css')?>" >
	<link rel="stylesheet" href="<?php echo site_url('assets/css/login/themify-icons.css')?>" >
	<link rel="stylesheet" href="<?php echo site_url('assets/css/login/slick.css')?>" >
	<link rel="stylesheet" href="<?php echo site_url('assets/css/login/nice-select.css')?>" >
	<link rel="stylesheet" href="<?php echo site_url('assets/css/login/style.css')?>" >

    </head>
    <body>
    <script>
       window.addEventListener('load',function(){
            <?php if(isset($error)){  ?>
                 var p=document.getElementById("error");
                 p.innerHTML="<?php echo $error ?>";
                 p.style.color='red';

            <?php  } ?>
        });
       
    </script>
     
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start-->


<main class="login-body" data-vide-bg="assets/img/login-bg.mp4">
    <!-- Login Admin -->
    <form class="form-default" action="login-bg.mp4" method="POST">
        
        <div class="login-form">
            <!-- logo-login -->
            <div class="logo-login">
                <a href="index.html"><img src="assets/img/logo/loder.png" alt=""></a>
            </div>
            <h2>Login Here</h2>
            <div class="form-input">
                <label for="name">Email</label>
                <input  type="email" name="email" placeholder="Email">
            </div>
            <div class="form-input">
                <label for="name">Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-input pt-30">
                <input type="submit" name="submit" value="login">
            </div>
            
            <!-- Forget Password -->
            <a href="#" class="forget">Forget Password</a>
            <!-- Forget Password -->
            <a href="register.html" class="registration">Registration</a>
        </div>
    </form>
    <!-- /end login form -->
</main>


    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Video bg -->
    <script src="./assets/js/jquery.vide.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <!-- Progress -->
    <script src="./assets/js/jquery.barfiller.js"></script>
    
    <!-- counter , waypoint,Hover Direction -->
    <script src="./assets/js/jquery.counterup.min.js"></script>
    <script src="./assets/js/waypoints.min.js"></script>
    <script src="./assets/js/jquery.countdown.min.js"></script>
    <script src="./assets/js/hover-direction-snake.min.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>
       
    </body>

</html>