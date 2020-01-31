<?php
		/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode
		simplesmente não fazer o login e digitar na barra de endereço do seu navegador
		o caminho para a página principal do site (sistema), burlando assim a obrigação de
		fazer um login, com isso se ele não estiver feito o login não será criado a session,
		então ao verificar que a session não existe a página redireciona o mesmo
		para a index.php.*/
		session_start();
			if((!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
				header('location:https://guilherme.cerestoeste.com.br/login.php');
				exit;
			}
			$logado = $_SESSION['login'];
			$func = $_SESSION['func'];
			$senh = $_SESSION['senha'];
			$ide = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ADMIN Usuarios</title>
	</head>
	<body>
		<?php include 'HEADER.php'; ?>
		<main>
			<div class="content text-break">
				<?php
					echo "<h1 id='t' class='text-justify'>Painel de controle</h1>";
					echo "<h4>id $ide<h4>";
					echo" <h4>nome $logado<h4>";
					echo" <h4>senha $senh<h4>";
					echo" <h4>funcao $func<h4>";
				?>
			</div>
		</main>
		<?php include 'footer.html'; ?>
	</body>
</html>