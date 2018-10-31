<?php
if (!isset($_SESSION['id']) AND !isset($_SESSION['uemail'])) {
header('Location: ../index.php');
} ?>
