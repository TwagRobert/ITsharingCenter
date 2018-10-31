<?php
session_start();
include('auth2.php');
include 'getmet.php';
include_once 'confcookie.php';
include 'addTopic.php';
include 'fonctions.php';
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>IT SHARING CENTER |Creer un topic</title>
      <link rel="shortcut icon" type="image/png" href="../image/logo.png">
      <link rel="stylesheet" href="../css/components.css">
      <link rel="stylesheet" href="../css/responsee.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="../owl-carousel/owl.theme.css">
      <script type="text/javascript" src="../ckeditor/ckeditor.js" ></script>
      <link rel="stylesheet" href="../css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="../js/responsee.js"></script>
   </head>
   <body class="size-1140" style="">
 <!--  petit alert a suppri-->
  <script>
 //alert("salut ce site est en cour de creation il sera disponible d'ici peu de temps merci d'avoir pu geter un coup d'oeuil et bienvenue sur IT SHARING CENTER (ISC) veuiller tester l'affichage mobile et sur vos ordinateur puis donner vos avis au contact aficher sur le site . Signer Aime malaika");
</script>
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
                  <form style=" margin-right: 3px;" method="post" action=" ">
                        <button name="retacceuil" class="btn btn-primary btn-block" style=" background: none;border: none;padding: 0;"><a style="padding-top: 14px;padding-right: 8px;padding-left: 8px;padding-bottom: 0px;">Acceuil</a></button>
                      </form>
                     </li>
                     <li>
                        <form style=" margin-right: 3px;" method="post" action=" ">
                           <button name="stand-profil" class="btn btn-primary btn-block" style="background: none;border: none;padding: 0;"><a style="padding-top: 14px;padding-right: 8px;padding-left: 8px;padding-bottom: 0px;">Modifier profil</a></button>
                        </form>
                     </li>
                     <li>
                      <form method="post" action="logout.php">
                        <button class="btn btn-primary btn-block" style="background: none;border: none;padding: 0;"><a style="padding-top: 14px;padding-right: 8px;padding-left: 8px;padding-bottom: 0px;">Deconnexion</a></button>
                      </form>
                     </li>
                      <li class="avec">
                        <img class="img-profile" src="avatar/<?=$_SESSION['avatar'];?>">
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

        <div style="margin-right: 0px;margin-left: 0px;" class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1 class="edit-prof">Nouveau topic</h1>
                      <br>
                      <?php if (isset($mescrea)) {?>
                        <div style="margin: 0px;" class="alert alert-success"> element poster avec succes retourner a l'acceuil pour choisir des categories</div> 
                        <?php } ?>
                      <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data">
                       <?php
                            if (isset($terror)) {?>
                            <div style="margin: 0px;" class="alert alert-warning"><?=$terror;?></div>
                           <?php } ?>
                         <div class="form-group">
                            <label><h4>Sujet </h4></label>
                            <input class="form-control" type="text" name="tsujet" maxlength="100" placeholder="sujet du texte">                           
                         </div>
                         <div class="form-group">
                            <label><h4>Categories :</h4></label>&nbsp&nbsp&nbsp&nbsp&nbsp
                            <strong style="font-size: x-large;"><?= $categorie; ?></strong>
                         </div>
                         <div class="form-group">
                            <label><h4>Sous-categorie </h4></label>
                            <select name="souscategorie" class="form-control">
                            <?php while ($sc = $souscategories->fetch()) {?>
                                  <option value="<?= $sc['id'] ?>"><?= $sc['nom'] ?></option>
                            <?php } ?>
                            </select>
                          </div>
                         <div class="form-group">
                            <label><h4>Contenu </h4></label>




                            <textarea name="tcontenu"></textarea>

                              <script>
                                  CKEDITOR.replace( 'tcontenu' );
                              </script>



                         </div>
                         <div class="checkbox">
                            <label><h4><input name="tmail" type="checkbox" value="">Me notifier des reponse par mail</label>
                         </div>
                         <button name="tsubmit" style="color: aliceblue" class="btn btn-primary btn-block" type="submit"><img style="display:-webkit-inline-box;" src="../font/273-checkmark.svg">&nbspPoster le topic</button>
                      </form>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <div class="well">
                    <h4>Bonjour !</h4>
                        <p>Cliquer sur le boutton ci dessous pour telecharger gratuitement des videos et livres poster par nos mentors.<br><center>formez-vous gratuitement en ligne!!!!</center></p><center><button style="width: 100%;word-wrap: break-word; " class="btn btn-info">cliquer ici</button></center><br><p>vous pouver aussi nous suivre sur : <br><a href="https://www.facebook.com/It-Sharing-Center-161064464427378/?ref=bookmarks" target="_blanc"><img style="float: left;" src="../font/401-facebook.svg"> Facebook </a>| <a href="https://twitter.com/aime19952" target="_black"><img style="display: -webkit-inline-box;" src="../font/407-twitter.svg">Twitter </a>| <a href="https://www.youtube.com/channel/UCgvTgpL6comedf0cffXiWgA" target="_blanc"><img style="display: -webkit-inline-box;" src="../font/414-youtube.svg">Youtube </a>| <a href="https://www.instagram.com/malaikaaime/" target="_blanc"><img style="display: -webkit-inline-box;" src="../font/403-instagram.svg">Instagram</a></p>

                </div>
                <!-- Side Widget Well -->
                <div class="well">
                   
                </div>

            </div>

        </div>

    </div>
      </section>
      <!-- FOOTER -->
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