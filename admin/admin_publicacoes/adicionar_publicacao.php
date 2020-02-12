<?php include '../../HEADER.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Painel Admin - Adicionar Publicação</title>
		<link rel="stylesheet" type="text/css" href="../../style/style.css">
    	<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>;
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
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<h6>Tags</h6>
							<!--<input type="text" class="form-control" id="inputCNES" placeholder="Digite o titulo da noticia...">-->
						</div>
						
						<div class="form-group">
							<h6>Título da Publicacao</h6>
							<input type="text" class="form-control" name="inputNomePDF" id="inputNomePDF" placeholder="Digite o nome da publicação ou deixe em branco para manter o mesmo...">
						</div>
						
						<br>
						
						<div class="form-group">
							<div class="form-group files">
								<h6>PDF da publicação</h6>
								<input type="file" accept="application/pdf,application/" class="form-control ashuashua" name="uploadedfile" id="uploadedfile" required="" multiple="" value="Arraste o PDF aqui ou ">
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
									document.getElementById("uploadedfile").onchange = function () {
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
						<div class="form-group">
						    <h6>Descrição da Publicação</h6>
						    <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
						</div>
						<br>
						<button type="submit" id="save" name="save" class="btn btn-success save">Submeter Publicação</button>
						<?php
							if($_SERVER['REQUEST_METHOD'] == 'POST'){
							    // Where the file is going to be placed
							    $target_path = "../../publicacoes/";

							    /* Add the original filename to our target path.
							    Result is "uploads/filename.extension" */
							    $target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

							    //inverter ordem, verificar se o input do nome esta vazio e dps enviar o arquivo

							    if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
							        if ($_POST['inputNomePDF'] !== '') {
							        	$novoNome="../../publicacoes/".$_POST['inputNomePDF'].".pdf";
							        	echo "<script>alert('$novoNome && $target_path')</script>";
							            if (rename($target_path,$novoNome)) {
							            	$url = "https://guilherme.cerestoeste.com.br/publicacoes/".$_POST['inputNomePDF'].".pdf";
							            	$descricao=$_POST['descricao'];
							            	$nome=$_POST['inputNomePDF'].".pdf";
							            	$sql = "INSERT INTO publicacoes(ID_PUBLICACAO,NOME,URL,DESCRICAO) VALUES(DEFAULT,'$nome','$url','$descricao')";
							            	if ($resultS = mysqli_query($con, $sql)) {
							            		echo "<script>Swal.fire(
							                        'Sucesso!',
							                        'A publicação foi adicionada com sucesso!',
							                        'success'
							                        ).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";	
							            	}else{
							            		echo "<script>Swal.fire({
							                        icon: 'error',
							                        title: 'Oops...',
							                        text: 'Não foi possivel inserir a publicação renomeada no bd, tente novamente mais tarde!',
							                        }).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";							            			
							            	}
							            }else{
							                echo "<script>Swal.fire({
							                        icon: 'error',
							                        title: 'Oops...',
							                        text: 'Não foi possivel renomear a publicação, tente novamente mais tarde!',
							                        }).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";
							            }       
							        }else{
							        	$url="https://guilherme.cerestoeste.com.br/publicacoes/".basename( $_FILES['uploadedfile']['name'])."";
							        $nome=basename($_FILES['uploadedfile']['name']);
							        $descricao=$_POST['descricao'];
							        $sql = "INSERT INTO publicacoes(ID_PUBLICACAO,NOME,URL,DESCRICAO) VALUES(DEFAULT,'$nome','$url','$descricao')";
							        if ($result = mysqli_query($con, $sql)) {
							        	echo "<script>Swal.fire(
							                        'Sucesso!',
							                        'A publicação foi adicionada com sucesso!',
							                        'success'
							                        ).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";
							        }else{
							        	echo "<script>Swal.fire({
							                        icon: 'error',
							                        title: 'Oops...',
							                        text: 'Não foi possivel inserir a publicação renomeada no bd, tente novamente mais tarde!',
							                        }).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";							            			
							            	}
							        }
							        
							    }else{
							        echo "<script>Swal.fire({
							                    icon: 'error',
							                    title: 'Oops...',
							                    text: 'Não foi possivel realizar o upload da publicação, tente novamente mais tarde!',
							                    }).then(function() {
							                        window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                    });</script>";
							    }
							}
						?>
					</form>
				</div>
			</div>
			<br>
		</main>
		<?php include '../../footer.html'; ?>
	</body>
</html>