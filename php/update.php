<?php
include 'auth2.php';
include 'bdd.config.php';
include 'fonctions.php';
if (isset($_SESSION['id'])) {
    $reqid = $con->prepare("SELECT * FROM user WHERE id =?");
    $reqid->execute(array($_SESSION['id']));
    $result = $reqid->fetch();
    if (isset($_POST['ufnamemodif']) AND !empty($_POST['ufnamemodif']) AND $_POST['ufnamemodif']!=$result['ufname']) {
        $ufnamemodif = htmlspecialchars(ucwords(trim($_POST['ufnamemodif'])));
        $ufnamemodiflength = strlen($ufnamemodif);
            if ($ufnamemodiflength >= 3 AND $ufnamemodiflength <= 15) {
                $apdatename = $con->prepare("UPDATE user SET ufname = ? WHERE id = ?");
                $apdatename->execute(array($ufnamemodif, $_SESSION['id']));
                header('Location: profil.php?email= var+mail+ post%%hacher %%id='.$_SESSION['id'].'+ name='.$_SESSION['ufname'].'+'.$_SESSION['ulname'].'+profil+mofif');
                    $message ="votre modification a étéfaite avec succès reconnectez-vous pour appliquer les changement a votre compte!";
            }else{
                $error1 = "votre nom doit avoir entre 3 et 15 carractères";
            }
    }


    if (isset($_POST['ulnamemodif']) AND !empty($_POST['ulnamemodif']) AND $_POST['ulnamemodif']!=$result['ulname']) {
        $ulnamemodif = htmlspecialchars(ucwords(trim($_POST['ulnamemodif'])));
        $ulnamemodiflength = strlen($ulnamemodif);
            if ($ulnamemodiflength >= 3 AND $ulnamemodiflength <= 15) {
                $apdatename = $con->prepare("UPDATE user SET ulname = ? WHERE id = ?");
                $apdatename->execute(array($ulnamemodif, $_SESSION['id']));
                header('Location: profil.php?email= var+mail+ post%%hacher %%id='.$_SESSION['id'].'+ name='.$_SESSION['ufname'].'+'.$_SESSION['ulname'].'+profil+mofif');
                $message ="votre modification a étéfaite avec succès reconnectez-vous pour appliquer les changement a votre compte!";
            }else{
                $error2 = "votre post nom doit avoir entre 3 et 15 carractères";
            }
    }


    if (isset($_POST['uemailmodif']) AND !empty($_POST['uemailmodif']) AND $_POST['uemailmodif']!=$result['uemail']) {
        $uemailmodif = htmlspecialchars(trim($_POST['uemailmodif']));
            $reqmailmod = $con->prepare("SELECT * FROM membre WHERE uemail = ?") ;
            $reqmailmod->execute(array($uemailmodif));
            $mailexistmod = $reqmailmod->rowcount();
            if ($mailexistmod == 0) {           
                $apdatename = $con->prepare("UPDATE user SET uemail = ? WHERE id = ?");
                $apdatename->execute(array($uemailmodif, $_SESSION['id']));
                header('Location: profil.php?email= var+mail+ post%%hacher %%id='.$_SESSION['id'].'+ name='.$_SESSION['ufname'].'+'.$_SESSION['ulname'].'+profil+mofif');
                $message ="votre modification a étéfaite avec succès reconnectez-vous pour appliquer les changement a votre compte!";
            }else{
                $error3 = "votre post nom doit avoir entre 3 et 15 carractères";
            }
    }


    if (isset($_POST['utnumodif']) AND !empty($_POST['utnumodif']) AND $_POST['utnumodif']!=$result['utnum']) {
        $utnumodif = htmlspecialchars(ucwords(trim($_POST['utnumodif'])));
            $reqtelmod = $con->prepare("SELECT * FROM membre WHERE utnum = ?") ;
            $reqtelmod->execute(array($utnumodif));
            $telexistmod = $reqtelmod->rowcount();
            if ($telexistmod == 0) {
                $apdatename = $con->prepare("UPDATE user SET utnum = ? WHERE id = ?");
                $apdatename->execute(array($utnumodif, $_SESSION['id']));
                header('Location: profil.php?email= var+mail+ post%%hacher %%id='.$_SESSION['id'].'+ name='.$_SESSION['ufname'].'+'.$_SESSION['ulname'].'+profil+mofif');
                $message ="votre modification a étéfaite avec succès reconnectez-vous pour appliquer les changement a votre compte!";
            }else{
                $error4 ="votre e-mai a déjà été utilisé !";
            }
    }

    if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
        $taillemax = 2097152;
        $extensionValide = array('jpg', 'jpg', 'png');
        if ($_FILES['avatar']['size']<= $taillemax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'),1));
            if (in_array($extensionUpload, $extensionValide)) {
                $chemin = "avatar/".$_SESSION['id'].".".$extensionUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'] , $chemin);
                if ($resultat) {
                    $imgimporte = $_SESSION['id'].".".$extensionUpload;
                    $updateavatar = $con->prepare('UPDATE user SET avatar = ? WHERE id= ?');
                    $updateavatar->execute(array($imgimporte, $_SESSION['id']));
                    header('Location: profil.php?email= var+mail+ post%%hacher %%id='.$_SESSION['id'].'+ name='.$_SESSION['ufname'].'+'.$_SESSION['ulname'].'+profil+mofif');
                }else{
                    $rep = "erreur durant l importation du fichier";
                }
            }else{
                $rep =' format invalide';
            }
        }else{
            $rep = 'votre phot de profil ne doit pas depaser 2 Mo';
        }
    }

}
?>