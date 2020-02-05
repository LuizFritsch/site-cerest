<?php
session_start();
if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
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
		<title>Painel Admin noticias</title>
	</head>
	<body>
		<?php include '../HEADER.php'; ?>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Painel de Controle -> Gerenciar Noticias</h1>
				<div class="container">
					<div class="row" id="equipe-cerest">
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-0 shadow">
								<div class="card-body text-center">
									<h5 class="card-title mb-0">-</h5>
									<div class="card-text text-black-50">
										<a href='./admin_noticias/adicionar_noticia.php#t'>Adicionar Noticia</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-0 shadow">
								<div class="card-body text-center">
									<h5 class="card-title mb-0">-</h5>
									<div class="card-text text-black-50">
										<a href="./admin_noticias/excluir_noticia.php#t">Excluir Noticia</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-0 shadow">
								<div class="card-body text-center">
									<h5 class="card-title mb-0">-</h5>
									<div class="card-text text-black-50">
										<a href="./admin_noticias/atualizar_noticia.php#t">Atualizar Noticia</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.row -->
				</div>
			</div>
		</main>
		<?php include '../footer.html'; ?>
	</body>
</html>