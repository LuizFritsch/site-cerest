<?php
session_start();
session_destroy();
echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
?>