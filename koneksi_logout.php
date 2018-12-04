<?php
session_start();
setcookie('');
session_destroy();
header('Location: login.php');
?>
