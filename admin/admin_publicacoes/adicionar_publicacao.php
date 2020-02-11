<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Painel Admin - Adicionar Publicação</title>
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
		include '../../sinan/db_connection.php';
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
					<form action="upload.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<h6>Tags</h6>
							<!--<input type="text" class="form-control" id="inputCNES" placeholder="Digite o titulo da noticia...">-->
						</div>
						
						<div class="form-group">
							<h6>Título da Publicacao</h6>
							<input type="text" class="form-control" name="inputNomePDF" id="inputNomePDF" placeholder="Digite o titulo da noticia...">
						</div>
						
						<br>
						
						<div class="form-group">
							<div class="form-group files">
								<h6>PDF da publicação</h6>
								<input type="file" accept="application/pdf,application/" class="form-control ashuashua" name="myfile" id="myfile" multiple="" value="Arraste o PDF aqui ou ">
							</div>
						</div>
						<div class="form-group text-center">
							<div class="form-group">
								<h6>Prévia do PDF</h6>
								<div class="responsive text-center">
									<embed id="pdf" class="pdf" type="application/pdf">
								</div>
								<img id="image" class="img-fluid img-responsive">
								<script type="text/javascript">
									document.getElementById("myfile").onchange = function () {
									var reader = new FileReader();
									reader.onload = function (e) {
										// get loaded data and render thumbnail.
										document.getElementById("pdf").src = e.target.result;
									};
									// read the image file as a data URL.
									reader.readAsDataURL(this.files[0]);
									};
								</script>
							</div>
						</div>
						<br>
						<button type="submit" id="save" name="save" class="btn btn-success save">Submeter Publicação</button>
					</form>

				</div>
			</div>
			<br>
		</main>
		<?php include '../../footer.html'; ?>
	</body>
</html>