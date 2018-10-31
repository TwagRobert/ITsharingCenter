<?php

$dislike =$con->prepare('SELECT id FROM dislike_user WHERE id_article = ?');
$dislike->execute(array($_GET['id']));
$dislike = $dislike->rowCount();

$like =$con->prepare('SELECT id FROM like_user WHERE id_article = ?');
$like->execute(array($_GET['id']));
$like = $like->rowCount();
