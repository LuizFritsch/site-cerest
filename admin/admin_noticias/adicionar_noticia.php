<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Painel Admin - Adicionar Noticia</title>
		<link rel="stylesheet" type="text/css" href="../../style/style.css">
		<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
	</head>
	<body>
		<?php
		if(($_SESSION['id']!=1) || (!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
			echo "<script>alert('Você não está logado ou não tem o nível de acesso necessário!')</script>";
			echo "<script>window.location.replace('https://guilherme.cerestoeste.com.br/login.php');</script>";
		}else{
			$logado = $_SESSION['login'];
			$func = $_SESSION['func'];
			$senh = $_SESSION['senha'];
			$ide = $_SESSION['id'];
		}
		include '../../database/db_connection.php';
		$con=OpenCon();
		$logado = $_SESSION['login'];
		$func = $_SESSION['func'];
		$senh = $_SESSION['senha'];
		$ide = $_SESSION['id'];
		?>
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
							<h6>Título da Noticia</h6>
							<input type="text" class="form-control" name="inputTitulo" id="inputTitulo" placeholder="Digite o titulo da noticia...">
						</div>
						
						<br>
						
						<div class="form-group">
							<div class="form-group files">
								<h6>Imagem da noticia</h6>
								<input type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control ashuashua" name="inputImagem" id="inputImagem" multiple="" value="Arraste a imagem aqui ou ">
							</div>
						</div>
						<div class="form-group">
							<div class="form-group">
								<h6>Prévia da Imagem</h6>
								<img id="image" class="img-fluid img-responsive">
								<script type="text/javascript">
									document.getElementById("inputImagem").onchange = function () {
								var reader = new FileReader();
								reader.onload = function (e) {
								// get loaded data and render thumbnail.
								document.getElementById("image").src = e.target.result;
								};
								// read the image file as a data URL.
								reader.readAsDataURL(this.files[0]);
								};
								</script>
							</div>
						</div>
						<div class="form-group">
							<h6>Descrição da Imagem</h6>
							<input type="text" class="form-control" id="inputDescricao" name="inputDescricao" placeholder="Digite uma descrição para a imagem...">
						</div>
						
						<div class="form-group">
							<div id="toolbar">
								<button class="ql-bold">Bold</button>
								<button class="ql-italic">Italic</button>
								<button class="ql-blockquote"></button>
								<button class="ql-code-block"></button>
							</div>
							<div id="editor">
								<p>Hello World!</p>
							</div>
							<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
							<script>
								var editor = new Quill('#editor', {
									modules: { toolbar: '#toolbar' },
									theme: 'snow'
								});
							</script>
						</div>
						<br>
						<script type="text/javascript">
							function alerta() {
								alert($(".editor").html());
							}
						</script>
						<button type="submit" onclick="alerta()" class="btn btn-success">Publicar Noticia</button>
					</form>
				</div>
			</div>
			<br>
		</main>
		<?php include '../../footer.html'; ?>
	</body>
</html>