<?php
include 'bdd.config.php';
if (!isset($_SESSION['id']) AND isset($_COOKIE['uemail'], $_COOKIE['umdp']) AND !empty($_COOKIE['uemail']) AND !empty($_COOKIE['umdp'])) {
   $reconnexion = $con->prepare('SELECT * FROM user WHERE uemail=? AND umdp=?');
   $reconnexion->execute(array($_COOKIE['uemail'], $_COOKIE['umdp']));
   $userexist =$reconnexion->rowCount();
      if($userexist== 1){
               $userinfo =$reconnexion->fetch();
               $_SESSION['ufname']= $userinfo['ufname'];
               $_SESSION['ulname']= $userinfo['ulname'];
               $_SESSION['id']= $userinfo['id'];
               $_GET['id'] = $userinfo['id'];
               $_SESSION['uemail']= sha1($userinfo['uemail']);
               header('Location: home.php?uemail='.$_SESSION['uemail'].'%%id='.$_SESSION['id'].'+name='.$_SESSION['ufname'].'+%%'.$_SESSION['ulname']);
            }

}
?>

                      
                        
                          
                       
                      
               
                
         
         