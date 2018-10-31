<?php
session_start();
INCLUDE 'php/log.php';
INCLUDE 'php/sign.php';
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>IT SHARING CENTER |Home</title>
      <link rel="shortcut icon" type="image/png" href="image/logo.png">
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="owl-carousel/owl.theme.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/modernizr.js"></script>
      <script type="text/javascript" src="js/responsee.js"></script>
      <script type="text/javascript" src="js/template-scripts.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
   </head>
   <body class="size-1140">
      <!-- TOP NAV WITH LOGO -->

      <header>
      <?php
     
      if (isset($error)) {
        echo "<div class=\"alert alert-danger\">
          <a href=\"#\" class=\"alert-link\">Error ! ".$error."</a>
          </div>";
      }
      ?>
         <div id="topbar">
            <div class="line">
               <div class="s-12 m-6 l-6">
                  <p>CONTACT : <strong>(+250) 787 561 924</strong> | <strong>aimemalaika1995@gmail.com</strong></p>
               </div>
               <div class="s-12 m-6 l-6">
                  <div class="social right">
                     <a><i class="icon-facebook_circle"></i></a> <a><i class="icon-twitter_circle"></i></a> <a><i class="icon-google_plus_circle"></i></a> <a><i class="icon-instagram_circle"></i></a>
                  </div>
               </div>
            </div>
         </div>
         <nav>
            <div class="line">
               <div class="s-12 l-2">
                  <p class="logo"><strong>IT</strong> SHARING CENTER</p>
               </div>
               <div class="top-nav s-12 l-10">
                  <p class="nav-text">Menu</p>
                  <ul class="right">
                     <li><a href="#" id="loginact">Connexion</a></li>
                     <li><a href="#" id="siginact">Inscription</a></li>
                  </ul>
               </div>
            </div>
         </nav>
         <div class="sigin_form">
           <form method="post" action="">
              <label class="arlibecue">Nom :</label>
                <input class="conn_inp" type="text" name="ufname" placeholder="nom" value="<?php if(isset($ufname)){echo $ufname;}?>" required >
              <label class="arlibecue">Post nom :</label>
                <input class="conn_inp" type="text" name="ulname" placeholder="post nom"  value="<?php if(isset($ulname)){echo $ulname;}?>" required>
              <label class="arlibecue">Addresse e-mail :</label>
                <input class="conn_inp" type="email" name="uemail" placeholder="Addresse e-mail"  value="<?php if(isset($uemail)){echo $uemail;}?>" required>
              <label class="arlibecue">Numero de lelephone :</label>
                <input class="conn_inp" type="tel" name="utnum" placeholder="+000 000 000 000" value="<?php if(isset($utnum)){echo $utnum;}?>" required>
              <label class="arlibecue">Mot de passe :</label>
                <input class="conn_inp" type="password" name="umdp" placeholder="mot de passe> a 6 carractere" required>
              <label class="arlibecue">Confirmer mot de passe :</label>
                <input class="conn_inp" type="password" name="umdp2" placeholder="confirmer votre mot de passe" required>
               <label style="font-size: 10px; color: blanchedalmond;
                line-height: 10px;"> <input type="checkbox" id="check" name="checkbox_i" required>J'ai lu et j'accepte <strong><a>les conditions et regles de ce site</a></strong>.</label>
              <button name="sub-btn-insc" type="submit" class="btn btn-primary btn-block">Inscription</button>
            </form>
         </div>
         <div class="login_form">
           <form method="post" action="">
              <label class="arlibecue">Nom d'utilisateur :</label>
              <input class="conn_inp" type="email" name="uemailconnect" placeholder="nom d'utilisateur" required >
              <label class="arlibecue">Mot de passe :</label>
              <input class="conn_inp" type="password" name="umdpconnect" placeholder="mot de passe" required>
              <label for="remember" style="font-size: 12px; color: blanchedalmond;
                line-height: 0px;"><input type="checkbox" id="remember" name="rememberme"> se souvenir de moi</label>
              <button type="submit" name="sub-btn-conn" class="btn btn-primary btn-block">Connexion</button>
              <center><a style="color: green;" href="#">mot de passe oublier?</a></center>
            </form>
         </div>
      </header>
      <section>
         <!-- CAROUSEL -->
         <div id="carousel">
            <div id="owl-demo" class="owl-carousel owl-theme">
               <div class="item">
                  <img src="img/first.jpg" alt="">
                  <div class="line">
                     <div class="text hide-s">
                        <div class="line">
                          <div class="prev-arrow hide-s hide-m">
                             <i class="icon-chevron_left"></i>
                          </div>
                          <div class="next-arrow hide-s hide-m">
                             <i class="icon-chevron_right"></i>
                          </div>
                        </div>
                        <h2>IT SHARING CENTER pour patager vos idees</h2>
                        <p>Partager vos idees et vos realisation a d'autre ingenieur informaticien ici.</p>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img src="img/second.jpg" alt="">
                  <div class="line">
                     <div class="text hide-s">
                        <div class="line">
                          <div class="prev-arrow hide-s hide-m">
                             <i class="icon-chevron_left"></i>
                          </div>
                          <div class="next-arrow hide-s hide-m">
                             <i class="icon-chevron_right"></i>
                          </div>
                        </div>
                        <h2>IT SHARING CENTER pour tous</h2>
                        <p>Tout les monde peut participer quelque soit les niveau de votre cnnaissance en informatique.</p>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <img src="img/third.jpg" alt="">
                  <div class="line">
                     <div class="text hide-s">
                        <div class="line">
                          <div class="prev-arrow hide-s hide-m">
                             <i class="icon-chevron_left"></i>
                          </div>
                          <div class="next-arrow hide-s hide-m">
                             <i class="icon-chevron_right"></i>
                          </div>
                        </div>
                        <h2>IT SHARING CENTER lieu pour acquerrir des connaissance</h2>
                        <p>Apprenner et aider les autres a surmonter leur difficultés, concever des idees ensemble car l'union fait la force.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </section>
      <!-- FOOTER -->
      <footer>
         <div class="line">
            <div class="s-12 l-6">
               <p>© Copyright 2017, aime malaika</p>
            </div>
            <div class="s-12 l-6">
               <a style="color: #c3bfbf;" class="right" href="mailto:aimemalaika1995@gmail.com">Design and coding<br>by aime malaika</a>
            </div>
         </div>
      </footer>
      <script type="text/javascript" src="owl-carousel/owl.carousel.js"></script>
      <script type="text/javascript">
         jQuery(document).ready(function($) {
            var theme_slider = $("#owl-demo");
            $("#owl-demo").owlCarousel({
                navigation: false,
                slideSpeed: 300,
                paginationSpeed: 400,
                autoPlay: 6000,
                addClassActive: true,
             // transitionStyle: "fade",
                singleItem: true
            });
            $("#owl-demo2").owlCarousel({
                slideSpeed: 300,
                autoPlay: true,
                navigation: true,
                navigationText: ["&#xf007","&#xf006"],
                pagination: false,
                singleItem: true
            });

            // Custom Navigation Events
            $(".next-arrow").click(function() {
                theme_slider.trigger('owl.next');
            })
            $(".prev-arrow").click(function() {
                theme_slider.trigger('owl.prev');
            })
        });
      </script>
   </body>
</html>