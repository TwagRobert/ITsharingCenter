<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width" />
      <title>IT SHARING CENTER |Home</title>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
   </head>
  <body class="size-1140">
  		<div style="padding-top: 0px;padding-bottom: 0px;margin-bottom: 0px;" class="jumbotron">
			<div class="container">
				<center><h1>bonjour <?=$_SESSION['ufname'];?> !</h1></center>
				<center><h2>Bienvenu sur IT SHARING CENTER !</h2></center><center><img src="../image/isc.png"></center>
				<center><p>Felicitation votre compte a bien ete creer votre non d'utilisateur est : <strong><?=$_SESSION['uemail'];?></strong> <br>et votre mot de passe est : *******(celui que vous avez creer a l inscription).Il est tres important de mettre des informations correcte et exacte car ilsn seront utilisées en cqs de besoin de contact</p></center>
				<center><p><a href="../index.php" class="btn btn-primary btn-lg" name="sendconfirmation" role="button">Cliquez ici pour retourner a la page d'acceuil</a></p></center>
			</div>
		</div>


  </body>
  </html>