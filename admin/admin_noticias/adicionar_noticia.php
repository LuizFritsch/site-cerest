<?php
session_start();
if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
	header('location:https://guilherme.cerestoeste.com.br/login.php');
	exit;
}
include '../../sinan/db_connection.php';
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
		<link rel="stylesheet" type="text/css" href="../../style/style.css">
	</head>
	<body>
		<?php include '../../HEADER.php'; ?>
		<main>
			<div class="content text-break">
				<h1 class="text-justify">Painel de Controle -> Gerenciar Noticias -> Adicionar Noticia</h1>
				<?php
				echo" <h4>Bem vindo $logado<h4>";
				echo" <br>";
				?>
				<div>
					<form>
						<div class="form-group">
							<h6>Tags</h6>
							<!--<input type="text" class="form-control" id="inputCNES" placeholder="Digite o titulo da noticia...">-->
						</div>
						
						<div class="form-group">
							<h6>Título da Noticia</h6>
							<input type="text" class="form-control" name="inputTitulo" id="inputTitulo" placeholder="Digite o titulo da noticia...">
						</div>
						
						<br>
						
						<div class="form-group">
							<div class="form-group files">
								<h6>Imagem da noticia</h6>
								<input type="file" class="form-control" name="inputImagem" id="inputImagem" multiple="" value="Arraste a imagem aqui ou ">
							</div>
						</div>
						<div class="form-group">
							<h6>Descrição da Imagem</h6>
							<input type="text" class="form-control" id="inputDescricao" name="inputDescricao" placeholder="Digite uma descrição para a imagem...">
						</div>
						
						<div class="form-group">
							<textarea id="demo"></textarea>
							<script type="text/javascript">
								$("#demo").mdbWYSIWYG();
							</script>
						</div>
						<br>
						<button type="submit" class="btn btn-success">Publicar Noticia</button>
					</form>
				</div>
			</div>
			<br>
		</main>
		<?php include '../../footer.html'; ?>
	</body>
</html>