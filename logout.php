<?php
session_start();
session_destroy();
header('location:https://guilherme.cerestoeste.com.br/login.php');
exit;
echo "You have been logged out";
?>