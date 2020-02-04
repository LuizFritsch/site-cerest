<?php
session_start();
if((!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
	header('location:https://guilherme.cerestoeste.com.br/login.php');
	exit;
}
include '../sinan/db_connection.php';
$con=OpenCon();
$logado = $_SESSION['login'];
$func = $_SESSION['func'];
$senh = $_SESSION['senha'];
$ide = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Painel Admin - Adicionar Noticia</title>
	</head>
	<body>
		<?php include '../../HEADER.php'; ?>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Adicionar Noticia</h1>
				<form method="POST">
					
				</form>
			</div>
		</main>
		<?php include '../../footer.html'; ?>
	</body>
</html>