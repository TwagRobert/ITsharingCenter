<?php
session_start();
setcookie('uemail', '', time()-3600);
setcookie('udmp', '', time()-3600);
session_destroy();
header('Location:../index.php')
?>