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
		$id=$_GET['id'];
		?>
		<main>
			<div class="content text-break">
				<h1 class="text-justify">Painel de Controle -> Gerenciar Noticias -> Editar Publicação</h1>
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
						
						<?php
							if (mysqli_connect_errno()) {
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							
							$sql="SELECT * FROM publicacoes WHERE ID_PUBLICACAO='$id'";
							$result = mysqli_query($con,$sql);
							$row = mysqli_fetch_assoc($result);
						?>
						<div class="form-group">
							<h6>Título da Publicacao</h6>
							<input type="text" class="form-control" name="inputNomePDF" maxlength="250" minlength="1" id="inputNomePDF" value="<?php echo (isset($row['NOME']))?$row['NOME']:'';?>">
						</div>
						
						<br>

						<div class="form-group">
							<h6>Tipo da Publicacao</h6>
							<?php
								$sql_select_tipo="SELECT * FROM tipo_publicacoes";
								$resultad=mysqli_query($con,$sql_select_tipo);
								if(!$resultad) {
									die('Could not get data: ' . mysqli_error($con));
								}
								echo"<select class='form-control' id='tipo_publicacao' name='tipo_publicacao' required>";
								while($ro = mysqli_fetch_array($resultad)) {
									if ($ro['ID_TIPO_PUBLICACAO']==$$row['FK_TIPO_PUBLICACAO']) {
										echo "<option selected value='{$ro['ID_TIPO_PUBLICACAO']}'>{$ro['TIPO_PUBLICACAO']}</option>";
									}else{
										echo "<option value='{$ro['ID_TIPO_PUBLICACAO']}' >{$ro['TIPO_PUBLICACAO']}</option>";
									}
								}		
								echo "</select>";
								?>
						</div>

						<br>
						
						<div class="form-group">
							<div class="form-group">
								<h6>Prévia do PDF antigo</h6>
								<div class="responsive text-center">
									<embed id="pdf" src="<?php echo (isset($row['URL']))?$row['URL']:'';?>" class="pdf" type="application/pdf">
								</div>
							</div>
							<div class="form-group files">
								<h6>Novo PDF da publicação</h6>
								<input type="file" accept="application/pdf,application/" class="form-control ashuashua" name="uploadedfile" id="uploadedfile">
							</div>
						</div>
						<div class="form-group text-center">
							<div class="form-group">
								<h6>Prévia do PDF novo</h6>
								<div class="responsive text-center">
									<embed id="pdfNovo" class="pdf" type="application/pdf">
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
						    <textarea class="form-control" id="descricao" maxlength="400" minlength="1" name="descricao" rows="3" value="<?php echo (isset($row['DESCRICAO']))?$row['DESCRICAO']:'';?>"></textarea>
						</div>
						<br>
						<button type="submit" id="save" name="save" class="btn btn-success save">Submeter Publicação</button>
						<?php
							if($_SERVER['REQUEST_METHOD'] == 'POST'){
								$nome_antigo=$row['NOME'];
								if (isset($_POST['inputNomePDF']) && strpos($_POST['inputNomePDF'], ".pdf")) {
									$nome_novo=$_POST['inputNomePDF']; 
								}elseif (isset($_POST['inputNomePDF']) && !strpos($_POST['inputNomePDF'], ".pdf")){
									$nome_novo=$_POST['inputNomePDF'].".pdf";
								}else{
									$nome_novo="";
								}
								$descricao=$_POST['DESCRICAO'];
								
								if ($nome_novo !== '' && $nome_novo!==$nome_antigo ) {
									//ARQUIVO FOI RENOMEADO
									$target_path="../../publicacoes/";
									$target_path_old=$target_path.$nome_antigo;
									rename($target_path_old,$target_path.$nome_novo);
									$url="https://guilherme.cerestoeste.com.br/publicacoes/".$nome_novo;
									if (!file_exists($_FILES['uploadedfile']['tmp_name']) || !is_uploaded_file($_FILES['uploadedfile']['tmp_name'])) {
										//NAO FOI FEITO UPLOAD DE UM ARQUIVO
										$sql = "UPDATE publicacoes SET NOME='$nome_novo', URL='$url', DESCRICAO='$descricao' WHERE ID_PUBLICACAO='$id'";
							            	if ($resultS = mysqli_query($con, $sql)) {
							            		echo "<script>Swal.fire(
							                        'Sucesso!',
							                        'A publicação foi editada com sucesso!',
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
										//FOI FEITO UPLOAD DE UM ARQUIVO
										if (unlink($target_path_old)) {
										//DELETAR ARQUIVO ANTIGO E UPLOAD DO NOVO
											if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
												$sql = "UPDATE publicacoes SET NOME='$nome_novo', URL='$url', DESCRICAO='$descricao' WHERE ID_PUBLICACAO='$id'";
							            	if ($resultS = mysqli_query($con, $sql)) {
							            		echo "<script>Swal.fire(
							                        'Sucesso!',
							                        'A publicação foi editada com sucesso!',
							                        'success'
							                        ).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";	
							            	}else{
							            		echo "<script>Swal.fire({
							                        icon: 'error',
							                        title: 'Oops...',
							                        text: 'Não foi possivel inserir a publicação editada no bd, tente novamente mais tarde!',
							                        }).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";							            			
							            	}
											}
										}else{
											echo "<script>Swal.fire({
							                        icon: 'error',
							                        title: 'Oops...',
							                        text: 'Não foi possivel apagar o arquivo antigo, por favor tente novamente mais tarde!',
							                        }).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";
										}
									}
								}else if($nome_novo !== '' && $nome_novo == $nome_antigo){
									if (!file_exists($_FILES['uploadedfile']['tmp_name']) || !is_uploaded_file($_FILES['uploadedfile']['tmp_name'])) {
										//NAO FOI FEITO UPLOAD DE UM ARQUIVO

										$url="https://guilherme.cerestoeste.com.br/publicacoes/".$nome_antigo;
										$sql = "UPDATE publicacoes SET NOME='$nome_antigo', URL='$url', DESCRICAO='$descricao' WHERE ID_PUBLICACAO='$id'";
							            	if ($resultS = mysqli_query($con, $sql)) {
							            		echo "<script>Swal.fire(
							                        'Sucesso!',
							                        'A publicação foi editada com sucesso!',
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
										//FOI FEITO UPLOAD DE UM ARQUIVO
										if (unlink($target_path_old)) {
										//DELETAR ARQUIVO ANTIGO E UPLOAD DO NOVO
										$url="https://guilherme.cerestoeste.com.br/publicacoes/".$nome_antigo;
											if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
												$sql = "UPDATE publicacoes SET NOME='$nome_antigo', URL='$url', DESCRICAO='$descricao' WHERE ID_PUBLICACAO='$id'";
							            	if ($resultS = mysqli_query($con, $sql)) {
							            		echo "<script>Swal.fire(
							                        'Sucesso!',
							                        'A publicação foi editada com sucesso!',
							                        'success'
							                        ).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";	
							            	}else{
							            		echo "<script>Swal.fire({
							                        icon: 'error',
							                        title: 'Oops...',
							                        text: 'Não foi possivel inserir a publicação editada no bd, tente novamente mais tarde!',
							                        }).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";							            			
							            	}
											}
										}else{
											echo "<script>Swal.fire({
							                        icon: 'error',
							                        title: 'Oops...',
							                        text: 'Não foi possivel apagar o arquivo antigo, por favor tente novamente mais tarde!',
							                        }).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/adicionar_publicacao.php';
							                        });</script>";
										}
									}

								}







							    //$target_path = "../../publicacoes/";

							    /* Add the original filename to our target path.
							    Result is "uploads/filename.extension" */
							    //$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

							    //inverter ordem, verificar se o input do nome esta vazio e dps enviar o arquivo

							}
/**
							        if ($_POST['inputNomePDF'] !== '') {
							        	$novoNome="../../publicacoes/".$_POST['inputNomePDF'].".pdf";
							            if (rename($target_path,$novoNome)) {
							            	$url = "https://guilherme.cerestoeste.com.br/publicacoes/".$_POST['inputNomePDF'].".pdf";
							            	$descricao=$_POST['descricao'];
							            	$nome=$_POST['inputNomePDF'].".pdf";
							            	$sql = "UPDATE publicacoes SET NOME='$nome', URL='$url', DESCRICAO='$descricao' WHERE ID_PUBLICACAO='$id'";
							            	echo "<script>alert('$sql');</script>";
							            	if ($resultS = mysqli_query($con, $sql)) {
							            		echo "<script>Swal.fire(
							                        'Sucesso!',
							                        'A publicação foi editada com sucesso!',
							                        'success'
							                        ).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/gerenciar_publicacoes.php';
							                        });</script>";	
							            	}else{
							            		echo "<script>Swal.fire({
							                        icon: 'error',
							                        title: 'Oops...',
							                        text: 'Não foi possivel editar a publicação renomeada no bd, tente novamente mais tarde!1',
							                        }).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/gerenciar_publicacoes.php';
							                        });</script>";							            			
							            	}
							            }else{
							                echo "<script>Swal.fire({
							                        icon: 'error',
							                        title: 'Oops...',
							                        text: 'Não foi possivel renomear a publicação, tente novamente mais tarde!',
							                        }).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/gerenciar_publicacoes.php';
							                        });</script>";
							            }       
							        }else{
							        	$url="https://guilherme.cerestoeste.com.br/publicacoes/".basename( $_FILES['uploadedfile']['name'])."";
							        $nome=basename($_FILES['uploadedfile']['name']);
							        $descricao=$_POST['descricao'];
							        $sql = "UPDATE publicacoes SET NOME='$nome', URL='$url', DESCRICAO='$descricao' WHERE ID_PUBLICACAO='$id'";
							        echo "<script>alert('$sql');</script>";
							        if ($result = mysqli_query($con, $sql)) {
							        	echo "<script>Swal.fire(
							                        'Sucesso!',
							                        'A publicação foi editada com sucesso!',
							                        'success'
							                        ).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/gerenciar_publicacoes.php';
							                        });</script>";
							        }else{
							        	echo "<script>Swal.fire({
							                        icon: 'error',
							                        title: 'Oops...',
							                        text: 'Não foi possivel editar a publicação renomeada no bd, tente novamente mais tarde!2',
							                        }).then(function() {
							                            window.location = 'https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/gerenciar_publicacoes.php';
							                        });</script>";							            			
							            	}
							        }
							        
							    
							}

**/

						?>
					</form>
				</div>
			</div>
			<br>
		</main>
		<?php include '../../footer.html'; ?>
	</body>
</html>