<?php
function get_name($id){
		global $con;
		$ufname = $con->prepare('SELECT ufname FROM user WHERE id = ?');
		$ufname->execute(array($id));
		$ufname= $ufname->fetch()['ufname'];
		return $ufname;
} 
function get_lame($id){
		global $con;
		$ulname = $con->prepare('SELECT ulname FROM user WHERE id = ?');
		$ulname->execute(array($id));
		$ulname= $ulname->fetch()['ulname'];
		return $ulname;
} 
function get_avat($id){
		global $con;
		$avatar = $con->prepare('SELECT avatar FROM user WHERE id = ?');
		$avatar->execute(array($id));
		$avatar= $avatar->fetch()['avatar'];
		return $avatar;
} 
function reponse_nbr_categ($get_id){
		global $con;
		$nbr= $con->prepare('SELECT f_messages.id FROM f_messages WHERE id_topic = ?');
		$nbr->execute(array($get_id));
		return $nbr->rowCount();
} 