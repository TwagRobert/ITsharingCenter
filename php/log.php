<?php
include 'bdd.config.php';
include 'fonctions.php';
if (isset($_POST['sub-btn-insc'])) {
    $ufname = htmlspecialchars(ucwords(trim($_POST['ufname'])));
    $ulname = htmlspecialchars(ucwords(trim($_POST['ulname'])));
    $uemail = htmlspecialchars(trim($_POST['uemail']));
    $utnum = htmlspecialchars(trim($_POST['utnum']));
    $uip = $_SERVER['REMOTE_ADDR'];
    $temp = date("U");
    $umdp = sha1($_POST['umdp']);
    $umdp2 = sha1($_POST['umdp2']);
    $ufnamelength = strlen($ufname);
    if ($ufnamelength >= 3 AND $ufnamelength <= 15) {
        $ulnamelength = strlen($ulname);
        if ($ulnamelength >= 3 AND $ufnamelength <= 15) {
            $reqmail = $con->prepare("SELECT * FROM membre WHERE uemail = ?") ;
            $reqmail->execute(array($uemail));
            $mailexist = $reqmail->rowcount();
            if ($mailexist == 0) {
                $reqtel = $con->prepare("SELECT * FROM membre WHERE utnum = ?") ;
                $reqtel->execute(array($utnum));
                $telexist = $reqtel->rowcount();
                $avatarexist = $reqtel->rowcount();
                if ($telexist == 0) {
                    if ($umdp == $umdp2) {
                        $umdplength = strlen($umdp);
                        if ($umdplength >= 5) {

                                    $saveip = $con->prepare("INSERT INTO ipuser(ufname, ulname, uip, temp) VALUES (?, ?, ?, ?)");
                                    $saveip->execute(array($ufname, $ulname,$uip, $temp));

                                    $insert = $con->prepare("INSERT INTO user(ufname, ulname, uemail, utnum, umdp,datetime_insc) VALUES (?, ?, ?, ?, ?, NOW()) ");
                                    $insert->execute(array($ufname, $ulname, $uemail, $utnum, $umdp));
                                    $_SESSION['ufname']= $ufname;
                                    $_SESSION['ulname']= $ulname;
                                    $_SESSION['uemail']= $uemail;
                                    header('Location:php/info.php?send confirmation to '.$_SESSION['ufname']);
                        }else{
                            $error = "votre mot de passe doit avoir plus de 5 carractères";
                        }
                    }else{
                        $error = "vos deux mots de passe ne sont pas conforme !";
                    }
                }else{
                    $error = "ce numero de telephone a déjà été utilisé !";
                }
            }else{
                $error = "cette addresse e-mail a deja etait utilisé !";
            }
        }else{
            $error ="votre post nom doit avoir entre 3 et 15 carractères";
        }
    }else{
        $error = "votre nom doit avoir entre 3 et 15 carractères";
    }
}
if (isset($error)) {
    echo $error;
}
?>