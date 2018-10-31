<?php
session_start();
include('php/auth.php');
include 'php/getmet.php';
include 'php/online_list.php';
include_once 'php/confcookie.php';
include 'php/config.unique.topic.php';
include 'php/conf.aff.php';
include 'php/dipslay_like_dislike.php';
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>Sujet unique | IT SHARING CENTER</title>
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
                           <button name="forum-acceuil" class="btn btn-primary btn-block" style=" background: none;border: none;padding: 0;"><a style="padding-top: 14px;padding-right: 8px;padding-left: 8px;padding-bottom: 0px;">acceuil</a></button>
                        </form>
                     </li>
                     <li>
                     	<form style=" margin-right: 3px ; " method="post" action=" ">
                     		<button name="profil" class="btn btn-primary btn-block" style=" background: none;border: none;padding: 0;"><a style="padding-top: 14px;padding-right: 8px;padding-left: 8px;padding-bottom: 0px;">moddifier profil</a></button>
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
          <section class="section-home">
         <div class="container">

        <div class="row">

            <div class="col-lg-8">
                <h1><?=$topic['sujet'];?></h1>
                <p class="lead">
                    Posté par <?=ucwords(get_name($topic['id_createur']));?>&nbsp<?=ucwords(get_lame($topic['id_createur']));?>
                </p>
                <p><img style="display: -webkit-inline-box;" src="font/079-clock.svg"></span> Posté le <?=$topic['date_heure_creation'];?></p>

                
                <!--<hr><img class="img-responsive" src="image/1.jpg" alt="">-->

                <hr>
                <p><?= $topic['contenu'];?></p><br>
                <div style="display: flex;">
                  <img style="display: -webkit-inline-box;margin-bottom: auto;" src="font/thumbs-up-hand-symbol.svg"><a style="color: green" href="php/checklike.php?titre=<?=$get_titre?>&id=<?=$get_id?>&t=1">J'aime :  </a> <?= $like ; ?> | <img style="display: -webkit-inline-box;margin-bottom: auto;" src="font/thumbs-down-silhouette.svg"><a style="color: red" href="php/checklike.php?titre=<?=$get_titre?>&id=<?=$get_id?>&t=2">J'aime pas : </a> <?= $dislike ;?> | <p>Vue par: </p> | <p>commentaire : <?=reponse_nbr_categ($get_id)?></p>
                </div>

                <hr>
                
                <h3>commentaires/reponses</h3>
                <hr>
                <?php
                while ($rcs = $finipost->fetch()) { ?>
                  <div style="margin-left: 4%;border-bottom: 1px solid lightgray;" class="media">
                    <a class="pull-left" href="#">
                        <img style="width: 40px;height: 40px;" class="media-object" src="php/avatar/<?= get_avat($rcs['id_posteur'])?>" alt="">
                    </a>
                    <div class="media-body"><?=ucwords(get_name($rcs['id_posteur']));?>&nbsp<?=ucwords(get_lame($rcs['id_posteur']));?>
                        <h4 class="media-heading">
                            <small><?=$rcs['date_heure_post'];?></small>
                        </h4>
                       <?=$rcs['contenu'];?>
                    </div>
                  </div>
               <?php } ?>
               <div class="well">
                    <h4>Tapper votre idee ici:</h4>
                    <form role="form" method="post" action="">
                        <div class="form-group">
                            <textarea name="topic_reponse" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="topic_reponse_submit">Envoyer</button>&nbsp<span style="color: red"><?php if (isset($rep_msg)) {echo $rep_msg;} ?></span> 
                    </form>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div style=" position: fixed;left: 867px;width: 29%;" class="col-md-4">
    <!-- Blog Categories Well -->
                <div class="well">
                    <h4>A propos de l'auteur</h4>
             
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Bonjour</h4>
                  <p>Cliquer sur le boutton ci dessous pour telecharger gratuitement des videos et livres poster par nos mentors.<br><center>formez-vous gratuitement en ligne!!!!</center></p><center><button style="width: 100%;word-wrap: break-word; " class="btn btn-info">cliquer ici</button></center><br><p>vous pouver aussi nous suivre sur : <br><a href="https://www.facebook.com/It-Sharing-Center-161064464427378/?ref=bookmarks" target="_blanc"><img style="float: left;" src="font/401-facebook.svg"> Facebook </a>| <a href="https://twitter.com/aime19952" target="_black"><img style="display: -webkit-inline-box;" src="font/407-twitter.svg">Twitter </a>| <a href="https://www.youtube.com/channel/UCgvTgpL6comedf0cffXiWgA" target="_blanc"><img style="display: -webkit-inline-box;" src="font/414-youtube.svg">Youtube </a>| <a href="https://www.instagram.com/malaikaaime/" target="_blanc"><img style="display: -webkit-inline-box;" src="font/403-instagram.svg">Instagram</a></p>

                </div>
                <form method="post" action=" ">
                        <button name="retour" class="btn btn-info btn-block">retour au menu precedent</button>
                      </form>
                
            </div>

        </div>
        <!-- /.row -->

        <hr>
   
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
      </footer>
   </body>
</html>
         