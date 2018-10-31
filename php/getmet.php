<?php
if (isset($_POST['profil'])) {
	header('Location: php/profil.php?id='.$_SESSION['id'].'name='.$_SESSION['ufname'].'&'.$_SESSION['ulname'].'profil&mofif');
}
if (isset($_POST['retacceuil'])) {
	header('Location: ../home.php?id='.$_SESSION['id'].'& name='.$_SESSION['ufname'].'&'.$_SESSION['ulname'].'acceuil');
}

if (isset($_POST['forum-acceuil'])) {
	header('Location: home.php?id='.$_SESSION['id'].'& name='.$_SESSION['ufname'].'&'.$_SESSION['ulname'].'acceuil');

	}

if (isset($_POST['stand-profil'])) {
	header('Location: profil.php?id='.$_SESSION['id'].'&name='.$_SESSION['ufname'].'&'.$_SESSION['ulname'].'profil');

	}

if (isset($_POST['retour'])) {
	header('Location:/topic_forum.php?categorie='.$get_categorie.'&souscategorie='.$get_souscategorie);

	}

?>