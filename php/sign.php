<?php
include 'bdd.config.php';
//include 'php/online_list.php';
if (isset($_POST['sub-btn-conn'])) {
	$uemailconnect = htmlspecialchars(trim($_POST['uemailconnect']));
	$umdpconnect = sha1($_POST['umdpconnect']);
	$uip = $_SERVER['REMOTE_ADDR'];
    $session_online = 1000;
	$reconnexion = $con->prepare('SELECT * FROM user WHERE uemail=? AND umdp=?');
	$reconnexion->execute(array($uemailconnect, $umdpconnect));
	$userexist =$reconnexion->rowCount();
		if($userexist == 1){
                    if (isset($_POST['rememberme'])) {
                        setcookie('uemail',$uemailconnect, time()+360*24*3600, null, null, false, true);
		        		setcookie('umdp',$umdpconnect, time()+360*24*3600, null, null, false, true);
		        	}
						$userinfo =$reconnexion->fetch();
						$_SESSION['ufname']= $userinfo['ufname'];
						$_SESSION['ulname']= $userinfo['ulname'];
						$_SESSION['id']= $userinfo['id'];
						$_SESSION['uemail']= $userinfo['uemail'];
						$_SESSION['utnum'] = $userinfo['utnum'];
						$_SESSION['avatar'] = $userinfo['avatar'];
						$ipreq = $con->prepare('SELECT * FROM ipuser WHERE uip=?');
						$ipreq->execute(array($uip));
						$ipexist =$ipreq->rowCount();
							/*if($ipexist == 0){
			        			$saveip = $con->prepare("INSERT INTO ipuser(ufname, ulname, uip, temp) VALUES (?, ?, ?, NOW())");
	                   			$saveip->execute(array($_SESSION['ufname'], $_SESSION['ulname'],$uip)); 

	               			}else{
	               				$saveip = $con->prepare("UPDATE ipuser SET temp =NOw() WHERE uip = ?");
	                   			$saveip->execute(array($uip));
	               			}*/
                		header('Location: home.php?id='.$_SESSION['id'].'& name='.$_SESSION['ufname'].'+'.$_SESSION['ulname'].'+acceuil');
		}else{
			$error= "e-mail ou mot de passe incorrect";
		}
}else{

}
?>