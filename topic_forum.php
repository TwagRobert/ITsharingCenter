<?php
session_start();
include('php/auth.php');
include 'php/getmet.php';
include 'php/online_list.php';
include_once 'php/confcookie.php';
include 'php/forum.back.end.php';
include 'php/forum.categ.php';
include 'php/conf.aff.php';
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>Liste des sujets | IT SHARING CENTER</title>
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
 <!--  petit alert a suppri-->
  
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
         
    <!-- Page Content -->
    <div class="container">

        <div style="margin-right: 0px;margin-left: 0px;" class="row">
            <!-- Blog Post Content Column -->
            <div style=" padding-left: 0px;" class="col-lg-8">
               <center><h4 style="font-size: 30px; color: darkblue;">
            <?=ucwords($get_categorie);?>
            <?php if (!empty($get_souscategorie)) {
              echo " / ".ucwords($get_souscategorie);
            }  ?>
            </h4></center>
               <table style="border: none;" class="table table-condensed">
                  <thead>
                     <tr class="active">
                        <th class="table1">Sujet</th>
                        <th class="table1">date</th>
                        <th class="table1">Auteur</th>
                        <th class="table1">Resolu</th>
                        <th></th>

                     </tr>
                  </thead>
                  <tbody>
                  <?php while($t = $topics->fetch()) { ?>                    
                     <tr>
                        <td style="padding: 15px 0px;" class="table1"><?=$t['sujet']; ?></td>
                        <td style="padding: 15px 0px;" class="table1"><?=$t['date_heure_creation']; ?></td>
                        <td style="padding: 15px 0px;" class="table1"><?=ucwords($t['ufname'])."&nbsp".ucwords($t['ulname']); ?></td>
                        <td style="padding: 15px 0px;" class="table1"></td>
                        <td style="padding: 15px 0px;" class="table1"><a class="atopic" href="/itsharingcenter.dx.am/uniquetopic.php?titre=<?=url_custom_encode($t['sujet']);?>&id=<?=$t['topic_base_id'];?>">lire le topic ?</a></td>
                     </tr>
                  <?php } ?>
                  </tbody>
               </table>
                  <div style="display: flex;">
                      <a style="color: aliceblue;margin-bottom: 5px;" class="btn btn-block btn-info" href="php/creationTopic.php?categorie=<?= $id_categorie;?>" role="button"><img style="display:-webkit-inline-box;" src="font/006-pencil.svg"> Creer un nouveau topic</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      <a style="color: aliceblue;margin-bottom: 5px;" class="btn btn-block btn-info" href="home.php?id='.$_SESSION['id'].'+ name='.$_SESSION['ufname'].'+'.$_SESSION['ulname'].'+acceuil'" role="button"><img style="display:-webkit-inline-box;" src="font/104-undo2.svg"> Choisir une nouvelle categorie</a>
                  </div>
                  <center>
                   <ul style="margin: auto;"  class="pagination">
                      <?php
                      for ($i=1; $i <=(($topictotal / $topicparpage)+1) ; $i++) { 
                        if (!empty($get_souscategorie)) {
                          echo '<li><a href="topic_forum.php?categorie='.$get_categorie.'&souscategorie='.$get_souscategorie.'&page='.$i.'">'.$i.'</a></li>';
                        }else{
                         echo '<li><a href="topic_forum.php?categorie='.$get_categorie.'&page='.$i.'">'.$i.'</a></li>'; 
                        }
                       
                      }?>
                  </ul>
                  </center>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Recherche</h4>
                    <form method="GET" action="" class="input-group">
                        <input type="search" name="outil" class="form-control">
                        <span class="input-group-btn">
                          <input type="submit" name="submit">
                        </button>
                        </span>
                    </form>
                    <!-- /.input-group -->
                </div>
                 <div class="well">
                    <h4>les categories des sujets duscuter sur ce forum</h4>
                      <li>blablabla</li>
                   
                    <!-- /.row -->
                </div>

                <div class="well">
                    <h4>les sujets les plus recents</h4>
                   
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Liste des personnes en ligne</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

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
      </footer>
   </body>
</html>
         