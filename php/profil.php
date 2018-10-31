<?php
session_start();
include 'getmet.php';
include_once 'confcookie.php';
include 'update.php';
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>Profil | IT SHARING CENTER</title>
      <link rel="shortcut icon" type="image/png" href="../image/logo.png">
      <link rel="stylesheet" href="../css/components.css">
      <link rel="stylesheet" href="../css/responsee.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="../owl-carousel/owl.theme.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <!-- CUSTOM STYLE -->
      <link rel="stylesheet" href="../css/template-style.css">
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
      <script type="text/javascript" src="../js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="../js/modernizr.js"></script>
      <script type="text/javascript" src="../js/responsee.js"></script>
      <script type="text/javascript" src="../js/template-scripts.js"></script>
      <script type="text/javascript" src="../js/script.js"></script>
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
				              echo $result['ufname'];
				           }
			            ?>
                   </p>
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
                        <img class="img-profile" src="avatar/<?=$result['avatar'];?>">
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
                              <h1 class="edit-prof">Edition du profil</h1>
         <br>
         <form method="post" action="" enctype="multipart/form-data">
            <label style="margin-top: 20px;">Nom (votre nom actuel) :</label><p class="gros-nom"><?= ucwords($result['ufname']);?></p>
            <div><span class="explic">Inserer votre modification ici :</span><input class="inpumodif" type="tex" name="ufnamemodif"></div><hr class="prof">
         <label>Post nom (votre post nom actuel):</label><p class="gros-nom"><?= ucwords($result['ulname']);?></p>
         <div><span class="explic">Inserer votre modification ici :</span><input class="inpumodif" type="tex" name="ulnamemodif"></div><hr class="prof">
         <label>E-mail (votre e-mail actuel) :</label><p class="gros-nom"><?= strtolower($result['uemail']);?></p>
         <div><span class="explic">Inserer votre modification ici :</span><input class="inpumodif" type="email" name="uemailmodif"></div><hr class="prof">
         <label>Numero de telephone (numero actuel) :</label><p class="gros-nom"><?= $result['utnum'];?></p>
         <div><span class="explic">Inserer votre modification ici :</span><input class="inpumodif" type="tel" value="<?= $result['utnum'];?>" name="utnumodif"></div><hr class="prof">
         <label>Choisi ta photo de profil :
             <center><img style="width: 40%" src="avatar/<?=$result['avatar']?>" /></center>
         </label><input class="filees" type="file" name="avatar"><br>
         <div style="display: flex;">
         <button name="profil-modify" type="submit" class="btn btn-primary btn-block"><img style="display:-webkit-inline-box;" src="../font/273-checkmark.svg">confirmer</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button name="retacceuil" type="submit" class="btn btn-primary btn-block"><img style="display:-webkit-inline-box;" src="../font/272-cross.svg">annuler</button>
         </div>
      </form>
                            
                      <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                       <p>votre nom doit avoir entre 3 et 15 carractères
                        votre post nom doit avoir entre 3 et 15 carractères
                        votre post nom doit avoir entre 3 et 15 carractères
                        votre e-mai a déjà été utilisé !
                        votre mot de passe doit avoir plus de 5 carractères
                        vos deux mots de passe ne sont pas conforme !
                        votre encien mot de passe est incorecte!
                        erreur durant l importation du fichier
                         format valide 'jpg', 'jpg', 'png'
                         votre phot de profil ne doit pas depaser 2 Mo</p>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                 <div style="margin-top: 50px;width:103%" class="well">
                    <h4>Bonjour a tous</h4>
                    <p>Cliquer sur le boutton ci dessous pour telecharger gratuitement des videos et livres poster par nos mentors.<br><center>formez-vous gratuitement en ligne!!!!</center></p><center><button style="width: 100%;word-wrap: break-word; " class="btn btn-info">cliquer ici</button></center><br><p>vous pouver aussi nous suivre sur : <br><a href="#"><img style="float: left;" src="../font/401-facebook.svg"> Facebook </a>| <a href="#"><img style="display: -webkit-inline-box;" src="../font/407-twitter.svg">Twitter </a>| <a href="#"><img style="display: -webkit-inline-box;" src="../font/414-youtube.svg">Youtube </a>| <a href="#"><img style="display: -webkit-inline-box;" src="../font/403-instagram.svg">Instagram</a></p>
                    </p>
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