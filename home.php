<?php
session_start();
include('php/auth.php');
include 'php/getmet.php';
include_once 'php/confcookie.php';
include 'php/forum.back.end.php';
include 'php/fonctions.php';
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <!-- Insert to your webpage before the </head> -->
      <meta name="viewport" content="width=device-width" />
      <title>Forum | IT SHARING CENTER</title>
      <link rel="shortcut icon" type="image/png" href="image/logo.png">
      <link rel="stylesheet" href="css/components.css">
      <link rel="stylesheet" href="css/responsee.css">
      <link rel="stylesheet" href="css/bootstrap.min.css">
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

      <header>
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
                  <img class="img-qjuery nav-text" src="php/avatar/<?=$_SESSION['avatar'];?>" />
               </div>
               <div class="top-nav s-12 l-10">
                  <p class="nav-text">Bonjour&nbsp&nbsp
                  	<?php
            				if (isset($_SESSION['ufname'])){
            				echo $_SESSION['ufname'];
            				}
            			?> </p>

                  <ul class="right">
                      <li>
                        <form style=" margin-right: 3px ; " method="post" action=" ">
                           <button name="forum-acceuil" class="btn btn-primary btn-block" style=" background: none;border: none;padding: 0;"><a style="padding-top: 14px;padding-right: 8px;padding-left: 8px;padding-bottom: 0px;">Acceuil</a></button>
                        </form>
                     </li>
                     <li>
                     	<form style=" margin-right: 3px ; " method="post" action=" ">
                     		<button name="profil" class="btn btn-primary btn-block" style="background: none;border: none;padding: 0;"><a style="padding-top: 14px;padding-right: 8px;padding-left: 8px;padding-bottom: 0px;">Modifier profil</a></button>
                     	</form>
                     </li>
                     <li>
                     	<form method="post" action="php/logout.php">
                     		<button class="btn btn-primary btn-block" style="background: none;border: none;padding: 0;"><a style="padding-top: 14px;padding-right: 8px;padding-left: 8px;padding-bottom: 0px;">Deconnexion</a></button>
                     	</form>
                        <li class="avec">
                        <img class="img-profile" src="php/avatar/<?=$_SESSION['avatar'];?>">
                     Salut <?php if (isset($_SESSION['ufname'])){echo $_SESSION['ufname'];}?></li>
                     </li>
                  </ul>
                  
               </div>
            </div>
         </nav>
         </div>
      </header>
      <section class="section-home">
         <!-- Page Content -->
    <div class="container">

        <div class="row">
            
            <div class="col-lg-8">
            <center><h4 style="color: skyblue;font-weight: bold; font-size: 40px;">Choisi une Categorie</h4></center>
            <hr>
                    <div class="row">
                    <?php
                      while ($c = $categories->fetch()){ 
                      $subcat->execute(array($c['id']));
                     ?>                      
                         <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><img style="display: -webkit-inline-box;" src="font/261-point-right.svg"><strong><a style="font-size: 17px;" href="/itsharingcenter.dx.am/topic_forum.php?categorie=<?=url_custom_encode($c['nom']);?>"> <?= ucwords($c['nom']);?></a></strong>
                                  <ol>
                                  <?php while ($sc = $subcat->fetch()) { ?>
                                    <li><a style="font-size: 15px;" href="/itsharingcenter.dx.am/topic_forum.php?categorie=<?=url_custom_encode($c['nom']);?>&souscategorie=<?=url_custom_encode($sc['nom']);?>"><?= $sc['nom'];?></a></li>
                                    <?php } ?>
                                  </ol>
                                </li>
                            </ul>
                          </div>
                      <?php } ?>
            </div>


        </div>
            <div class="col-md-4">
                <div style="margin-top: 50px;" class="well">
                    <h4>Bonjour a tous</h4>
                    <p>Cliquer sur le boutton ci dessous pour telecharger gratuitement des videos et livres poster par nos mentors.<br><center>formez-vous gratuitement en ligne!!!!</center></p><center><button style="width: 100%;word-wrap: break-word; " class="btn btn-info"><img style="display:-webkit-inline-box;" src="font/276-enter.svg"> cliquer ici</button></center><br><p>vous pouver aussi nous suivre sur : <br><a href="#"><img style="float: left;" src="font/401-facebook.svg"> Facebook </a>| <a href="#"><img style="display: -webkit-inline-box;" src="font/407-twitter.svg">Twitter </a>| <a href="#"><img style="display: -webkit-inline-box;" src="font/414-youtube.svg">Youtube </a>| <a href="#"><img style="display: -webkit-inline-box;" src="font/403-instagram.svg">Instagram</a></p>
                    </p>
                </div>
                 <div style="margin-top: 50px;" class="well">
                    <h4>A propos de l'auteur</h4>
                    <p>Mon nom est ........................................................</p>
                    
                </div>
            </div>
        </div>
    </div>
        <hr>
        <div style="margin: auto; display: flex;" class="row">
          <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
            <img style="width: 75px; height: 75px" src="image/15.png" alt="Generic placeholder thumbnail">
            </a>
            </div>
            <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
            <img style="width: 75px; height: 75px" src="IMAGE/php7.png" alt="Generic placeholder thumbnail">
            </a>
            </div>
            <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
            <img style="width: 75px; height: 75px" src="image/HTML5.png" alt="Generic placeholder thumbnail">
            </a>
            </div>
            <div class="col-sm-6 col-md-3">
            <a href="#" class="thumbnail">
            <img style="width: 75px; height: 75px" src="image/css3.png" alt="Generic placeholder thumbnail">
            </a>
          </div>
        </div>
        </section>
      <footer>
         <div class="line">
            <div class="s-12 l-6">
               <p style="font-size: 14px;">© Copyright 2017, aime malaika</p>
            </div>
            <div class="s-12 l-6">
               <a style="color: #c3bfbf;" class="right" href="mailto:aimemalaika1995@gmail.com">Design and coding by aime malaika</a>
            </div>
         </div>
          <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
      </footer>
   </body>
</html>