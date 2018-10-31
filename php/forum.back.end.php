<?php
include 'bdd.config.php';
$categories = $con->query('SELECT * FROM f_categories ORDER BY nom');
$subcat = $con->prepare('SELECT * FROM f_souscategories WHERE id_categorie = ? ORDER BY nom');



