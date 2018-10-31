<?php 
session_start();
include 'bdd.config.php';
if (isset($_GET['t'], $_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
	$gett = htmlspecialchars($_GET['t']);
	$check = $con->prepare('SELECT * FROM f_topics WHERE id = ?');
	$check->execute(array($_GET['id']));
	if ($check->rowCount()== 1) {

		if ($gett == 1) {
			$check_like = $con->prepare('SELECT id FROM like_user WHERE id_article = ? AND id_user =?');
			$check_like->execute(array($_GET['id'],$_SESSION['id']));
			$check_like = $check_like->rowCount();
			$del = $con->prepare('DELETE FROM dislike_user WHERE id_article = ? AND id_user =?');
			$del->execute(array($_GET['id'],$_SESSION['id']));
			if ($check_like == 1) {
				$del = $con->prepare('DELETE FROM like_user WHERE id_article = ? AND id_user =?');
				$del->execute(array($_GET['id'],$_SESSION['id']));
			}else{
				$add = $con->prepare('INSERT INTO like_user (id_article, id_user) VALUES (?,?)');
				$add->execute(array($_GET['id'], $_SESSION['id']));
			}
			
		}elseif($gett == 2){
			$check_like = $con->prepare('SELECT id FROM dislike_user WHERE id_article = ? AND id_user =?');
			$check_like->execute(array($_GET['id'],$_SESSION['id']));
			$check_like = $check_like->rowCount();
			$del = $con->prepare('DELETE FROM like_user WHERE id_article = ? AND id_user =?');
			$del->execute(array($_GET['id'],$_SESSION['id']));
			if ($check_like == 1) {
				$del = $con->prepare('DELETE FROM dislike_user WHERE id_article = ? AND id_user =?');
				$del->execute(array($_GET['id'],$_SESSION['id']));
			}else{
				$add = $con->prepare('INSERT INTO dislike_user (id_article, id_user) VALUES (?,?)');
				$add->execute(array($_GET['id'], $_SESSION['id']));
			}

			
		}
		header("Location: ../uniquetopic.php?titre=".$_GET['titre']."&id=".$_GET['id']);
	}else{
		exit("error fatal11");
	}
	
}else{
	exit('error fatal22');
}