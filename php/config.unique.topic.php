<?php
include 'bdd.config.php';
include 'fonctions.php';
if (isset($_GET['titre'],$_GET['id']) AND !empty($_GET['titre']) AND !empty($_GET['id'])) {
	$get_titre = htmlspecialchars($_GET['titre']);
	$get_id = htmlspecialchars($_GET['id']);
	$titre_original = $con->prepare('SELECT * FROM f_topics WHERE id = ?');
	$titre_original->execute(array($get_id));
	$titre_original = $titre_original->fetch()['sujet'];
	if ($get_titre == url_custom_encode($titre_original)) {
		$topic = $con->prepare('SELECT * FROM f_topics WHERE id = ?');
		$topic->execute(array($get_id));
		$topic = $topic->fetch();

		

			if (isset($_POST['topic_reponse_submit'],$_POST['topic_reponse'])) {
				$reponse = htmlspecialchars($_POST['topic_reponse']);
				if (!empty($reponse)) {
					
					$ins = $con->prepare('INSERT INTO f_messages(id_topic,id_posteur,contenu,date_heure_post) VALUES(?,?,?,NOW())');
					$ins->execute(array($get_id, $_SESSION['id'],$reponse));
					$_SESSION['topicid'] = $get_id;
					$_SESSION['topictitre'] = $get_id;
					header("Location:/itsharingcenter.dx.am/uniquetopic.php?titre=".$get_titre."&id=".$get_id);
					
				}else{
					$rep_msg= 'votre reponse ne peut pas etre vide';
				}
			}
			$finipost = $con->prepare('SELECT * FROM f_messages WHERE id_topic = ? ORDER BY id DESC');
		$finipost->execute(array($get_id));

	}else{
		die('le titre ne corrrespond pas a l identifiant');
	}
}else{
	die('probleme de connexion veuillez contacter votre fournisseur de reseau');
}



