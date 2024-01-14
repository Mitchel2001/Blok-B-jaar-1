<?php
session_start();
session_destroy();
header('Location: ../landingpageGG/login/login.php');
exit;
?>