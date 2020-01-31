<?php
		/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
		simplesmente não fazer o login e digitar na barra de endereço do seu navegador
		o caminho para a página principal do site (sistema), burlando assim a obrigação de
		fazer um login, com isso se ele não estiver feito o login não será criado a session,
		então ao verificar que a session não existe a página redireciona o mesmo
		para a index.php.*/
		session_start();
		if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
			echo "<script>alert('Você não está logado ou não tem o nível de acesso necessário!')</script>";
			echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
		}else{
			$logado = $_SESSION['login'];
			$func = $_SESSION['func'];
			$senh = $_SESSION['senha'];
			$ide = $_SESSION['id'];
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Painel de Controle - ADMIN</title>
	</head>
	<body>
		<?php include '../HEADER.php'; ?>
		<main>
			<div class="content text-break">
				<h1 id="t" class="text-justify">Painel de controle</h1>
				<div class="container">
					<div class="row" id="equipe-cerest">
						
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-0 shadow">
								<!--<img src="./img/equipe/ADRIANA.jpg"class="card-img-top" alt="...">-->
								<div class="card-body text-center">
									<h5 class="card-title mb-0">-</h5>
									<div class="card-text text-black-50">
										<a href='admin_conselho_gestor.php#t'>Gerenciar Conselho Gestor</a></div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-0 shadow">
									<!--<img src="./img/equipe/ADRIANA.jpg"class="card-img-top" alt="...">-->
									<div class="card-body text-center">
										<h5 class="card-title mb-0">-</h5>
										<div class="card-text text-black-50">Estamos trabalhando nesta funcionalidade ainda...</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-0 shadow">
									<!--<img src="./img/equipe/ADRIANA.jpg"class="card-img-top" alt="...">-->
									<div class="card-body text-center">
										<h5 class="card-title mb-0">-</h5>
										<div class="card-text text-black-50">Estamos trabalhando nesta funcionalidade ainda...</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-0 shadow">
									<!--<img src="./img/equipe/ADRIANA.jpg"class="card-img-top" alt="...">-->
									<div class="card-body text-center">
										<h5 class="card-title mb-0">-</h5>
										<div class="card-text text-black-50">Estamos trabalhando nesta funcionalidade ainda...</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-md-6 mb-4">
								<div class="card border-0 shadow">
									<!--<img src="./img/equipe/ADRIANA.jpg"class="card-img-top" alt="...">-->
									<div class="card-body text-center">
										<h5 class="card-title mb-0">-</h5>
										<div class="card-text text-black-50">Estamos trabalhando nesta funcionalidade ainda...</div>
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