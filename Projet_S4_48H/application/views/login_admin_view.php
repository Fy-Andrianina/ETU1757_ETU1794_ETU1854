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
    <body class="login-admin">
    <script>
       window.addEventListener('load',function(){
            <?php if(isset($error)){  ?>
                 var p=document.getElementById("error");
                 p.innerHTML="<?php echo $error ?>";
                 p.style.color='red';

            <?php  } ?>
        });
       
    </script>
     
    


<main class="login-body " >
    <!-- Login Admin -->
    <form class="form-default" action="check_login_admin" method="POST">
        
        <div class="login-form">
            <!-- logo-login -->
            <div class="logo-login">
                <a href="index.html"><img src="assets/img/logo/loder.png" alt=""></a>
            </div>
            <h2>Se connecter</h2>
            <div class="form-input">
                <label for="name">E-mail</label>
                <input  type="email" name="email" placeholder="Email">
            </div>
            <div class="form-input">
                <label for="name">Mot de passe</label>
                <input type="password" name="password" placeholder="Mot de passe">
            </div>
            <div class="form-input pt-30">
                <input type="submit" name="submit" value="Se connecter">
            </div>
            
         
           
        </div>
    </form>
    <!-- /end login form -->
</main>


    </body>

</html>
