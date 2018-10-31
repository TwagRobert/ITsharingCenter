<?php
include 'bdd.config.php';
if(isset($_GET['categorie'])){
	$get_categorie = htmlspecialchars($_GET['categorie']);
	$categorie = $con->prepare('SELECT * FROM f_categories WHERE id = ?');
	$categorie->execute(array($get_categorie));
	$cat_exist = $categorie->rowCount();
	if ($cat_exist == 1) {
		$categorie =$categorie->fetch();
		$categorie = $categorie['nom'];

		$souscategories = $con->prepare('SELECT * from f_souscategories WHERE id_categorie = ? ORDER BY nom');
		$souscategories->execute(array($get_categorie));


		if (isset($_POST['tsubmit'])) {
		if (isset($_POST['tsujet'], $_POST['tcontenu'])) {
			$sujet = htmlspecialchars($_POST['tsujet']);
			$contenue = $_POST['tcontenu'];
			$souscategorie = htmlspecialchars($_POST['souscategorie']);
			$verify_sc = $con->prepare('SELECT id FROM f_souscategories WHERE id = ? AND id_categorie =?');
			$verify_sc->execute(array($souscategorie, $get_categorie));
			$verify_sc = $verify_sc->rowCount();
			if ($verify_sc==1) {
					if (!empty($sujet) AND !empty($contenue)) {
					if (strlen($sujet)<=100) {
						if (isset($_POST['tmail'])) {
							$notif_mail = 1;
						}else{
							$notif_mail = 0;
						}
						 $insert = $con->prepare("INSERT INTO f_topics(id_createur, sujet, contenu, notif_createur,	date_heure_creation) VALUES (?, ?, ?, ?, NOW()) ");
		                  $insert->execute(array($_SESSION['id'], $sujet, $contenue, $notif_mail));
		                  $lt = $con->query('SELECT * FROM f_topics ORDER BY id DESC LIMIT 0,1');
		                  $lt = $lt->fetch();
		                  $id_topic = $lt['id'];
		                  $insersion = $con->prepare('INSERT INTO f_topics_categories(id_topic, id_categorie, id_souscategorie) VALUES(?,?,?) ');
		                  $insersion->execute(array($id_topic, $get_categorie, $souscategorie));
		                  header("Location:/itsharingcenter.dx.am/php/creationTopic.php?categorie=".$get_categorie);
		                  $mescrea = 'topic creer avec succes';
					}else{
						$terror = 'votre sujet ne doit pas depasser 100 carractere';
					}
				}else{
					$terror = 'tout les champs doivent etre completer';
				}
			}else{
				$terror = 'cette categorie n esxiste pas';
			}
		

		}
	}
	}else{
		die('categorie introuvable');
	}
}
	











?>