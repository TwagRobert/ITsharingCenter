<?php
include 'bdd.config.php';
$uip = $_SERVER['REMOTE_ADDR'];
    $temp = date("U");
    $session_online = 1000;
$ipreq = $con->prepare('SELECT * FROM ipuser WHERE uip=?');
$ipreq->execute(array($uip));
$ipexist =$ipreq->rowCount();
	if($ipexist == 0){
		$uonline = $con->prepare("INSERT INTO online(ufname, ulname, uip, temp) VALUES (?, ?, ?, ?)");
	    $uonline->execute(array($_SESSION['ufname'], $_SESSION['ulname'],$uip, $temp));
	}else{
	    $uonline = $con->prepare("UPDATE online SET temp = ? WHERE uip = ?");
	    $uonline->execute(array($temp , $uip)); 
	}
$session_delete = $temp - $session_online;
$supression = $con->prepare('DELETE FROM online WHERE temp < ?');
$supression->execute(array($session_delete));
?>